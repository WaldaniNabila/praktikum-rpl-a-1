<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobListing;
use App\Http\Requests\StoreApplicationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    // Kirim lamaran
    public function store(StoreApplicationRequest $request, JobListing $jobListing)
    {
        $jobSeeker = Auth::user()->jobSeeker;
        
        // 1. Cek apakah profil JobSeeker sudah ada
        if (!$jobSeeker) {
            return back()->with('error', 'Silakan lengkapi profil kamu terlebih dahulu sebelum melamar.');
        }

        // 2. Cek apakah lowongan masih buka dan disetujui
        if (!$jobListing->isOpen() || !$jobListing->isApproved()) {
            return back()->with('error', 'Lowongan ini sudah ditutup atau tidak tersedia.');
        }

        // 3. Cek apakah sudah pernah melamar menggunakan method Model
        if ($jobSeeker->hasAppliedTo($jobListing)) {
            return back()->with('error', 'Kamu sudah pernah melamar lowongan ini!');
        }

        // 3. Fallback ke CV default profil jika tidak upload CV khusus
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

    // Batalkan lamaran
    public function destroy(Application $application)
    {
        $jobSeeker = Auth::user()->jobSeeker;

        if (!$jobSeeker || $application->job_seeker_id !== $jobSeeker->id) {
            abort(403);
        }

        if ($application->status !== 'waiting') {
            return back()->with('error', 'Lamaran tidak bisa dibatalkan!');
        }

        // 4. Hapus file CV khusus dari storage (hanya jika berbeda dari CV default)
        if ($application->cv_path && $application->cv_path !== $jobSeeker->cv_path) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($application->cv_path);
        }

        $application->delete();

        return back()->with('success', 'Lamaran berhasil dibatalkan!');
    }
}