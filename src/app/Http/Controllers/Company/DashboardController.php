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

    public function profile()
    {
        $company = Auth::user()->company;
        return view('company.profile', compact('company'));
    }

    public function updateProfile(\App\Http\Requests\UpdateCompanyProfileRequest $request)
    {
        $user = Auth::user();
        $company = $user->company;

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

    public function jobs()
    {
        $company  = Auth::user()->company;
        $jobs     = JobListing::where('company_id', $company->id)->latest()->paginate(10);
        return view('company.jobs.index', compact('jobs'));
    }

    public function createJob()
    {
        $categories = Category::all();
        return view('company.jobs.create', compact('categories'));
    }

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

    public function editJob(JobListing $jobListing)
    {
        $this->authorizeJob($jobListing);
        $categories = Category::all();
        return view('company.jobs.edit', compact('jobListing', 'categories'));
    }

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
            'is_open'         => ['required', 'boolean'],
        ]);

        $jobListing->update($request->all());

        return redirect()->route('company.dashboard')
            ->with('success', 'Lowongan berhasil diupdate!');
    }

    public function destroyJob(JobListing $jobListing)
    {
        $this->authorizeJob($jobListing);
        $jobListing->delete();
        return redirect()->route('company.dashboard')
            ->with('success', 'Lowongan berhasil dihapus!');
    }

    public function applicants(JobListing $jobListing)
    {
        $this->authorizeJob($jobListing);
        $applications = Application::with(['jobSeeker.user'])
            ->where('job_id', $jobListing->id)
            ->latest()->get();
        return view('company.jobs.applicants', compact('jobListing', 'applications'));
    }

    public function applicantProfile(\App\Models\JobSeeker $jobSeeker)
    {
        $hasApplied = \App\Models\Application::where('job_seeker_id', $jobSeeker->id)
            ->whereHas('jobListing', function($q) {
                $q->where('company_id', Auth::user()->company->id);
            })->exists();

        if (!$hasApplied) {
            abort(403, 'Anda tidak memiliki akses untuk melihat profil kandidat ini karena kandidat tidak melamar di perusahaan Anda.');
        }

        $jobSeeker->load('user');

        return view('company.job_seekers.show', compact('jobSeeker'));
    }

    public function updateApplicationStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => ['required', 'in:waiting,process,accepted,rejected'],
        ]);

        $application->update(['status' => $request->status]);

        return back()->with('success', 'Status lamaran berhasil diupdate!');
    }

    private function authorizeJob(JobListing $jobListing)
    {
        if ($jobListing->company_id !== Auth::user()->company->id) {
            abort(403);
        }
    }
}