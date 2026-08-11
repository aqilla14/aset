@extends('layouts.app')

@section('title', 'Data Ruangan')

@section('page-title', 'Data Ruangan')

@section('breadcrumb')
    <li class="breadcrumb-item active">
        Data Ruangan
    </li>
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-building mr-2"></i>
                Data Ruangan
            </h3>

            <div class="card-tools">
                <a href="{{ route('ruangan.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Ruangan
                </a>
            </div>
        </div>

        <div class="card-body">

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                        <span aria-hidden="true">
                            &times;
                        </span>

                    </button>
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Ruangan</th>
                            <th>Kode Ruangan</th>
                            <th>Lokasi</th>
                            <th>Jumlah Aset</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($ruangans as $index => $ruangan)
                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    {{ $ruangan->nama_ruangan }}
                                </td>

                                <td>
                                    {{ $ruangan->kode_ruangan ?? '-' }}
                                </td>

                                <td>
                                    {{ $ruangan->lokasi ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge badge-info">
                                        {{ $ruangan->asets->count() ?? 0 }}
                                    </span>
                                </td>

                                <td>

                                    {{-- DETAIL --}}
                                    <a href="{{ route('ruangan.show', $ruangan->id) }}" class="btn btn-info btn-sm"
                                        title="Detail">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                    {{-- EDIT --}}
                                    <a href="{{ route('ruangan.edit', $ruangan->id) }}" class="btn btn-warning btn-sm"
                                        title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    {{-- HAPUS --}}
                                    <form action="{{ route('ruangan.destroy', $ruangan->id) }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus ruangan ini?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-4">

                                    <i class="fas fa-building fa-2x text-muted mb-2"></i>

                                    <p class="mb-0">
                                        Belum ada data ruangan
                                    </p>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection