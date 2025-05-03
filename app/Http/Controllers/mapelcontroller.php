<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use Illuminate\Http\Request;

class mapelcontroller extends Controller
{
    public function index()
    {
        $mapel = mapel::all();
        return view('admin.mapel.index', [
            'menu' => 'mapel',
            'title' => 'Data mapel',
            'mapel' => $mapel
        ]);
    }

    public function create()
    {

        return view('admin.mapel.create', [
            'menu' => 'mapel',
            'title' => 'Tambah Data mapel',
           
        ]);
    }

    public function store(Request $request)
    {
        
        $validasi = $request->validate([
            'nama_mapel' => 'required',
            
            
           
        ], [
            'nama_mapel.required' => 'nama_mapel harus diisi',
           
           


        ]);

        $mapel = new mapel;
        $mapel->nama_mapel = $validasi['nama_mapel'];
        $mapel->jadwal_mapel = now()->format('H:i:s');


        $mapel->save();

        return redirect(route('mapel.index'));
    }

    public function destroy($id)
    {
        $mapel = mapel::findOrFail($id);
        $mapel->delete();

        return redirect(route('mapel.index'))->with('success', 'Data mapel berhasil dihapus');
    }
}
