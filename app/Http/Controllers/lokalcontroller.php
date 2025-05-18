<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\lokal;
use App\Models\jurusan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class lokalcontroller extends Controller
{
    public function index()
    {
        $lokal = lokal::all();
        return view('admin.lokal.index', [
            'menu' => 'lokal',
            'title' => 'Data lokal',
            'lokal' => $lokal
        ]);
    }

    public function create()
    {
        $jurusan = jurusan::all();
        $guru = guru::all();

        // Ambil ID wali kelas yang sudah digunakan
        $guru_terpakai = lokal::pluck('guru_id')->toArray();

        return view('admin.lokal.create', [
            'menu' => 'lokal',
            'title' => 'Tambah Data Kelas',
            'jurusan' => $jurusan,
            'guru' => $guru,
            'guru_terpakai' => $guru_terpakai // Kirim data guru yang sudah dipakai
        ]);
    }
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required', // Angkatan (X, XI, XII, XIII)
            'jurusan_id' => 'required',
            'guru_id' => 'required'
        ], [
            'nama.required' => 'Angkatan harus dipilih',
            'jurusan_id.required' => 'Jurusan harus dipilih',
            'guru_id.required' => 'Wali kelas harus dipilih'
        ]);

        // Ambil nama jurusan berdasarkan jurusan_id
        $jurusan = Jurusan::find($validasi['jurusan_id']);

        if (!$jurusan) {
            return back()->withErrors(['jurusan_id' => 'Jurusan tidak ditemukan']);
        }

        // Gabungkan angkatan dengan nama jurusan (menggunakan huruf)
        $nama_kelas = $validasi['nama'] . ' ' . $jurusan->kode_jurusan;

        // Simpan data ke database
        $lokal = new lokal();
        $lokal->nama = $nama_kelas;
        $lokal->jurusan_id = $validasi['jurusan_id'];
        $lokal->guru_id = $validasi['guru_id'];
        $lokal->save();
        
        return redirect(route('lokal.index'))->with('success', 'Data kelas berhasil ditambahkan dan level user diperbarui menjadi walikelas');
    }

    public function show($id)
    {
        $lokal = lokal::with(['jurusan', 'guru'])->findOrFail($id);
        return view('admin.lokal.view', [
            'menu' => 'lokal',
            'title' => 'Detail Data Kelas',
            'lokal' => $lokal
        ]);
    }
}
