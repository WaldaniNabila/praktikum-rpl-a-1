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

    public function jobSeeker()
    {
        return $this->hasOne(JobSeeker::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

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
        $otp = rand(100000, 999999);

        \Illuminate\Support\Facades\Cache::put('otp_verification_' . $this->id, $otp, now()->addMinutes(15));

        \Illuminate\Support\Facades\Mail::to($this->email)->send(new \App\Mail\OtpVerificationMail($otp));
    }
}