<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()
                ->withErrors(['email' => 'Email tidak terdaftar!'])
                ->onlyInput('email');
        }

        if (! Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['password' => 'Password salah!'])
                ->onlyInput('email');
        }

        Auth::login($user, $request->filled('remember'));
        $request->session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->intended('/dashboard');
        }

        if ($user->role === 'siswa') {
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'role' => 'Akses ditolak untuk role ini!'
        ]);

    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
