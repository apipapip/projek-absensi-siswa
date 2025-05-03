@extends('template-admin.layout')
@section('title', 'Edit Data Guru')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data Guru</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('guru.update', $guru->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <!-- NIP -->
                            <div class="col-12">
                                <label for="NIP">NIP</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="NIP" class="form-control" name="NIP" value="{{ $guru->NIP }}" placeholder="Masukkan NIP" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nama -->
                            <div class="col-12">
                                <label for="nama">Nama</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="nama" class="form-control" name="nama" value="{{ $guru->nama }}" placeholder="Masukkan Nama" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-12">
                                <label for="email">Email</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="email" id="email" class="form-control" name="email" value="{{ $guru->user->email }}" placeholder="Masukkan Email" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="col-12">
                                <label for="username">Username</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="username" class="form-control" name="username" value="{{ $guru->username }}" placeholder="Masukkan Username" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-12">
                                <label for="password">Password</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- No Telp -->
                            <div class="col-12">
                                <label for="no_telp">No Telepon</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="number" id="no_telp" class="form-control" name="no_telp" value="{{ $guru->no_telp }}" placeholder="Masukkan No Telepon" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-telephone"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-12">
                                <label for="jk">Jenis Kelamin</label>
                                <div class="form-group">
                                    <select id="jk" class="form-control" name="jk" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="pria" {{ $guru->jk == 'pria' ? 'selected' : '' }}>Pria</option>
                                        <option value="wanita" {{ $guru->jk == 'wanita' ? 'selected' : '' }}>Wanita</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Mapel -->
                            <div class="col-12">
                                <label for="mapel">Mata Pelajaran</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="mapel" class="form-control" name="mapel" value="{{ $guru->mapel }}" placeholder="Masukkan Mata Pelajaran" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('guru.index') }}" class="btn btn-primary me-1 mb-1">
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