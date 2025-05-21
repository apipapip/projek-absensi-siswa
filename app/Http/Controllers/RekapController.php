<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapController extends Controller
{
     public function index(Request $request)
    {
        $siswa = siswa::where('username', Auth::user()->username)->firstOrFail();

        // Ambil bulan dan tahun dari request, default ke bulan & tahun sekarang
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        $rekapAbsensi = absensi::where('siswa_id', $siswa->id)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->with('guru')
            ->get();

        // Hitung jumlah status
        $jumlahHadir = $rekapAbsensi->where('status', 'hadir')->count();
        $jumlahSakit = $rekapAbsensi->where('status', 'sakit')->count();
        $jumlahAlfa  = $rekapAbsensi->where('status', 'alfa')->count();

        return view('siswa.rekap', [
            'menu' => 'dashboard',
            'title' => 'Rekap Absensi ' . $siswa->nama,
            'siswa' => $siswa,
            'rekapAbsensi' => $rekapAbsensi,
            'jumlahHadir' => $jumlahHadir,
            'jumlahSakit' => $jumlahSakit,
            'jumlahAlfa' => $jumlahAlfa,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }
}
