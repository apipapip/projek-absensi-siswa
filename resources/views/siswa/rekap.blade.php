@extends('template-siswa.layout')
@section('title', 'Rekap Absensi')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
    body {
        background: #f4f6fb;
    }
    .stat-card {
        border-radius: 1rem;
        box-shadow: 0 4px 16px rgba(0,0,0,0.09);
        background: #fff;
        margin-bottom: 1.5rem;
        padding: 1.2rem 1.5rem;
        transition: box-shadow 0.2s;
    }
    .stat-card:hover {
        box-shadow: 0 8px 24px rgba(0,0,0,0.13);
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
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .stat-title {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 0.25rem;
        letter-spacing: 0.5px;
    }
    .stat-value {
        font-size: 2rem;
        font-weight: bold;
        color: #343a40;
    }
    .badge-status {
        font-size: 1rem;
        padding: 0.4em 1.2em;
        border-radius: 1rem;
        font-weight: 500;
        letter-spacing: 0.5px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.07);
    }
    .bg-hadir { background: #28a745 !important; color: #fff !important; }
    .bg-izin { background: #ffc107 !important; color: #212529 !important; }
    .bg-alpa { background: #dc3545 !important; color: #fff !important; }
    .bg-unknown { background: #6c757d !important; color: #fff !important; }
    .card.shadow {
        border-radius: 1rem;
        box-shadow: 0 4px 16px rgba(0,0,0,0.09);
        background: #fff;
    }
    .card-header.bg-primary {
        border-radius: 1rem 1rem 0 0;
        background: linear-gradient(90deg, #4e73df 60%, #224abe 100%);
        box-shadow: 0 2px 8px rgba(78,115,223,0.13);
    }
    .table thead th {
        background: #f8f9fc;
        color: #4e73df;
        font-weight: 600;
        border-bottom: 2px solid #e3e6f0;
    }
    .table-hover tbody tr:hover {
        background: #f1f3fa;
        transition: background 0.2s;
    }
    .form-label {
        font-weight: 500;
        color: #4e73df;
    }
    .filter-icon {
        margin-right: 0.5rem;
        color: #4e73df;
    }
</style>
@endsection

@section('header-content')
    <div class="mb-4 p-4 rounded" style="background: linear-gradient(90deg, #4e73df 60%, #224abe 100%); color: #fff;">
        <h2 class="mb-1"><i class="fas fa-user-graduate me-2"></i>Selamat datang, <span class="fw-bold">{{ $siswa->nama }}</span>!</h2>
        <p class="mb-0">Berikut adalah rekap absensi Anda.</p>
    </div>
@endsection

@section('content')
<form method="GET" class="mb-4">
    <div class="row g-2 align-items-end">
        <div class="col-md-3">
            <label class="form-label"><i class="fas fa-calendar-alt filter-icon"></i>Bulan</label>
            <select name="bulan" class="form-control">
                @for($i=1; $i<=12; $i++)
                    <option value="{{ sprintf('%02d', $i) }}" {{ $bulan == sprintf('%02d', $i) ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label"><i class="fas fa-calendar filter-icon"></i>Tahun</label>
            <select name="tahun" class="form-control">
                @for($y = date('Y')-2; $y <= date('Y'); $y++)
                    <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search me-1"></i>Tampilkan</button>
        </div>
    </div>
</form>

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
                            @if(strtolower($rekap->status) == 'hadir')
                                <span class="badge badge-status bg-hadir">Hadir</span>
                            @elseif(strtolower($rekap->status) == 'izin' || strtolower($rekap->status) == 'sakit')
                                <span class="badge badge-status bg-izin">Izin</span>
                            @elseif(strtolower($rekap->status) == 'alpa')
                                <span class="badge badge-status bg-alpa">Alpa</span>
                            @else
                                <span class="badge badge-status bg-unknown">{{ $rekap->status }}</span>
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