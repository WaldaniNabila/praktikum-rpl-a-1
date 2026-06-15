<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function show(Company $company)
    {
        $activeJobs = $company->jobListings()
            ->with('category')
            ->where('status', 'approved')
            ->where('is_open', true)
            ->latest()
            ->paginate(6);

        return view('companies.show', compact('company', 'activeJobs'));
    }
}
