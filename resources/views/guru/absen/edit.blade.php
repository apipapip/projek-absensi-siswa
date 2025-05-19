
@extends('template-guru.layout')
@section('title', 'Edit Absen Siswa')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('content')


<div class="card">
    <h5 class="card-header">Edit Absen Siswa</h5>
    <div class="card-body">
        <form method="POST" action="{{ route('absen.update', $absen->id) }}">
            @csrf
            @method('PUT')
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>alfa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $absen->siswa->nama }}</td>
                        <td>{{ $absen->siswa->lokal->nama }}</td>
                        <td>
                            <input type="radio" name="status" value="hadir" {{ $absen->status == 'hadir' ? 'checked' : '' }}>
                        </td>
                        <td>
                            <input type="radio" name="status" value="sakit" {{ $absen->status == 'sakit' ? 'checked' : '' }}>
                        </td>
                        <td>
                            <input type="radio" name="status" value="alfa" {{ $absen->status == 'alfa' ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-sm-10 text-start ms-auto">
                    <a href="{{ route('absen.index') }}" class="btn btn-success btn-custom-width mb-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="col-sm-2 text-right">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection