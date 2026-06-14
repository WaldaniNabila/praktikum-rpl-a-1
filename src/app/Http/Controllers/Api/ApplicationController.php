<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\JobListing;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user->isJobSeeker() || !$user->jobSeeker) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $applications = Application::with('jobListing.company')
            ->where('job_seeker_id', $user->jobSeeker->id)
            ->latest()
            ->get();

        return response()->json($applications);
    }

    public function store(Request $request, $jobListingId)
    {
        $user = $request->user();
        if (!$user->isJobSeeker() || !$user->jobSeeker) {
            return response()->json(['message' => 'Unauthorized. Must be a job seeker.'], 403);
        }

        $jobListing = JobListing::findOrFail($jobListingId);

        if ($jobListing->status !== 'approved' || !$jobListing->is_open) {
            return response()->json(['message' => 'Job is not open for applications.'], 400);
        }

        // Check if already applied
        $exists = Application::where('job_seeker_id', $user->jobSeeker->id)
            ->where('job_id', $jobListing->id)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'You have already applied for this job.'], 400);
        }

        $request->validate([
            'cover_letter' => 'required|string',
        ]);

        $application = Application::create([
            'job_id' => $jobListing->id,
            'job_seeker_id' => $user->jobSeeker->id,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Application submitted successfully',
            'application' => $application
        ], 201);
    }

    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        $application = Application::findOrFail($id);

        if ($application->job_seeker_id !== $user->jobSeeker?->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($application->status !== 'pending') {
            return response()->json(['message' => 'Cannot cancel an application that is already processed.'], 400);
        }

        $application->delete();

        return response()->json(['message' => 'Application cancelled successfully']);
    }
}
