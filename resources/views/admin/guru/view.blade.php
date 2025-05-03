@extends('template-admin.layout')
@section('title', 'Detail Data Guru')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title">Detail Data Guru</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <!-- NIP -->
                            <div class="col-12 mb-3">
                                <label for="NIP" class="fw-bold">
                                    <i class="bi bi-person-badge"></i> NIP
                                </label>
                                <p class="form-control-static border p-2 rounded">{{ $guru->NIP }}</p>
                            </div>

                            <!-- Nama -->
                            <div class="col-12 mb-3">
                                <label for="nama" class="fw-bold">
                                    <i class="bi bi-person"></i> Nama
                                </label>
                                <p class="form-control-static border p-2 rounded">{{ $guru->nama }}</p>
                            </div>

                            <!-- Email -->
                            <div class="col-12 mb-3">
                                <label for="email" class="fw-bold">
                                    <i class="bi bi-envelope"></i> Email
                                </label>
                                <p class="form-control-static border p-2 rounded">{{ $guru->user->email }}</p>
                            </div>

                            <!-- Username -->
                            <div class="col-12 mb-3">
                                <label for="username" class="fw-bold">
                                    <i class="bi bi-person-circle"></i> Username
                                </label>
                                <p class="form-control-static border p-2 rounded">{{ $guru->username }}</p>
                            </div>

                            <!-- No Telp -->
                            <div class="col-12 mb-3">
                                <label for="no_telp" class="fw-bold">
                                    <i class="bi bi-telephone"></i> No Telepon
                                </label>
                                <p class="form-control-static border p-2 rounded">{{ $guru->no_telp }}</p>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-12 mb-3">
                                <label for="jk" class="fw-bold">
                                    <i class="bi bi-gender-ambiguous"></i> Jenis Kelamin
                                </label>
                                <p class="form-control-static border p-2 rounded">{{ $guru->jk == 'pria' ? 'Pria' : 'Wanita' }}</p>
                            </div>

                            <!-- Mapel -->
                            <div class="col-12 mb-3">
                                <label for="mapel" class="fw-bold">
                                    <i class="bi bi-book"></i> Mata Pelajaran
                                </label>
                                <p class="form-control-static border p-2 rounded">{{ $guru->mapel }}</p>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 d-flex justify-content-end mt-4">
                                <a href="{{ route('guru.index') }}" class="btn btn-primary">
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