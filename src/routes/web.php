<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\JobSeeker\DashboardController as JobSeekerDashboard;
use App\Http\Controllers\Company\DashboardController as CompanyDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/lowongan', [JobListingController::class, 'index'])->name('jobs.index');
Route::get('/lowongan/{jobListing}', [JobListingController::class, 'show'])->name('jobs.show');

Route::get('/perusahaan/{company}', [CompanyController::class, 'show'])->name('companies.show');

Route::middleware(['auth', 'verified', 'role:job_seeker'])->prefix('job-seeker')->name('job_seeker.')->group(function () {
    Route::get('/dashboard',     [JobSeekerDashboard::class, 'index'])->name('dashboard');
    Route::get('/lamaran',       [JobSeekerDashboard::class, 'applications'])->name('applications');
    Route::get('/profil',        [JobSeekerDashboard::class, 'profile'])->name('profile');
    Route::put('/profil',        [JobSeekerDashboard::class, 'updateProfile'])->name('profile.update');

    Route::post('/lamar/{jobListing}',        [ApplicationController::class, 'store'])->name('apply');
    Route::delete('/lamaran/{application}',   [ApplicationController::class, 'destroy'])->name('application.cancel');

    Route::post('/bookmark/{jobListing}',     [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
    Route::get('/tersimpan',                  [BookmarkController::class, 'index'])->name('bookmarks');

    Route::delete('/profil/foto',             [JobSeekerDashboard::class, 'deleteProfilePicture'])->name('profile.photo.delete');
    Route::delete('/profil/cv',               [JobSeekerDashboard::class, 'deleteCv'])->name('profile.cv.delete');
    
});

Route::middleware(['auth', 'verified', 'role:company'])->prefix('company')->name('company.')->group(function () {
    Route::get('/dashboard',                  [CompanyDashboard::class, 'index'])->name('dashboard');
    Route::get('/profil',                     [CompanyDashboard::class, 'profile'])->name('profile');
    Route::put('/profil',                     [CompanyDashboard::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profil/logo',             [CompanyDashboard::class, 'deleteLogo'])->name('profile.logo.delete');
    Route::get('/lowongan',                   [CompanyDashboard::class, 'jobs'])->name('jobs');
    Route::get('/lowongan/buat',              [CompanyDashboard::class, 'createJob'])->name('jobs.create');
    Route::post('/lowongan',                  [CompanyDashboard::class, 'storeJob'])->name('jobs.store');
    Route::get('/lowongan/{jobListing}/edit', [CompanyDashboard::class, 'editJob'])->name('jobs.edit');
    Route::put('/lowongan/{jobListing}',      [CompanyDashboard::class, 'updateJob'])->name('jobs.update');
    Route::delete('/lowongan/{jobListing}',   [CompanyDashboard::class, 'destroyJob'])->name('jobs.destroy');
    Route::get('/lowongan/{jobListing}/pelamar', [CompanyDashboard::class, 'applicants'])->name('jobs.applicants');
    Route::get('/pelamar/{jobSeeker}',        [CompanyDashboard::class, 'applicantProfile'])->name('applicants.show');
    Route::put('/lamaran/{application}/status',  [CompanyDashboard::class, 'updateApplicationStatus'])->name('application.status');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',                  [AdminDashboard::class, 'index'])->name('dashboard');

    Route::get('/lowongan',                   [AdminDashboard::class, 'jobs'])->name('jobs');
    Route::put('/lowongan/{jobListing}/approve', [AdminDashboard::class, 'approveJob'])->name('jobs.approve');
    Route::put('/lowongan/{jobListing}/reject',  [AdminDashboard::class, 'rejectJob'])->name('jobs.reject');

    Route::get('/users',                      [AdminDashboard::class, 'users'])->name('users');
    Route::put('/users/{user}/toggle',        [AdminDashboard::class, 'toggleUser'])->name('users.toggle');
    Route::delete('/users/{user}',            [AdminDashboard::class, 'destroyUser'])->name('users.destroy');

    Route::get('/perusahaan',                 [AdminDashboard::class, 'companies'])->name('companies');
    Route::put('/perusahaan/{company}/verify', [AdminDashboard::class, 'verifyCompany'])->name('companies.verify');
    Route::put('/perusahaan/{company}/reject', [AdminDashboard::class, 'rejectCompany'])->name('companies.reject');

    Route::get('/kategori',                   [AdminDashboard::class, 'categories'])->name('categories');
    Route::post('/kategori',                  [AdminDashboard::class, 'storeCategory'])->name('categories.store');
    Route::delete('/kategori/{category}',     [AdminDashboard::class, 'destroyCategory'])->name('categories.destroy');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    return match ($user->role) {
        'admin'      => redirect()->route('admin.dashboard'),
        'company'    => redirect()->route('company.dashboard'),
        'job_seeker' => redirect()->route('job_seeker.dashboard'),
        default      => abort(403),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', array(ProfileController::class, 'destroy'))->name('profile.destroy');
});

require __DIR__.'/auth.php';