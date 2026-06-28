<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\JobSeeker;
use App\Models\Company;

class User extends Authenticatable
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
}