@extends('template-admin.layout')
@section('title', 'Dashboard Admin')
@section('header-content')
<h1>Dashboard</h1>
<!--  -->
@endsection

@section('content')
<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Siswa -->
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Siswa <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-start align-self-start" style="font-size: 2rem;">
                                    <i class="bi bi-person-badge"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlahSiswa }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Total siswa yang terdaftar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guru -->
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Guru <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-start align-self-start" style="font-size: 2rem;">
                                    <i class="bi bi-person-lines-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlahGuru }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Total Guru yang terdaftar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kelas -->
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Kelas <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-start align-self-start" style="font-size: 2rem;">
                                    <i class="bi bi-door-open"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlahLokal }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Total Kelas yang tersedia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jurusan -->
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Jurusan <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-start align-self-start" style="font-size: 2rem;">
                                    <i class="bi bi-diagram-3"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlahJurusan }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Total jurusan yang tersedia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guru Yang Mengajar -->
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Guru Mengajar <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-start align-self-start" style="font-size: 2rem;">
                                    <i class="bi bi-briefcase-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlahMengajar }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Total Guru Yang Mengajar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Absen Siswa -->
                <div class="col-lg-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Absen Siswa <span>| Today</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-start align-self-start" style="font-size: 2rem;">
                                    <i class="bi bi-clipboard-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlahAbsen }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Total Absen yang terabsen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>
@endsection