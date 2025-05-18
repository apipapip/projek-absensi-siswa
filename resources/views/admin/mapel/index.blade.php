@extends('template-admin.layout')
@section('title', 'Data mapel')
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
    <a href="{{ route('mapel.create') }}" class="btn btn-success btn-custom-width"><i class="fas fa-plus"></i> Tambah Data mapel</a>
   
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-gray text-primary">
                    Manajemen Data mapel
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                
                                <th>Nama</th>
                                <th>Jadwal Mapel</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($mapel as $dg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ $dg->nama_mapel }}</td>
                                <td>{{ $dg->jadwal_mapel }}</td>

                                <td>
                                    <div class="action-btns">
                                        <!-- <a href="{{ route('mapel.show', $dg->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye" title="Lihat"></i></a> -->
                                        <!-- <a href="{{ route('mapel.edit', $dg->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-pencil-alt" title="Edit"></i></a> -->
                                        <form action="{{ route('mapel.destroy', $dg->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash" title="Hapnbus"></i>
                                            </button>
                                        </form>
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