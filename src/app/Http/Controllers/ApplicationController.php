<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobListing;
use App\Http\Requests\StoreApplicationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(StoreApplicationRequest $request, JobListing $jobListing)
    {
        $jobSeeker = Auth::user()->jobSeeker;
        
        if (!$jobSeeker) {
            return back()->with('error', 'Silakan lengkapi profil kamu terlebih dahulu sebelum melamar.');
        }

        if (!$jobListing->isOpen() || !$jobListing->isApproved()) {
            return back()->with('error', 'Lowongan ini sudah ditutup atau tidak tersedia.');
        }

        if ($jobSeeker->hasAppliedTo($jobListing)) {
            return back()->with('error', 'Kamu sudah pernah melamar lowongan ini!');
        }

        $cvPath = null;
        if ($request->hasFile('cv_path')) {
            $cvPath = $request->file('cv_path')->store('cv', 'public');
        } else {
            $cvPath = $jobSeeker->cv_path;
            if (!$cvPath) {
                return back()->with('error', 'Kamu harus mengunggah CV. Silakan unggah di sini atau lengkapi di profil.');
            }
        }

        Application::create([
            'job_seeker_id' => $jobSeeker->id,
            'job_id'        => $jobListing->id,
            'cover_letter'  => $request->cover_letter,
            'cv_path'       => $cvPath,
            'status'        => 'waiting',
        ]);

        return back()->with('success', 'Lamaran berhasil dikirim!');
    }

    public function destroy(Application $application)
    {
        $jobSeeker = Auth::user()->jobSeeker;

        if (!$jobSeeker || $application->job_seeker_id !== $jobSeeker->id) {
            abort(403);
        }

        if ($application->status !== 'waiting') {
            return back()->with('error', 'Lamaran tidak bisa dibatalkan!');
        }

        if ($application->cv_path && $application->cv_path !== $jobSeeker->cv_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($application->cv_path);
        }

        $application->delete();

        return back()->with('success', 'Lamaran berhasil dibatalkan!');
    }
}