@extends('template-guru.layout')
@section('title', 'Dashboard Guru')
@section('header-content')
    <div class="mb-4 p-4 rounded" style="background: linear-gradient(90deg, #1cc88a 60%, #198754 100%); color: #fff;">
        <h2 class="mb-1"><i class="fas fa-chalkboard-teacher me-2"></i>Selamat datang, <span class="fw-bold">{{ $guru->nama }}</span>!</h2>
        <p class="mb-0">Semoga harimu menyenangkan dan penuh semangat dalam membimbing siswa.</p>
    </div>
@endsection



@section('content')
<section class="section dashboard">
    <!-- <div class="alert alert-success mb-4">
        Selamat datang, <strong>{{ $guru->nama ?? 'Guru' }}</strong>! Semoga harimu menyenangkan dan penuh semangat dalam membimbing siswa.
    </div> -->
    <div class="row">
        <!-- Card Jumlah Siswa -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Jumlah Siswa</h5>
                        <h3 class="mb-0">{{ $jumlahSiswa ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Jumlah Mapel -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-book fa-2x text-success"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">guru mengajar</h5>
                        <h3 class="mb-0">{{ $jumlahMengajar ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Kehadiran Hari Ini -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-calendar-check fa-2x text-warning"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Kehadiran Hari Ini</h5>
                        <h3 class="mb-0">{{ $jumlahAbsen ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

