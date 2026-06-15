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

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class);
    }

    public function jobListing()
    {
        return $this->belongsTo(JobListing::class, 'job_id');
    }
}