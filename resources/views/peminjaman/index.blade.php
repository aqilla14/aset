@extends('layouts.app')

@section('title', 'Data Peminjaman')
@section('page-title', 'Data Peminjaman')

@section('breadcrumb') <li class="breadcrumb-item active">Data Peminjaman</li>
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
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}

                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}

                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th width="50" class="text-center">No</th>
                            <th>Peminjam</th>
                            <th>NIP / NIM</th>
                            <th>Aset</th>
                            <th>Tanggal Pinjam</th>
                            <th>Kembali Rencana</th>
                            <th>Status</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($peminjamans as $index => $peminjaman)
                            <tr>

                                <td class="text-center">
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $peminjaman->peminjam }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $peminjaman->nip_nim ?? '-' }}
                                </td>

                                <td>

                                    @if ($peminjaman->aset)
                                        <span>
                                            {{ $peminjaman->aset->nama_aset }}
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            Aset tidak ditemukan
                                        </span>
                                    @endif

                                </td>

                                <td>
                                    @if ($peminjaman->tanggal_pinjam)
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y') }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    @if ($peminjaman->tanggal_kembali_rencana)
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali_rencana)->format('d-m-Y') }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>

                                    @if ($peminjaman->status == 'Dipinjam')
                                        <span class="badge badge-warning">
                                            <i class="fas fa-clock mr-1"></i>
                                            Dipinjam
                                        </span>
                                    @elseif($peminjaman->status == 'Selesai')
                                        <span class="badge badge-success">
                                            <i class="fas fa-check mr-1"></i>
                                            Selesai
                                        </span>
                                    @elseif($peminjaman->status == 'Terlambat')
                                        <span class="badge badge-danger">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            Terlambat
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">
                                            {{ $peminjaman->status ?? '-' }}
                                        </span>
                                    @endif

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('peminjaman.show', $peminjaman->id) }}" class="btn btn-info btn-sm"
                                        title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('peminjaman.edit', $peminjaman->id) }}"
                                        class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus data peminjaman ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center py-5">

                                    <i class="fas fa-handshake fa-3x text-muted mb-3 d-block"></i>

                                    <h5 class="text-muted">
                                        Belum ada data peminjaman
                                    </h5>

                                    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm mt-2">
                                        <i class="fas fa-plus mr-1"></i>
                                        Tambah Peminjaman
                                    </a>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
