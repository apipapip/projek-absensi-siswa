@extends('template-admin.layout')
@section('title', 'Edit Data Siswa')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h4 class="card-title"><i class="bi bi-info-circle"></i> Edit Data Siswa</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('siswa.update', $siswa->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <!-- NISN -->
                            <div class="col-12">
                                <label for="NISN">NISN</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="NISN" class="form-control" name="NISN" value="{{ $siswa->NISN }}" required>
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
                                        <input type="text" id="nama" class="form-control" name="nama" value="{{ $siswa->nama }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-12">
                                <label for="jk">Jenis Kelamin</label>
                                <div class="form-group">
                                    <select id="jk" class="form-control" name="jk" required>
                                        <option value="laki-laki" {{ $siswa->jk == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="perempuan" {{ $siswa->jk == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <!-- No Telepon -->
                            <div class="col-12">
                                <label for="no_telp">No Telepon</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="no_telp" class="form-control" name="no_telp" value="{{ $siswa->no_telp }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-telephone"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Jurusan -->
                            <div class="col-12">
                                <label for="jurusan">Jurusan</label>
                                <div class="form-group">
                                    <select id="jurusan" class="form-control" name="jurusan" required>
                                        @foreach($jurusan as $j)
                                            <option value="{{ $j->nama_jurusan }}" {{ $siswa->jurusan == $j->nama_jurusan ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-12">
                                <label for="email">Email</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="email" id="email" class="form-control" name="email" value="{{ $siswa->user->email }}" required>
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
                                        <input type="text" id="username" class="form-control" name="username" value="{{ $siswa->user->username }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-12">
                                <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan Password Baru">
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('siswa.index') }}" class="btn btn-primary me-1 mb-1">
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