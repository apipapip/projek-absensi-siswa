<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\lokal;
use App\Models\siswa;
use App\Models\jurusan;
use Illuminate\Http\Request;

class siswacontroller extends Controller
{
    public function index()
    {
        $siswa = siswa::all();
        return view('admin.siswa.index', [
            'menu' => 'siswa',
            'title' => 'Data siswa',
            'siswa' => $siswa
        ]);
    }

    public function create()
    {
        $jurusan = jurusan::all(); // Ambil semua data user
        $lokal = lokal::all(); // Ambil semua data lokal
        return view('admin.siswa.create', [
            'menu' => 'siswa',
            'title' => 'Tambah Data siswa',
            'kelas' => $lokal, // Kirim data lokal ke view
            'jurusan' => $jurusan, // Kirim data user ke view
        ]);
    }

    public function store(Request $request)
    {
        
        $validasi = $request->validate([
            'NISN' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'no_telp' => 'required|max:13',
            
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'lokal_id' => 'required',
           
        ], [
            'NISN.required' => 'NISN harus diisi',
            'nama.required' => 'Nama harus diisi',
            'jk.required' => 'Jenis Kelamin harus dipilih',
            'no_telp.required' => 'No Telepon harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'email.required' => 'Email harus diisi',
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            'lokal_id.required' => 'Lokal harus diisi',


        ]);

        $user = new User;
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'siswa'; // Set level user sebagai siswa
        $user->save();

        $siswa = new siswa;
        $siswa->NISN = $validasi['NISN'];
        $siswa->nama = $validasi['nama'];
        $siswa->jk = $validasi['jk'];
        $siswa->no_telp = $validasi['no_telp'];
        $siswa->username = $validasi['username'];
        $siswa->password = bcrypt($validasi['password']);
        $siswa->lokal_id = $validasi['lokal_id'];
        $siswa->user_id = $user->id; // Ambil ID user yang baru saja dibuat

        $siswa->save();

        return redirect(route('siswa.index'));
    }

    public function destroy($id)
    {
        $siswa = siswa::findOrFail($id);
        $user = User::findOrFail($siswa->user_id);

        $siswa->delete();
        $user->delete();

        return redirect(route('siswa.index'))->with('success', 'Data siswa berhasil dihapus');
    }
    public function show($id)
    {
        $siswa = siswa::find($id);
        return view('admin.siswa.view', [
            'menu' => 'siswa',
            'title' => 'Detail Data siswa',
            'siswa' => $siswa
        ]);
    }
    public function edit($id)
    {
        $siswa = siswa::findOrFail($id);
        $jurusan = jurusan::all(); // Ambil semua data jurusan

        return view('admin.siswa.edit', [
            'menu' => 'siswa',
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa,
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'NISN' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'no_telp' => 'required|max:13',
            'jurusan' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'nullable', // Password optional during update
        ], [
            'NISN.required' => 'NISN harus diisi',
            'nama.required' => 'Nama harus diisi',
            'jk.required' => 'Jenis Kelamin harus dipilih',
            'no_telp.required' => 'No Telepon harus diisi',
            'jurusan.required' => 'Jurusan harus diisi',
            'email.required' => 'Email harus diisi',
            'username.required' => 'Username harus diisi',
        ]);

        $siswa = siswa::findOrFail($id);
        $user = User::findOrFail($siswa->user_id);

        // Update user data
        $user->username = $validasi['username'];
        $user->email = $validasi['email'];
        if (!empty($validasi['password'])) {
            $user->password = bcrypt($validasi['password']);
        }
        $user->save();

        // Update siswa data
        $siswa->NISN = $validasi['NISN'];
        $siswa->nama = $validasi['nama'];
        $siswa->jk = $validasi['jk'];
        $siswa->no_telp = $validasi['no_telp'];
        $siswa->jurusan = $validasi['jurusan'];
        $siswa->username = $validasi['username'];
        if (!empty($validasi['password'])) {
            $siswa->password = bcrypt($validasi['password']);
        }
        $siswa->save();

        return redirect(route('siswa.index'))->with('success', 'Data siswa berhasil diperbarui');
    }
}
