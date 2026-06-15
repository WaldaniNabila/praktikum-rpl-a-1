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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isOpen()
    {
        return $this->is_open === true;
    }
}