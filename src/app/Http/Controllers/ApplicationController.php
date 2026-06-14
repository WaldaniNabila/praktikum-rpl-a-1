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
        $jobSeeker = Auth::user()->jobSeeker;
        
        // 1. Cek apakah profil JobSeeker sudah ada
        if (!$jobSeeker) {
            return back()->with('error', 'Silakan lengkapi profil kamu terlebih dahulu sebelum melamar.');
        }

        // 2. Cek apakah lowongan masih buka dan disetujui
        if (!$jobListing->isOpen() || !$jobListing->isApproved()) {
            return back()->with('error', 'Lowongan ini sudah ditutup atau tidak tersedia.');
        }

        // Cek apakah sudah pernah melamar
        $alreadyApplied = Application::where('job_seeker_id', $jobSeeker->id)
            ->where('job_id', $jobListing->id)
            ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'Kamu sudah pernah melamar lowongan ini!');
        }

        $request->validate([
            'cover_letter' => ['nullable', 'string', 'max:2000'],
            'cv_path'      => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);

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