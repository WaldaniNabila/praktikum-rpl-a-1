<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    // Simpan / hapus bookmark (toggle)
    public function toggle(JobListing $jobListing)
    {
        $jobSeekerId = Auth::user()->jobSeeker->id;

        $bookmark = Bookmark::where('job_seeker_id', $jobSeekerId)
            ->where('job_id', $jobListing->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return back()->with('success', 'Lowongan dihapus dari simpanan!');
        }

        Bookmark::create([
            'job_seeker_id' => $jobSeekerId,
            'job_id'        => $jobListing->id,
            'created_at'    => now(),
        ]);

        return back()->with('success', 'Lowongan berhasil disimpan!');
    }

    // Tampilkan semua bookmark
    public function index()
    {
        $bookmarks = Bookmark::with(['jobListing.company', 'jobListing.category'])
            ->where('job_seeker_id', Auth::user()->jobSeeker->id)
            ->latest('created_at')
            ->get();

        return view('job_seeker.bookmarks', compact('bookmarks'));
    }
}