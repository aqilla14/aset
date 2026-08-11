@extends('layouts.app')

@section('title', 'Data Kategori')

@section('page-title', 'Data Kategori')

@section('breadcrumb')
    <li class="breadcrumb-item active">
        Data Kategori
    </li>
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tags mr-2"></i>
                Data Kategori
            </h3>

            <div class="card-tools">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Kategori
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
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Aset</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($kategoris as $index => $kategori)
                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    {{ $kategori->nama_kategori }}
                                </td>

                                <td>
                                    {{ $kategori->deskripsi ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge badge-info">
                                        {{ $kategori->asets->count() ?? 0 }}
                                    </span>
                                </td>

                                <td>

                                    {{-- DETAIL --}}
                                    <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-info btn-sm"
                                        title="Detail">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                    {{-- EDIT --}}
                                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm"
                                        title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    {{-- HAPUS --}}
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center py-4">

                                    <i class="fas fa-tags fa-2x text-muted mb-2"></i>

                                    <p class="mb-0">
                                        Belum ada data kategori
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