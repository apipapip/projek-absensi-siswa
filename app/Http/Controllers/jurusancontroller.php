<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;

class jurusancontroller extends Controller
{
    public function index()
    {
        $jurusan = jurusan::all();
        return view('admin.jurusan.index', [
            'menu' => 'jurusan',
            'title' => 'Data jurusan',
            'jurusan' => $jurusan
        ]);
    }

    public function create()
 {
        return view('admin.jurusan.create', [
            'menu' => 'jurusan',
            'title' => 'Tambah Data jurusan',
           
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required',
           
        ], [
            'nama_jurusan.required' => 'Nama Jurusan Harus Diisi',
            'kode_jurusan.required' => 'Kode Jurusan Harus Diisi',
         
        ]);

        $jurusan = new jurusan;
        $jurusan->nama_jurusan = $validasi['nama_jurusan'];
        $jurusan->kode_jurusan = $validasi['kode_jurusan'];
      
        $jurusan->save();
        return redirect(route('jurusan.index'));
    }

    public function edit($id)
    {
        $jurusan = jurusan::findOrFail($id);
        return view('admin.jurusan.edit', [
            'menu' => 'jurusan',
            'title' => 'Edit Data Jurusan',
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required',
        ], [
            'nama_jurusan.required' => 'Nama Jurusan Harus Diisi',
            'kode_jurusan.required' => 'Kode Jurusan Harus Diisi',
        ]);

        $jurusan = jurusan::findOrFail($id);
        $jurusan->nama_jurusan = $validasi['nama_jurusan'];
        $jurusan->kode_jurusan = $validasi['kode_jurusan'];
        $jurusan->save();

        return redirect(route('jurusan.index'));
    }
}
