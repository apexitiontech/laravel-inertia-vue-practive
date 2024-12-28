<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'avatar' => 'nullable|file|max:1024'
        ]);

        if ($request->has('avatar')) {

            $validated_data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user =  User::create($validated_data);
        Auth::login($user);
        return redirect()->route('dashboard');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))->with('success', 'You are logged in');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended(route('home'));
    }
    public function dashboard()
    {
        $users = User::paginate(10);

        return Inertia::render('Auth/Dashboard', [
            'users' => $users
        ]);
    }
}
