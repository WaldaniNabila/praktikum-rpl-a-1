<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\Category;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $query = JobListing::with(['company', 'category'])
            ->where('status', 'approved')
            ->where('is_open', true);

        if ($request->q) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->q . '%')
                  ->orWhere('description', 'like', '%' . $request->q . '%')
                  ->orWhereHas('company', function($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->q . '%');
                  });
            });
        }

        if ($request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->employment_type) {
            $query->where('employment_type', $request->employment_type);
        }

        if ($request->work_type) {
            $query->where('work_type', $request->work_type);
        }

        $jobs = $query->latest()->paginate(12);
        $categories = Category::all();

        return view('jobs.index', compact('jobs', 'categories'));
    }

    public function show(JobListing $jobListing)
    {
        $jobListing->load(['company', 'category']);
        $relatedJobs = JobListing::with(['company', 'category'])
            ->where('status', 'approved')
            ->where('is_open', true)
            ->where('category_id', $jobListing->category_id)
            ->where('id', '!=', $jobListing->id)
            ->take(4)
            ->get();

        return view('jobs.show', compact('jobListing', 'relatedJobs'));
    }
}