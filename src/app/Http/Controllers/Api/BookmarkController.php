<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\JobListing;

class BookmarkController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        if (!$user->isJobSeeker() || !$user->jobSeeker) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $bookmarks = Bookmark::with('jobListing.company')
            ->where('job_seeker_id', $user->jobSeeker->id)
            ->latest()
            ->get();

        return response()->json($bookmarks);
    }

    public function toggle(Request $request, $jobListingId)
    {
        $user = $request->user();
        
        if (!$user->isJobSeeker() || !$user->jobSeeker) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $jobListing = JobListing::findOrFail($jobListingId);

        $bookmark = Bookmark::where('job_seeker_id', $user->jobSeeker->id)
            ->where('job_id', $jobListing->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return response()->json([
                'message' => 'Bookmark removed',
                'is_bookmarked' => false
            ]);
        } else {
            Bookmark::create([
                'job_seeker_id' => $user->jobSeeker->id,
                'job_id' => $jobListing->id
            ]);
            return response()->json([
                'message' => 'Bookmark added',
                'is_bookmarked' => true
            ], 201);
        }
    }
}
