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

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }

    public function jobListing()
    {
        return $this->belongsTo(JobListing::class, 'job_id');
    }

    public function isAccepted()
    {
        return $this->status === 'accepted';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }
}