@extends('template-admin.layout')
@section('title', 'Tambah Data Siswa')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@section('content')
<div class="col-12">
    <div class="card">
    <div class="card-header bg-success text-white">
            <h4 class="card-title"><i class="bi bi-info-circle"></i> Tambah Data Siswa</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ route('siswa.store') }}">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <!-- NISN -->
                            <div class="col-12">
                                <label for="NISN">NISN</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="NISN" class="form-control" name="NISN" placeholder="Masukkan NISN" required>
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
                                        <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-12">
                                <label for="jk">Jenis Kelamin</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select id="jk" class="form-control" name="jk" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-gender-ambiguous"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- No Telepon -->
                            <div class="col-12">
                                <label for="no_telp">No Telepon</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" id="no_telp" class="form-control" name="no_telp" placeholder="Masukkan No Telepon" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-telephone"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Jurusan -->
                            

                            <!-- Kelas -->
                            <div class="col-12">
                                <label for="kelas">Kelas</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select id="lokal_id" class="form-control" name="lokal_id" required>
                                            <option value="">Pilih Kelas</option>
                                            @foreach($kelas as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-building"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email">Email</label>
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Masukkan Email" required>
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
                                        <input type="text" id="username" class="form-control" name="username" placeholder="Masukkan Username" required>
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
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan Password" required>
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