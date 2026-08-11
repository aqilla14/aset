@extends('layouts.app')

@section('title', 'Data Pemeliharaan')

@section('page-title', 'Data Pemeliharaan')

@section('breadcrumb') <li class="breadcrumb-item active">
Data Pemeliharaan </li>
@endsection

@section('content')

```
<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-tools mr-2"></i>
            Data Pemeliharaan
        </h3>

        <div class="card-tools">
            <a href="{{ route('pemeliharaan.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-1"></i>
                Tambah Pemeliharaan
            </a>
        </div>
    </div>


    <div class="card-body">

        {{-- ALERT SUCCESS --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}

                <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-label="Close">

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
                        <th>Aset</th>
                        <th>Tanggal Pemeliharaan</th>
                        <th>Jenis Pemeliharaan</th>
                        <th>Biaya</th>
                        <th>Keterangan</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>


                <tbody>

                    @forelse ($pemeliharaans as $index => $pemeliharaan)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $index + 1 }}
                            </td>


                            {{-- ASET --}}
                            <td>
                                @if ($pemeliharaan->aset)
                                    <strong>
                                        {{ $pemeliharaan->aset->nama_aset }}
                                    </strong>

                                    @if ($pemeliharaan->aset->kode_aset)
                                        <br>
                                        <small class="text-muted">
                                            Kode:
                                            {{ $pemeliharaan->aset->kode_aset }}
                                        </small>
                                    @endif
                                @else
                                    <span class="text-muted">
                                        Aset tidak ditemukan
                                    </span>
                                @endif
                            </td>


                            {{-- TANGGAL --}}
                            <td>
                                {{ \Carbon\Carbon::parse($pemeliharaan->tanggal_pemeliharaan)->format('d-m-Y') }}
                            </td>


                            {{-- JENIS PEMELIHARAAN --}}
                            <td>
                                <span class="badge badge-info">
                                    {{ $pemeliharaan->jenis_pemeliharaan }}
                                </span>
                            </td>


                            {{-- BIAYA --}}
                            <td>
                                Rp {{ number_format($pemeliharaan->biaya, 0, ',', '.') }}
                            </td>


                            {{-- KETERANGAN --}}
                            <td>
                                {{ $pemeliharaan->keterangan ?? '-' }}
                            </td>


                            {{-- AKSI --}}
                            <td>

                                {{-- DETAIL --}}
                                <a href="{{ route('pemeliharaan.show', $pemeliharaan->id) }}"
                                    class="btn btn-info btn-sm"
                                    title="Detail">

                                    <i class="fas fa-eye"></i>

                                </a>


                                {{-- EDIT --}}
                                <a href="{{ route('pemeliharaan.edit', $pemeliharaan->id) }}"
                                    class="btn btn-warning btn-sm"
                                    title="Edit">

                                    <i class="fas fa-edit"></i>

                                </a>


                                {{-- HAPUS --}}
                                <form action="{{ route('pemeliharaan.destroy', $pemeliharaan->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus data pemeliharaan ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-4">

                                <i class="fas fa-tools fa-2x text-muted mb-2"></i>

                                <p class="mb-0">
                                    Belum ada data pemeliharaan
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
```

@endsection
