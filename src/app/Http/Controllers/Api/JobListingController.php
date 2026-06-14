<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $query = JobListing::with(['company', 'category'])
            ->where('status', 'approved')
            ->where('is_open', true)
            ->latest();

        // Optional filtering for mobile app
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('employment_type')) {
            $query->where('employment_type', $request->employment_type);
        }

        if ($request->has('work_type')) {
            $query->where('work_type', $request->work_type);
        }

        // Pagination
        $jobs = $query->paginate(15);

        return response()->json($jobs);
    }

    public function show($id)
    {
        $job = JobListing::with(['company', 'category'])->findOrFail($id);

        if ($job->status !== 'approved' || !$job->is_open) {
            return response()->json([
                'message' => 'Job listing is no longer available'
            ], 404);
        }

        return response()->json($job);
    }
}
