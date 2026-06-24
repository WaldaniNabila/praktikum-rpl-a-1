<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobSeeker;

class JobSeekerController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = $request->user();
        $jobSeeker = $user->jobSeeker;

        if (!$jobSeeker) {
            return response()->json(['message' => 'Job Seeker profile not found'], 404);
        }

        $totalApplications = \App\Models\Application::where('job_seeker_id', $jobSeeker->id)->count();
        $waitingApplications = \App\Models\Application::where('job_seeker_id', $jobSeeker->id)
            ->where('status', 'waiting')->count();
        $acceptedApplications = \App\Models\Application::where('job_seeker_id', $jobSeeker->id)
            ->where('status', 'accepted')->count();

        $recentApplications = \App\Models\Application::with(['jobListing.company', 'jobListing.category'])
            ->where('job_seeker_id', $jobSeeker->id)
            ->latest()
            ->take(5)
            ->get();

        return response()->json([
            'total_applications' => $totalApplications,
            'waiting_applications' => $waitingApplications,
            'accepted_applications' => $acceptedApplications,
            'recent_applications' => $recentApplications
        ]);
    }

    public function profile(Request $request)
    {
        $user = $request->user()->load('jobSeeker');
        return response()->json($user);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->update([
            'name' => $request->name,
        ]);

        $jobSeeker = $user->jobSeeker ?? new JobSeeker(['user_id' => $user->id]);
        if ($request->has('phone')) {
            $jobSeeker->phone = $request->phone;
        }

        if ($request->hasFile('resume')) {
            if ($jobSeeker->cv_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($jobSeeker->cv_path);
            }
            $path = $request->file('resume')->store('cv', 'public');
            $jobSeeker->cv_path = $path;
        }

        if ($request->hasFile('profile_picture')) {
            if ($jobSeeker->profile_picture) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($jobSeeker->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $jobSeeker->profile_picture = $path;
        }

        $jobSeeker->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user->load('jobSeeker')
        ]);
    }

    public function deleteProfilePicture(Request $request)
    {
        $jobSeeker = $request->user()->jobSeeker;

        if ($jobSeeker && $jobSeeker->profile_picture) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($jobSeeker->profile_picture);
            $jobSeeker->update(['profile_picture' => null]);
            return response()->json(['message' => 'Profile picture deleted successfully', 'user' => $request->user()->load('jobSeeker')]);
        }

        return response()->json(['message' => 'No profile picture found'], 404);
    }

    public function deleteCv(Request $request)
    {
        $jobSeeker = $request->user()->jobSeeker;

        if ($jobSeeker && $jobSeeker->cv_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($jobSeeker->cv_path);
            $jobSeeker->update(['cv_path' => null]);
            return response()->json(['message' => 'CV deleted successfully', 'user' => $request->user()->load('jobSeeker')]);
        }

        return response()->json(['message' => 'No CV found'], 404);
    }
}
