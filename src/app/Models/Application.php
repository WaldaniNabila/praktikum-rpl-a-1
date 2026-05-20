<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_seeker_id',
        'job_id',
        'cover_letter',
        'cv_path',
        'status',
    ];

    // Relasi ke JobSeeker (N:1)
    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }

    // Relasi ke JobListing (N:1)
    public function jobListing()
    {
        return $this->belongsTo(JobListing::class, 'job_id');
    }

    // Helper cek status
    public function isAccepted()
    {
        return $this->status === 'accepted';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }
}