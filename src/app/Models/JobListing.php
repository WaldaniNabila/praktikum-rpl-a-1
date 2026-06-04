<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobListing extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $fillable = [
        'company_id',
        'category_id',
        'title',
        'description',
        'requirements',
        'location',
        'employment_type',
        'work_type',
        'salary_min',
        'salary_max',
        'status',
        'is_open',
    ];

    protected $casts = [
        'is_open' => 'boolean',
        'salary_min' => 'integer',
        'salary_max' => 'integer',
    ];

    // Relasi ke Company (N:1)
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relasi ke Category (N:1)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke Applications (1:N)
    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    // Relasi ke Bookmarks (1:N)
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    // Helper cek status
    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isOpen()
    {
        return $this->is_open === true;
    }
}