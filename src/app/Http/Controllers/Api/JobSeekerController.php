<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobSeeker;

class JobSeekerController extends Controller
{
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
        ]);

        $user->update([
            'name' => $request->name,
        ]);

        $jobSeeker = $user->jobSeeker ?? new JobSeeker(['user_id' => $user->id]);
        $jobSeeker->phone = $request->phone;

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $jobSeeker->resume = $path;
        }

        $jobSeeker->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user->load('jobSeeker')
        ]);
    }
}
