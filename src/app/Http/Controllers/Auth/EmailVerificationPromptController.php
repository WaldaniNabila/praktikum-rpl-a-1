<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Menampilkan prompt verifikasi email.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->route(match ($request->user()->role) {
                        'admin'      => 'admin.dashboard',
                        'company'    => 'company.dashboard',
                        'job_seeker' => 'job_seeker.dashboard',
                        default      => 'dashboard',
                    })
                    : view('auth.verify-email');
    }
}
