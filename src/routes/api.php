<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JobListingController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/jobs', [JobListingController::class, 'index']);
Route::get('/jobs/{id}', [JobListingController::class, 'show']);

use App\Http\Controllers\Api\JobSeekerController;
use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\BookmarkController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Job Seeker Profile & Dashboard
    Route::get('/job-seeker/dashboard', [JobSeekerController::class, 'dashboard']);
    Route::get('/job-seeker/profile', [JobSeekerController::class, 'profile']);
    Route::post('/job-seeker/profile', [JobSeekerController::class, 'updateProfile']); // POST because of file upload

    Route::get('/job-seeker/applications', [ApplicationController::class, 'index']);
    Route::post('/job-seeker/apply/{jobListing}', [ApplicationController::class, 'store']);
    Route::delete('/job-seeker/applications/{application}', [ApplicationController::class, 'destroy']);

    Route::get('/job-seeker/bookmarks', [BookmarkController::class, 'index']);
    Route::post('/job-seeker/bookmark/{jobListing}', [BookmarkController::class, 'toggle']);
});
