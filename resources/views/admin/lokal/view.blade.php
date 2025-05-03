@extends('template-admin.layout')
@section('title', 'Detail Data Lokal')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title"><i class="bi bi-info-circle"></i> Detail Data Lokal</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <!-- Nama Kelas -->
                            <div class="col-12 mb-3">
                                <label for="nama" class="fw-bold"><i class="bi bi-building"></i> Nama Kelas</label>
                                <p class="form-control-static border rounded p-2">{{ $lokal->nama }}</p>
                            </div>

                            <!-- Jurusan -->
                            <div class="col-12 mb-3">
                                <label for="jurusan" class="fw-bold"><i class="bi bi-book"></i> Jurusan</label>
                                <p class="form-control-static border rounded p-2">{{ $lokal->jurusan->kode_jurusan }}</p>
                            </div>

                            <!-- Wali Kelas -->
                            <div class="col-12 mb-3">
                                <label for="wali_kelas" class="fw-bold"><i class="bi bi-person"></i> Wali Kelas</label>
                                <p class="form-control-static border rounded p-2">{{ $lokal->guru->nama }}</p>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('lokal.index') }}" class="btn btn-primary me-1 mb-1">
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
