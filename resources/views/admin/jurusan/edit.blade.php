@extends('template-admin.layout')
@section('title', 'Edit Data Jurusan')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data Jurusan</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('jurusan.update', $jurusan->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="nama_jurusan">Nama Jurusan</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="nama_jurusan" class="form-control" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}" placeholder="masukkan nama jurusan" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="kode_jurusan">Kode Jurusan</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="kode_jurusan" class="form-control" name="kode_jurusan" value="{{ $jurusan->kode_jurusan }}" placeholder="masukkan kode jurusan" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-code-slash"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{route('jurusan.index')}}" class="btn btn-primary me-1 mb-1">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                    <i class="bi bi-arrow-clockwise"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-success me-1 mb-1">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
