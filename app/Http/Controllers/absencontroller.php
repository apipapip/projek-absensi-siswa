<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\lokal;
use App\Models\siswa;
use App\Models\absensi;
use App\Models\mengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class absencontroller extends Controller
{
   public function index(Request $request)
{
    $query = absensi::with(['siswa.lokal', 'guru']);

    if ($request->has('kelas') && $request->kelas != '') {
        $query->whereHas('siswa', function ($q) use ($request) {
            $q->where('lokal_id', $request->kelas);
        });
    }

    if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
        $query->whereDate('tanggal', $request->tanggal_absen);
    }

    $dataabsen = $query->get();
    $lokals = lokal::all();

    return view('guru.absen.index', [
        'menu' => 'absen',
        'title' => 'Data Absen',
        'dataabsen' => $dataabsen,
        'lokals' => $lokals
    ]);
}

    public function create(Request $request)
    {
        $lokals = \App\Models\lokal::all();
        $datasiswa = collect();

        if ($request->has('kelas') && $request->kelas != '') {
            $datasiswa = \App\Models\siswa::where('lokal_id', $request->kelas)->get();
        }

        return view('guru.absen.create', [
            'menu' => 'absen',
            'title' => 'Absen Siswa',
            'lokals' => $lokals,
            'datasiswa' => $datasiswa
        ]);
    }

    public function store(Request $request)
    {
        // Implementasi penyimpanan data absen
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|array',
            'status.*' => 'in:hadir,sakit,alfa',
        ]);

        $statuses = $request->input('status', []);
        $currentDate = now()->toDateString();
        $currentTime = now()->toTimeString();
        $guru = guru::where('username', Auth::user()->username)->first();

        // Ambil mapel_id dari relasi guru ke mapel
        $mapel_id = $guru->mapel_id; // Pastikan kolom 'mapel' di guru berisi mapel_id

        foreach ($statuses as $id => $status) {
            // Simpan ke tabel absensi
            absensi::create([
                'tanggal'   => $currentDate,
                'jam'       => $currentTime,
                'status'    => $status,
                'guru_id'   => $guru->id,
                'siswa_id'  => $id,
            ]);
        }

        // Simpan ke tabel mengajar
        if ($mapel_id) {
            mengajar::firstOrCreate([
                'guru_id'  => $guru->id,
                'mapel_id' => $mapel_id,
            ]);
        }

        // Contoh: Simpan ke tabel mapel (misal log kehadiran mapel)
        if ($mapel_id) {
            \App\Models\mapel::updateOrCreate(
                ['id' => $mapel_id],
                [
                    // Update kolom yang diinginkan, misal update jadwal_mapel
                    'jadwal_mapel' => $currentDate . ' ' . $currentTime,
                ]
            );
        }

        return redirect()->route('absen.index')->with('success', 'Status absen siswa berhasil disimpan.');
    }

    public function edit($id)
    {
        $absen = absensi::with(['siswa', 'guru'])->findOrFail($id);
        $statuses = ['hadir', 'sakit', 'alfa'];
        return view('guru.absen.edit', [
            'menu' => 'absen',
            'title' => 'Edit Absen',
            'absen' => $absen,
            'statuses' => $statuses
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:hadir,sakit,alfa',
        ]);

        $absen = absensi::findOrFail($id);

        // Update status, guru, tanggal, dan jam saat diedit
        $absen->status = $request->status;
        $absen->guru_id = \App\Models\guru::where('username', Auth::user()->username)->first()->id;
        $absen->tanggal = now()->toDateString();
        $absen->jam = now()->toTimeString();
        $absen->save();

        return redirect()->route('absen.index')->with('success', 'Data absen berhasil diupdate.');
    }
}
