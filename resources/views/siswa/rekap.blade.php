@extends('template-siswa.layout')
@section('title', 'Rekap Absensi')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
    .stat-card {
        border-radius: 1rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        background: #f8f9fa;
        margin-bottom: 1.5rem;
    }
    .stat-icon {
        font-size: 2.5rem;
        padding: 1rem;
        border-radius: 50%;
        color: #fff;
        margin-right: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .stat-title {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 0.25rem;
    }
    .stat-value {
        font-size: 1.5rem;
        font-weight: bold;
        color: #343a40;
    }
    .badge-status {
        font-size: 1rem;
        padding: 0.4em 1em;
        border-radius: 1rem;
    }
</style>
@endsection

@section('header-content')
    <h2 class="mb-2">Selamat datang, <span class="text-primary">{{ $siswa->nama }}</span>!</h2>
    <p class="text-muted">Berikut adalah rekap absensi Anda.</p>
@endsection

@section('content')
<div class="row mb-4">
    <div class="col-md-4">
        <div class="d-flex align-items-center stat-card">
            <div class="stat-icon bg-success">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div>
                <div class="stat-title">Total Hadir</div>
                <div class="stat-value">
                    {{ $jumlahHadir ?? 0}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex align-items-center stat-card">
            <div class="stat-icon bg-warning">
                <i class="fas fa-user-clock"></i>
            </div>
            <div>
                <div class="stat-title">Izin</div>
                <div class="stat-value">
                    {{ $jumlahSakit ?? 0}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="d-flex align-items-center stat-card">
            <div class="stat-icon bg-danger">
                <i class="fas fa-user-times"></i>
            </div>
            <div>
                <div class="stat-title">Alpa</div>
                <div class="stat-value">
                    {{ $jumlahAlfa ?? 0}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h5 class="m-0"><i class="fas fa-list-alt me-2"></i>Rekap Absensi {{ $siswa->nama }}</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle" id="dataTable" width="90%" cellspacing="0">
                <thead class="text-center table-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Status</th>
                        <th>Guru yang Mengabsen</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($rekapAbsensi->sortByDesc('tanggal_absen') as $rekap)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($rekap->tanggal)->format('d M Y') }}</td>
                        <td>{{ $rekap->jam }}</td>
                        <td>
                            @if($rekap->status == 'Hadir')
                                <span class="badge badge-status bg-success">Hadir</span>
                            @elseif($rekap->status == 'Izin')
                                <span class="badge badge-status bg-warning text-dark">Izin</span>
                            @elseif($rekap->status == 'Alpa')
                                <span class="badge badge-status bg-danger">Alpa</span>
                            @else
                                <span class="badge badge-status bg-secondary">{{ $rekap->status }}</span>
                            @endif
                        </td>
                        <td>{{ $rekap->guru->nama }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-muted">Belum ada data absensi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection