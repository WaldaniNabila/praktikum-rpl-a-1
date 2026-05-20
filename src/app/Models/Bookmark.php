<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bookmark extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'job_seeker_id',
        'job_id',
        'created_at',
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
}