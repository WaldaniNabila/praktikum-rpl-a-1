<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    // Kirim lamaran
    public function store(Request $request, JobListing $jobListing)
    {
        // Cek apakah sudah pernah melamar
        $alreadyApplied = Application::where('job_seeker_id', Auth::user()->jobSeeker->id)
            ->where('job_id', $jobListing->id)
            ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'Kamu sudah pernah melamar lowongan ini!');
        }

        $request->validate([
            'cover_letter' => ['nullable', 'string', 'max:2000'],
            'cv_path'      => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);

        $cvPath = null;
        if ($request->hasFile('cv_path')) {
            $cvPath = $request->file('cv_path')->store('cv', 'public');
        }

        Application::create([
            'job_seeker_id' => Auth::user()->jobSeeker->id,
            'job_id'        => $jobListing->id,
            'cover_letter'  => $request->cover_letter,
            'cv_path'       => $cvPath,
            'status'        => 'waiting',
        ]);

        return back()->with('success', 'Lamaran berhasil dikirim!');
    }

    // Batalkan lamaran
    public function destroy(Application $application)
    {
        if ($application->job_seeker_id !== Auth::user()->jobSeeker->id) {
            abort(403);
        }

        if ($application->status !== 'waiting') {
            return back()->with('error', 'Lamaran tidak bisa dibatalkan!');
        }

        $application->delete();

        return back()->with('success', 'Lamaran berhasil dibatalkan!');
    }
}