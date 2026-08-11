@extends('layouts.app')

@section('title', 'Data Pengembalian')

@section('page-title', 'Data Pengembalian')

@section('breadcrumb') <li class="breadcrumb-item active">
Data Pengembalian </li>
@endsection

@section('content')

```
<div class="card">

    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-undo mr-2"></i>
            Data Pengembalian
        </h3>


        <div class="card-tools">

            <a href="{{ route('pengembalian.create') }}" class="btn btn-primary btn-sm">

                <i class="fas fa-plus mr-1"></i>
                Tambah Pengembalian

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

                        <th width="50">
                            No
                        </th>

                        <th>
                            Aset
                        </th>

                        <th>
                            Tanggal Kembali
                        </th>

                        <th>
                            Kondisi
                        </th>

                        <th>
                            Catatan
                        </th>

                        <th width="150">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($pengembalians as $index => $pengembalian)

                        <tr>

                            {{-- NO --}}
                            <td>
                                {{ $index + 1 }}
                            </td>


                            {{-- ASET --}}
                            <td>

                                @if ($pengembalian->peminjaman && $pengembalian->peminjaman->aset)

                                    <strong>
                                        {{ $pengembalian->peminjaman->aset->nama_aset }}
                                    </strong>

                                    @if ($pengembalian->peminjaman->aset->kode_aset)

                                        <br>

                                        <small class="text-muted">
                                            Kode:
                                            {{ $pengembalian->peminjaman->aset->kode_aset }}
                                        </small>

                                    @endif

                                @else

                                    <span class="text-muted">
                                        Aset tidak ditemukan
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL KEMBALI --}}
                            <td>

                                {{ \Carbon\Carbon::parse($pengembalian->tanggal_kembali)->format('d-m-Y') }}

                            </td>


                            {{-- KONDISI --}}
                            <td>

                                @if ($pengembalian->kondisi === 'baik')

                                    <span class="badge badge-success">
                                        Baik
                                    </span>

                                @elseif ($pengembalian->kondisi === 'rusak_ringan')

                                    <span class="badge badge-warning">
                                        Rusak Ringan
                                    </span>

                                @elseif ($pengembalian->kondisi === 'rusak_berat')

                                    <span class="badge badge-danger">
                                        Rusak Berat
                                    </span>

                                @else

                                    <span class="badge badge-secondary">
                                        {{ $pengembalian->kondisi }}
                                    </span>

                                @endif

                            </td>


                            {{-- CATATAN --}}
                            <td>

                                {{ $pengembalian->catatan ?? '-' }}

                            </td>


                            {{-- AKSI --}}
                            <td>

                                {{-- DETAIL --}}
                                <a href="{{ route('pengembalian.show', $pengembalian->id) }}"
                                    class="btn btn-info btn-sm"
                                    title="Detail">

                                    <i class="fas fa-eye"></i>

                                </a>


                                {{-- EDIT --}}
                                <a href="{{ route('pengembalian.edit', $pengembalian->id) }}"
                                    class="btn btn-warning btn-sm"
                                    title="Edit">

                                    <i class="fas fa-edit"></i>

                                </a>


                                {{-- HAPUS --}}
                                <form action="{{ route('pengembalian.destroy', $pengembalian->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus data pengembalian ini?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-4">

                                <i class="fas fa-undo fa-2x text-muted mb-2"></i>

                                <p class="mb-0">
                                    Belum ada data pengembalian
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
