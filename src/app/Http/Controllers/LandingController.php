<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function index()
    {
        $latestJobs = JobListing::with(['company', 'category'])
            ->where('status', 'approved')
            ->where('is_open', true)
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::withCount(['jobListings' => function($q) {
            $q->where('status', 'approved')->where('is_open', true);
        }])->get();

        $totalJobs      = JobListing::where('status', 'approved')->count();
        $totalCompanies = \App\Models\Company::where('status', 'verified')->count();

        return view('welcome', compact('latestJobs', 'categories', 'totalJobs', 'totalCompanies'));
    }
}