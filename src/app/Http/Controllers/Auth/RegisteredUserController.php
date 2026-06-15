<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\JobSeeker;
use App\Models\Company;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan tampilan registrasi.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Menangani permintaan registrasi masuk.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['nullable', 'in:job_seeker,company,admin'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'job_seeker',
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->role === 'job_seeker') {
            JobSeeker::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
            ]);
        } elseif ($user->role === 'company') {
            Company::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'industry' => $request->industry ?? '-',
                'phone' => $request->phone,
                'address' => $request->address,
                'status' => 'pending',
            ]);
        }

        return redirect()->route('verification.notice');
    }
}
