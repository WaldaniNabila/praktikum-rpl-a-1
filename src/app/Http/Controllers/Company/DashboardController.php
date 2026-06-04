<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Tampilkan dashboard perusahaan
    public function index()
    {
        $company = Auth::user()->company;

        $totalJobs      = JobListing::where('company_id', $company->id)->count();
        $activeJobs     = JobListing::where('company_id', $company->id)->where('is_open', true)->count();
        $pendingJobs    = JobListing::where('company_id', $company->id)->where('status', 'pending')->count();
        $totalApplicants = Application::whereHas('jobListing', function($q) use ($company) {
            $q->where('company_id', $company->id);
        })->count();

        $recentJobs = JobListing::where('company_id', $company->id)
            ->latest()->take(5)->get();

        return view('company.dashboard', compact(
            'company',
            'totalJobs',
            'activeJobs',
            'pendingJobs',
            'totalApplicants',
            'recentJobs'
        ));
    }

    // Tampilkan profil perusahaan
    public function profile()
    {
        $company = Auth::user()->company;
        return view('company.profile', compact('company'));
    }

    // Update profil perusahaan
    public function updateProfile(\App\Http\Requests\UpdateCompanyProfileRequest $request)
    {
        $user = Auth::user();
        $company = $user->company;

        // Update User table (name & email)
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $data = $request->except(['name', 'email']);

        if ($request->hasFile('logo_path')) {
            if ($company->logo_path) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($company->logo_path);
            }
            $data['logo_path'] = $request->file('logo_path')->store('company_logos', 'public');
        }

        $company->update($data);

        return back()->with('success', 'Profil perusahaan berhasil diupdate!');
    }

    // Tampilkan semua lowongan perusahaan
    public function jobs()
    {
        $company  = Auth::user()->company;
        $jobs     = JobListing::where('company_id', $company->id)->latest()->paginate(10);
        return view('company.jobs.index', compact('jobs'));
    }

    // Form buat lowongan baru
    public function createJob()
    {
        $categories = Category::all();
        return view('company.jobs.create', compact('categories'));
    }

    // Simpan lowongan baru
    public function storeJob(Request $request)
    {
        $request->validate([
            'title'           => ['required', 'string', 'max:150'],
            'category_id'     => ['required', 'exists:categories,id'],
            'description'     => ['required', 'string'],
            'requirements'    => ['required', 'string'],
            'location'        => ['required', 'string', 'max:100'],
            'employment_type' => ['required', 'in:full-time,part-time,contract,internship'],
            'work_type'       => ['required', 'in:remote,on-site,hybrid'],
            'salary_min'      => ['nullable', 'integer'],
            'salary_max'      => ['nullable', 'integer'],
        ]);

        $company = Auth::user()->company;

        JobListing::create([
            'company_id'      => $company->id,
            'category_id'     => $request->category_id,
            'title'           => $request->title,
            'description'     => $request->description,
            'requirements'    => $request->requirements,
            'location'        => $request->location,
            'employment_type' => $request->employment_type,
            'work_type'       => $request->work_type,
            'salary_min'      => $request->salary_min,
            'salary_max'      => $request->salary_max,
            'status'          => 'pending',
            'is_open'         => true,
        ]);

        return redirect()->route('company.dashboard')
            ->with('success', 'Lowongan berhasil diposting! Menunggu persetujuan admin.');
    }

    // Form edit lowongan
    public function editJob(JobListing $jobListing)
    {
        $this->authorizeJob($jobListing);
        $categories = Category::all();
        return view('company.jobs.edit', compact('jobListing', 'categories'));
    }

    // Update lowongan
    public function updateJob(Request $request, JobListing $jobListing)
    {
        $this->authorizeJob($jobListing);

        $request->validate([
            'title'           => ['required', 'string', 'max:150'],
            'category_id'     => ['required', 'exists:categories,id'],
            'description'     => ['required', 'string'],
            'requirements'    => ['required', 'string'],
            'location'        => ['required', 'string', 'max:100'],
            'employment_type' => ['required', 'in:full-time,part-time,contract,internship'],
            'work_type'       => ['required', 'in:remote,on-site,hybrid'],
            'salary_min'      => ['nullable', 'integer'],
            'salary_max'      => ['nullable', 'integer'],
        ]);

        $jobListing->update($request->all());

        return redirect()->route('company.dashboard')
            ->with('success', 'Lowongan berhasil diupdate!');
    }

    // Hapus lowongan
    public function destroyJob(JobListing $jobListing)
    {
        $this->authorizeJob($jobListing);
        $jobListing->delete();
        return redirect()->route('company.dashboard')
            ->with('success', 'Lowongan berhasil dihapus!');
    }

    // Lihat pelamar per lowongan
    public function applicants(JobListing $jobListing)
    {
        $this->authorizeJob($jobListing);
        $applications = Application::with(['jobSeeker.user'])
            ->where('job_id', $jobListing->id)
            ->latest()->get();
        return view('company.jobs.applicants', compact('jobListing', 'applications'));
    }

    // Update status lamaran
    public function updateApplicationStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => ['required', 'in:waiting,process,accepted,rejected'],
        ]);

        $application->update(['status' => $request->status]);

        return back()->with('success', 'Status lamaran berhasil diupdate!');
    }

    // Helper authorize
    private function authorizeJob(JobListing $jobListing)
    {
        if ($jobListing->company_id !== Auth::user()->company->id) {
            abort(403);
        }
    }
}