<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Tampilkan dashboard pelamar
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

    // Tampilkan semua lamaran
    public function applications()
    {
        $jobSeeker = Auth::user()->jobSeeker;

        $applications = Application::with(['jobListing.company', 'jobListing.category'])
            ->where('job_seeker_id', $jobSeeker->id)
            ->latest()
            ->paginate(10);

        return view('job_seeker.applications', compact('applications'));
    }

    // Tampilkan & update profil
    public function profile()
    {
        $jobSeeker = Auth::user()->jobSeeker;
        return view('job_seeker.profile', compact('jobSeeker'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'phone'           => ['nullable', 'string', 'max:20'],
            'description'     => ['nullable', 'string', 'max:500'],
            'profile_picture' => ['nullable', 'image', 'max:2048'],
            'cv_path'         => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);

        $jobSeeker = Auth::user()->jobSeeker;

        if ($request->hasFile('profile_picture')) {
            $jobSeeker->profile_picture = $request->file('profile_picture')
                ->store('profile_pictures', 'public');
        }

        if ($request->hasFile('cv_path')) {
            $jobSeeker->cv_path = $request->file('cv_path')
                ->store('cv', 'public');
        }

        $jobSeeker->update([
            'phone'           => $request->phone,
            'description'     => $request->description,
            'profile_picture' => $jobSeeker->profile_picture,
            'cv_path'         => $jobSeeker->cv_path,
        ]);

        return back()->with('success', 'Profil berhasil diupdate!');
    }
}