<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Tampilkan dashboard admin
    public function index()
    {
        $totalUsers      = User::count();
        $totalCompanies  = Company::count();
        $totalJobs       = JobListing::count();
        $totalApplicants = Application::count();
        $pendingJobs     = JobListing::where('status', 'pending')->count();
        $pendingCompanies = Company::where('status', 'pending')->count();

        $recentJobs = JobListing::with('company')
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCompanies',
            'totalJobs',
            'totalApplicants',
            'pendingJobs',
            'pendingCompanies',
            'recentJobs'
        ));
    }

    // Tampilkan semua lowongan
    public function jobs()
    {
        $jobs = JobListing::with(['company', 'category'])
            ->latest()
            ->paginate(15);

        return view('admin.jobs', compact('jobs'));
    }

    // Approve lowongan
    public function approveJob(JobListing $jobListing)
    {
        $jobListing->update(['status' => 'approved']);
        return back()->with('success', 'Lowongan berhasil diapprove!');
    }

    // Reject lowongan
    public function rejectJob(JobListing $jobListing)
    {
        $jobListing->update(['status' => 'rejected']);
        return back()->with('success', 'Lowongan berhasil direject!');
    }

    // Tampilkan semua user
    public function users()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users', compact('users'));
    }

    // Toggle aktif/nonaktif user
    public function toggleUser(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Tidak bisa menonaktifkan admin!');
        }

        $user->update([
            'email_verified_at' => $user->email_verified_at ? null : now(),
        ]);

        return back()->with('success', 'Status user berhasil diubah!');
    }

    // Tampilkan semua perusahaan
    public function companies()
    {
        $companies = Company::with('user')->latest()->paginate(15);
        return view('admin.companies', compact('companies'));
    }

    // Verifikasi perusahaan
    public function verifyCompany(Company $company)
    {
        $company->update(['status' => 'verified']);
        return back()->with('success', 'Perusahaan berhasil diverifikasi!');
    }

    // Reject perusahaan
    public function rejectCompany(Company $company)
    {
        $company->update(['status' => 'rejected']);
        return back()->with('success', 'Perusahaan berhasil direject!');
    }

    // Kelola kategori
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    // Tambah kategori
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:100', 'unique:categories'],
        ]);

        Category::create($request->only('name', 'slug'));

        return back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Hapus kategori
    public function destroyCategory(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}