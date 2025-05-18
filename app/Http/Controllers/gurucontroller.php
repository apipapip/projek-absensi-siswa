<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use App\Models\mapel;
use Illuminate\Http\Request;

class gurucontroller extends Controller
{
    public function index()
    {
        $guru = guru::all();
        return view('admin.guru.index', [
            'menu' => 'guru',
            'title' => 'Data guru',
            'guru' => $guru
        ]);
    }

    public function create()
    {
        $users = User::all(); // Ambil semua data user
        return view('admin.guru.create', [
            'menu' => 'guru',
            'title' => 'Tambah Data guru',
            'users' => $users, // Kirim data user ke view
        ]);
    }

    public function store(Request $request)
    {
        
        $validasi = $request->validate([
            'NIP' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'jk' => 'required',
            'mapel' => 'required',
            'username' => 'required',
            'password' => 'required',
            
        ], [
            'NIP.required' => 'NIP harus diisi',
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'no_telp.required' => 'No Telepon harus diisi',
            'jk.required' => 'Jenis Kelamin harus dipilih',
            'mapel.required' => 'Mata Pelajaran harus diisi',
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            
        ]);

        $mapel = new mapel;
        $mapel->nama_mapel = $validasi['mapel'];
        $mapel-> save();

        $user = new User;
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'guru'; // Set level user sebagai guru
        $user->save();

        $guru = new guru;
        $guru->NIP = $validasi['NIP'];
        $guru->nama = $validasi['nama'];
        $guru->no_telp = $validasi['no_telp'];
        $guru->jk = $validasi['jk'];
        $guru->mapel = $validasi['mapel'];
        $guru->username = $validasi['username'];
        $guru->password = bcrypt($validasi['password']);
        $guru->mapel_id = $mapel->id; // Ambil ID mapel yang baru saja dibuat
        $guru->user_id = $user->id; // Ambil ID user yang baru saja dibuat
        $guru->save();

        return redirect(route('guru.index'));
    }

    public function show($id)
    {
        $guru = guru::findOrFail($id);
        return view('admin.guru.view', [
            'menu' => 'guru',
            'title' => 'Detail Data guru',
            'guru' => $guru
        ]);
    }

    public function edit($id)
    {
        $guru = guru::findOrFail($id);
        $users = User::all(); // Ambil semua data user
        return view('admin.guru.edit', [
            'menu' => 'guru',
            'title' => 'Edit Data guru',
            'guru' => $guru,
            'users' => $users, // Kirim data user ke view
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'NIP' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'jk' => 'required',
            'mapel' => 'required',
            'username' => 'required',
            'password' => 'nullable', // Password bisa kosong jika tidak ingin diubah
        ], [
            'NIP.required' => 'NIP harus diisi',
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'no_telp.required' => 'No Telepon harus diisi',
            'jk.required' => 'Jenis Kelamin harus dipilih',
            'mapel.required' => 'Mata Pelajaran harus diisi',
            'username.required' => 'Username harus diisi',
        ]);

        $guru = guru::findOrFail($id);
        $guru->NIP = $validasi['NIP'];
        $guru->nama = $validasi['nama'];
        $guru->no_telp = $validasi['no_telp'];
        $guru->jk = $validasi['jk'];
        $guru->mapel = $validasi['mapel'];
        $guru->username = $validasi['username'];

        if (!empty($validasi['password'])) {
            $guru->password = bcrypt($validasi['password']);
        }

        $guru->save();

        $user = User::findOrFail($guru->user_id);
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];

        if (!empty($validasi['password'])) {
            $user->password = bcrypt($validasi['password']);
        }

        $user->save();

        return redirect(route('guru.index'))->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        $guru = guru::findOrFail($id);
        $user = User::findOrFail($guru->user_id);

        // Hapus data guru dan user
        $guru->delete();
        $user->delete();

        return redirect(route('guru.index'))->with('success', 'Data guru berhasil dihapus');
    }
}
