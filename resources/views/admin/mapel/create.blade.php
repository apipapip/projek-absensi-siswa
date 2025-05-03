@extends('template-admin.layout')
@section('title', 'Tambah Data mapel')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data mapel</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('mapel.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <!-- nama_mapel -->
                            <div class="col-12">
                                <label for="nama_mapel">Nama Mapel</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="nama_mapel" class="form-control" name="nama_mapel" placeholder="Masukkan nama_mapel" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nama -->
                           

                           





                            <!-- Buttons -->
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('mapel.index') }}" class="btn btn-primary me-1 mb-1">
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