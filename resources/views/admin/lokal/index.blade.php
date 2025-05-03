@extends('template-admin.layout')
@section('title', 'Data lokal')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
    .action-btns {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .action-btns .btn {
        margin: 0;
    }

    .btn-custom-width {
        width: auto;
    }
</style>
@endsection
@section('content')
<div class="d-flex mb-2">
    <a href="{{ route('lokal.create') }}" class="btn btn-success btn-custom-width"><i class="fas fa-plus"></i> Tambah Data lokal</a>
   
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-gray text-primary">
                    Manajemen Data lokal
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama lokal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($lokal as $dg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dg->nama }}</td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('lokal.show', $dg->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye" title="Lihat"></i></a>
                                        <a href="{{ route('lokal.edit', $dg->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-pencil-alt" title="Edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection