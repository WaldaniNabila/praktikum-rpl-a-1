<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'industry',
        'description',
        'logo_path',
        'phone',
        'address',
        'status',
    ];

    // Relasi ke User (1:1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke JobListings (1:N)
    public function jobListings()
    {
        return $this->hasMany(JobListing::class);
    }

    // Helper cek status
    public function isVerified()
    {
        return $this->status === 'verified';
    }
}