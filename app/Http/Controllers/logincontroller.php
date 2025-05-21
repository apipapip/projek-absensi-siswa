<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class logincontroller extends Controller
{
    //
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();

        // Cek apakah user ini adalah guru
        $guru = guru::where('username', $user->username)->first();
        if ($guru) {
            return redirect()->route('dashboard-guru');
        }

        // Cek apakah user ini adalah siswa
        $siswa = siswa::where('username', $user->username)->first();
        if ($siswa) {
            return redirect()->route('rekap.index');
           
        }

        // Jika user adalah admin
        if ($user->level === 'admin') {
            return redirect()->route('home');
        }

        // Jika role tidak dikenali
        Auth::logout();
        return redirect()->back()->with('loginError', 'Role tidak dikenali');
    }

    return back()->with('loginError', 'Login failed, please try again');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
