@extends('layouts.app')

@section('title', 'Detail Pemeliharaan')

@section('content')

```
<div class="row">

    <div class="col-md-8 offset-md-2">

        <h2>
            <i class="bi bi-info-circle"></i>
            Detail Pemeliharaan
        </h2>

        <hr>


        <div class="card">

            <div class="card-body">

                <table class="table">

                    {{-- ID --}}
                    <tr>
                        <th width="30%">ID</th>
                        <td>
                            {{ $pemeliharaan->id }}
                        </td>
                    </tr>


                    {{-- ASET --}}
                    <tr>
                        <th>Aset</th>
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
                    </tr>


                    {{-- TANGGAL PEMELIHARAAN --}}
                    <tr>
                        <th>Tanggal Pemeliharaan</th>
                        <td>
                            {{ \Carbon\Carbon::parse($pemeliharaan->tanggal_pemeliharaan)->format('d-m-Y') }}
                        </td>
                    </tr>


                    {{-- JENIS PEMELIHARAAN --}}
                    <tr>
                        <th>Jenis Pemeliharaan</th>
                        <td>

                            <span class="badge badge-info">
                                {{ $pemeliharaan->jenis_pemeliharaan }}
                            </span>

                        </td>
                    </tr>


                    {{-- BIAYA --}}
                    <tr>
                        <th>Biaya</th>
                        <td>
                            <strong>
                                Rp {{ number_format($pemeliharaan->biaya, 0, ',', '.') }}
                            </strong>
                        </td>
                    </tr>


                    {{-- KETERANGAN --}}
                    <tr>
                        <th>Keterangan</th>
                        <td>
                            {{ $pemeliharaan->keterangan ?? '-' }}
                        </td>
                    </tr>


                    {{-- DIBUAT --}}
                    <tr>
                        <th>Dibuat</th>
                        <td>
                            {{ $pemeliharaan->created_at->format('d-m-Y H:i') }}
                        </td>
                    </tr>


                    {{-- DIPERBARUI --}}
                    <tr>
                        <th>Diperbarui</th>
                        <td>
                            {{ $pemeliharaan->updated_at->format('d-m-Y H:i') }}
                        </td>
                    </tr>

                </table>

            </div>


            <div class="card-footer">

                <a href="{{ route('pemeliharaan.index') }}" class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>


                <a href="{{ route('pemeliharaan.edit', $pemeliharaan->id) }}"
                    class="btn btn-warning">

                    <i class="bi bi-pencil"></i>
                    Edit

                </a>

            </div>

        </div>

    </div>

</div>
```

@endsection