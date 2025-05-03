@extends('template-admin.layout')
@section('title', 'Detail Data User')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title"><i class="bi bi-info-circle"></i> Detail Data User</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <!-- Email -->
                            <div class="col-12 mb-3">
                                <label for="email" class="fw-bold"><i class="bi bi-envelope"></i> Email</label>
                                <p class="form-control-static border rounded p-2">{{ $user->email }}</p>
                            </div>

                            <!-- Username -->
                            <div class="col-12 mb-3">
                                <label for="username" class="fw-bold"><i class="bi bi-person"></i> Username</label>
                                <p class="form-control-static border rounded p-2">{{ $user->username }}</p>
                            </div>

                            <!-- Level -->
                            <div class="col-12 mb-3">
                                <label for="level" class="fw-bold"><i class="bi bi-person-badge"></i> Level</label>
                                <p class="form-control-static border rounded p-2">{{ $user->level }}</p>
                            </div>

                            <!-- Buttons -->
                            <div class="col-12 d-flex justify-content-end">
                                <a href="{{ route('user.index') }}" class="btn btn-primary me-1 mb-1">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
