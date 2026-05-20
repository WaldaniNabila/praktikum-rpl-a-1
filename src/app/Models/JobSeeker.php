<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'profile_picture',
        'cv_path',
        'description',
    ];

    // Relasi ke User (1:1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Applications (1:N)
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    // Relasi ke Bookmarks (1:N)
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}