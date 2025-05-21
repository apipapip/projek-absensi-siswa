@extends('template-guru.layout')
@section('title', 'Dashboard Guru')
@section('header-content')
    <h1 class="mb-3">Dashboard Guru</h1>
    <p class="text-muted">Selamat datang di dashboard, <strong>{{ Auth::user()->name ?? 'Guru' }}</strong>!</p>
@endsection

@section('content')
<section class="section dashboard">
<div class="row">

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

