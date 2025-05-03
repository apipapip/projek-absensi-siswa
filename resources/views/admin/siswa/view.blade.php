@extends('template-admin.layout')
@section('title', 'Detail Data Siswa')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title"><i class="bi bi-info-circle"></i> Detail Data Siswa</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <!-- NISN -->
                            <div class="col-12 mb-3">
                                <label for="NISN" class="fw-bold"><i class="bi bi-person-badge"></i> NISN</label>
                                <p class="form-control-static border rounded p-2">{{ $siswa->NISN }}</p>
                            </div>

                            <!-- Nama -->
                            <div class="col-12 mb-3">
                                <label for="nama" class="fw-bold"><i class="bi bi-person"></i> Nama</label>
                                <p class="form-control-static border rounded p-2">{{ $siswa->nama }}</p>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="email" class="fw-bold"><i class="bi bi-envelope"></i> Email</label>
                                <p class="form-control-static border rounded p-2">{{ $siswa->user->email }}</p>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-12 mb-3">
                                <label for="jk" class="fw-bold"><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin</label>
                                <p class="form-control-static border rounded p-2">{{ $siswa->jk }}</p>
                            </div>

                            <!-- No Telepon -->
                            <div class="col-12 mb-3">
                                <label for="no_telp" class="fw-bold"><i class="bi bi-telephone"></i> No Telepon</label>
                                <p class="form-control-static border rounded p-2">{{ $siswa->no_telp }}</p>
                            </div>

                            <!-- Jurusan -->
                            <div class="col-12 mb-3">
                                <label for="jurusan" class="fw-bold"><i class="bi bi-book"></i> Jurusan</label>
                                <p class="form-control-static border rounded p-2">{{ $siswa->jurusan }}</p>
                            </div>

                            <!-- Username -->
                            <div class="col-12 mb-3">
                                <label for="username" class="fw-bold"><i class="bi bi-person-circle"></i> Username</label>
                                <p class="form-control-static border rounded p-2">{{ $siswa->username }}</p>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('siswa.index') }}" class="btn btn-primary me-1 mb-1">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection