<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapController extends Controller
{
     public function index()
    {
        $siswa = siswa::where('username', Auth::user()->username)->firstOrFail();
        $rekapAbsensi = absensi::where('siswa_id', $siswa->id)->with('guru')->get();

        return view('siswa.index', [
            'menu' => 'dashboard',
            'title' => 'Rekap Absensi ' . $siswa->nama,
            'siswa' => $siswa,
            'rekapAbsensi' => $rekapAbsensi
        ]);
    }
}
