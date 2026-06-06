<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(\Illuminate\Http\Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $redirectRoute = match ($request->user()->role) {
            'admin' => route('admin.dashboard', absolute: false),
            'company' => route('company.dashboard', absolute: false),
            'job_seeker' => route('job_seeker.dashboard', absolute: false),
            default => route('dashboard', absolute: false),
        };

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended($redirectRoute.'?verified=1');
        }

        $cachedOtp = \Illuminate\Support\Facades\Cache::get('otp_verification_' . $request->user()->id);

        if (!$cachedOtp || $cachedOtp != $request->otp) {
            return back()->withErrors(['otp' => 'Kode verifikasi salah atau sudah kedaluwarsa.']);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        \Illuminate\Support\Facades\Cache::forget('otp_verification_' . $request->user()->id);

        return redirect()->intended($redirectRoute.'?verified=1');
    }
}
