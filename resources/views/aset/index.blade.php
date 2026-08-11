@extends('layouts.app')

@section('title', 'Data Aset')

@section('page-title', 'Data Aset')

@section('breadcrumb')
    <li class="breadcrumb-item active">
        Data Aset
    </li>
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-box mr-2"></i>
                Data Aset
            </h3>

            <div class="card-tools">
                <a href="{{ route('aset.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Aset
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
                            <th>Kode Aset</th>
                            <th>Nama Aset</th>
                            <th>Kategori</th>
                            <th>Ruangan</th>
                            <th>Supplier</th>
                            <th>Status</th>
                            <th>Harga</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($asets as $index => $aset)
                            <tr>

                                <td>
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    {{ $aset->kode_aset }}
                                </td>

                                <td>
                                    {{ $aset->nama_aset }}
                                </td>

                                <td>
                                    {{ $aset->kategori->nama_kategori ?? '-' }}
                                </td>

                                <td>
                                    {{ $aset->ruangan->nama_ruangan ?? '-' }}
                                </td>

                                <td>
                                    {{ $aset->supplier->nama_supplier ?? '-' }}
                                </td>

                                <td>

                                    @if ($aset->status == 'tersedia')
                                        <span class="badge badge-success">
                                            Tersedia
                                        </span>
                                    @elseif ($aset->status == 'dipinjam')
                                        <span class="badge badge-warning">
                                            Dipinjam
                                        </span>
                                    @elseif ($aset->status == 'pemeliharaan')
                                        <span class="badge badge-info">
                                            Pemeliharaan
                                        </span>
                                    @else
                                        <span class="badge badge-danger">
                                            {{ ucfirst($aset->status) }}
                                        </span>
                                    @endif

                                </td>

                                <td>
                                    Rp {{ number_format($aset->harga, 0, ',', '.') }}
                                </td>

                                <td>

                                    {{-- DETAIL --}}
                                    <a href="{{ route('aset.show', $aset->id) }}" class="btn btn-info btn-sm"
                                        title="Detail">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                    {{-- EDIT --}}
                                    <a href="{{ route('aset.edit', $aset->id) }}" class="btn btn-warning btn-sm"
                                        title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    {{-- HAPUS --}}
                                    <form action="{{ route('aset.destroy', $aset->id) }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus aset ini?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9" class="text-center py-4">

                                    <i class="fas fa-box-open fa-2x text-muted mb-2"></i>

                                    <p class="mb-0">
                                        Belum ada data aset
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