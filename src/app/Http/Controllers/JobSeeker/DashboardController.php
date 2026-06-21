<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $jobSeeker = Auth::user()->jobSeeker;

        $totalApplications = Application::where('job_seeker_id', $jobSeeker->id)->count();
        $waitingApplications = Application::where('job_seeker_id', $jobSeeker->id)
            ->where('status', 'waiting')->count();
        $acceptedApplications = Application::where('job_seeker_id', $jobSeeker->id)
            ->where('status', 'accepted')->count();

        $recentApplications = Application::with(['jobListing.company'])
            ->where('job_seeker_id', $jobSeeker->id)
            ->latest()
            ->take(5)
            ->get();

        return view('job_seeker.dashboard', compact(
            'jobSeeker',
            'totalApplications',
            'waitingApplications',
            'acceptedApplications',
            'recentApplications'
        ));
    }

    public function applications()
    {
        $jobSeeker = Auth::user()->jobSeeker;

        $applications = Application::with(['jobListing.company', 'jobListing.category'])
            ->where('job_seeker_id', $jobSeeker->id)
            ->latest()
            ->paginate(10);

        return view('job_seeker.applications', compact('applications'));
    }

    public function profile()
    {
        $jobSeeker = Auth::user()->jobSeeker;
        return view('job_seeker.profile', compact('jobSeeker'));
    }

    public function updateProfile(\App\Http\Requests\UpdateJobSeekerProfileRequest $request)
    {
        $user = Auth::user();
        $jobSeeker = $user->jobSeeker;

        $user->update([
            'name' => $request->name,
        ]);

        $data = $request->except(['name']);

        if ($request->hasFile('profile_picture')) {
            if ($jobSeeker->profile_picture) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($jobSeeker->profile_picture);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        } else {
            unset($data['profile_picture']);
        }

        if ($request->hasFile('cv_path')) {
            if ($jobSeeker->cv_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($jobSeeker->cv_path);
            }
            $data['cv_path'] = $request->file('cv_path')->store('cv', 'public');
        } else {
            unset($data['cv_path']);
        }

        $jobSeeker->update($data);

        return back()->with('success', 'Profil berhasil diupdate!');
    }

    public function deleteProfilePicture()
    {
        $jobSeeker = Auth::user()->jobSeeker;

        if ($jobSeeker->profile_picture) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($jobSeeker->profile_picture);
            $jobSeeker->update(['profile_picture' => null]);
        }

        return back()->with('success', 'Foto profil berhasil dihapus!');
    }

    public function deleteCv()
    {
        $jobSeeker = Auth::user()->jobSeeker;

        if ($jobSeeker->cv_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($jobSeeker->cv_path);
            $jobSeeker->update(['cv_path' => null]);
        }

        return back()->with('success', 'CV berhasil dihapus!');
    }
}