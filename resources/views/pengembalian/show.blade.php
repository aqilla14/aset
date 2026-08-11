@extends('layouts.app')

@section('title', 'Detail Pengembalian')

@section('content')


<div class="row">

    <div class="col-md-8 offset-md-2">

        <h2>
            <i class="bi bi-info-circle"></i>
            Detail Pengembalian
        </h2>

        <hr>


        <div class="card">

            <div class="card-body">

                <table class="table">

                    {{-- ID --}}
                    <tr>
                        <th width="30%">ID</th>
                        <td>
                            {{ $pengembalian->id }}
                        </td>
                    </tr>


                    {{-- PEMINJAMAN --}}
                    <tr>
                        <th>Peminjaman</th>
                        <td>

                            @if ($pengembalian->peminjaman)

                                <strong>
                                    Peminjaman #{{ $pengembalian->peminjaman->id }}
                                </strong>

                            @else

                                <span class="text-muted">
                                    Data peminjaman tidak ditemukan
                                </span>

                            @endif

                        </td>
                    </tr>


                    {{-- ASET --}}
                    <tr>
                        <th>Aset</th>
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
                    </tr>


                    {{-- TANGGAL KEMBALI --}}
                    <tr>
                        <th>Tanggal Kembali</th>
                        <td>
                            {{ \Carbon\Carbon::parse($pengembalian->tanggal_kembali)->format('d-m-Y') }}
                        </td>
                    </tr>


                    {{-- KONDISI --}}
                    <tr>
                        <th>Kondisi Aset</th>
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
                    </tr>


                    {{-- CATATAN --}}
                    <tr>
                        <th>Catatan</th>
                        <td>
                            {{ $pengembalian->catatan ?? '-' }}
                        </td>
                    </tr>


                    {{-- DIBUAT --}}
                    <tr>
                        <th>Dibuat</th>
                        <td>
                            {{ $pengembalian->created_at->format('d-m-Y H:i') }}
                        </td>
                    </tr>


                    {{-- DIPERBARUI --}}
                    <tr>
                        <th>Diperbarui</th>
                        <td>
                            {{ $pengembalian->updated_at->format('d-m-Y H:i') }}
                        </td>
                    </tr>

                </table>

            </div>


            <div class="card-footer">

                <a href="{{ route('pengembalian.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>


                <a href="{{ route('pengembalian.edit', $pengembalian->id) }}"
                    class="btn btn-warning">

                    <i class="bi bi-pencil"></i>
                    Edit

                </a>

            </div>

        </div>

    </div>

</div>


@endsection
