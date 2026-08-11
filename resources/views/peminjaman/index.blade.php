@extends('layouts.app')

@section('title', 'Data Peminjaman')
@section('page-title', 'Data Peminjaman')

@section('breadcrumb')
    <li class="breadcrumb-item active">Data Peminjaman</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-handshake mr-2"></i>
                Data Peminjaman
            </h3>
            <div class="card-tools">
                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Peminjaman
                </a>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Peminjam</th>
                            <th>Aset</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjamans as $index => $peminjaman)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $peminjaman->peminjam }}</td>
                                <td>
                                    @if ($peminjaman->aset)
                                        {{ $peminjaman->aset->nama_aset }}
                                    @else
                                        <span class="text-danger">Aset tidak ditemukan</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y') }}</td>
                                <td>
                                    @if ($peminjaman->tanggal_kembali_rencana)
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali_rencana)->format('d-m-Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($peminjaman->status == 'Dipinjam')
                                        <span class="badge badge-warning">Dipinjam</span>
                                    @elseif($peminjaman->status == 'Selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif($peminjaman->status == 'Terlambat')
                                        <span class="badge badge-danger">Terlambat</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $peminjaman->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('peminjaman.show', $peminjaman->id) }}" class="btn btn-info btn-sm"
                                        title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-warning btn-sm"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data peminjaman ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="fas fa-handshake fa-2x text-muted mb-2 d-block"></i>
                                    <p class="mb-0">Belum ada data peminjaman</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
