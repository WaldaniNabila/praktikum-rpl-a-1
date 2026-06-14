<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Models\JobSeeker;
use App\Models\Company;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke JobSeeker (1:1)
    public function jobSeeker()
    {
        return $this->hasOne(JobSeeker::class);
    }

    // Relasi ke Company (1:1)
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    // Helper cek role
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isCompany()
    {
        return $this->role === 'company';
    }

    public function isJobSeeker()
    {
        return $this->role === 'job_seeker';
    }

    public function sendEmailVerificationNotification()
    {
        // Generate random 6-digit OTP
        $otp = rand(100000, 999999);

        // Store OTP in Cache for 15 minutes, keyed by user ID
        \Illuminate\Support\Facades\Cache::put('otp_verification_' . $this->id, $otp, now()->addMinutes(15));

        // Send the custom OTP email
        \Illuminate\Support\Facades\Mail::to($this->email)->send(new \App\Mail\OtpVerificationMail($otp));
    }
}