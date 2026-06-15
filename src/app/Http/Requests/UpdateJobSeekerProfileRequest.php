<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJobSeekerProfileRequest extends FormRequest
{
    /**
     * Menentukan apakah pengguna diizinkan untuk membuat permintaan ini.
     */
    public function authorize(): bool
    {
        return $this->user()->role === 'job_seeker';
    }

    /**
     * Mendapatkan aturan validasi yang berlaku untuk permintaan ini.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'description' => ['nullable', 'string'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'cv_path' => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
        ];
    }
}
