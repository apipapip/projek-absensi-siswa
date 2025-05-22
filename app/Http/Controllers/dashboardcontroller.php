<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\lokal;
use App\Models\siswa;
use App\Models\absensi;
use App\Models\jurusan;
use App\Models\mengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardcontroller extends Controller
{
    public function index()
    {
        $jumlahSiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLocal = lokal::count(); // Menghitung jumlah local
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan
        $jumlahMengajar = mengajar::count(); // Menghitung jumlah mengajar
        $jumlahAbsen = absensi::count(); // Menghitung jumlah absen
        return view('admin.index', [
            'menu' => 'dashboard-admin',
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahLokal' => $jumlahLocal,
            'jumlahJurusan' => $jumlahJurusan,
            'jumlahMengajar' => $jumlahMengajar,
            'jumlahAbsen' => $jumlahAbsen,
        ]);
    }
    public function guru()
    {
        $jumlahSiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLocal = lokal::count(); // Menghitung jumlah local
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan
        $jumlahMengajar = mengajar::count(); // Menghitung jumlah mengajar
        $jumlahAbsen = absensi::count(); // Menghitung jumlah absen

        // Ambil data guru yang sedang login
        $guru = guru::where('username', Auth::user()->username)->first();

        return view('guru.index', [
            'menu' => 'dashboard-guru',
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahLokal' => $jumlahLocal,
            'jumlahJurusan' => $jumlahJurusan,
            'jumlahMengajar' => $jumlahMengajar,
            'jumlahAbsen' => $jumlahAbsen,
            'guru' => $guru,
        ]);
    }
    public function siswa()
    {
        $siswa = siswa::where('username', Auth::user()->username)->firstOrFail();
        $rekapAbsensi = absensi::where('siswa_id', $siswa->id)->get();

        $jumlahHadir = $rekapAbsensi->where('status', 'hadir')->count();
        $jumlahSakit = $rekapAbsensi->where('status', 'sakit')->count();
        $jumlahAlfa  = $rekapAbsensi->where('status', 'alfa')->count();

        return view('siswa.index', [
            'menu' => 'dashboard',
            'siswa' => $siswa,
            'rekapAbsensi' => $rekapAbsensi,
            'jumlahHadir' => $jumlahHadir,
            'jumlahSakit' => $jumlahSakit,
            'jumlahAlfa'  => $jumlahAlfa,
        ]);
    }
}
