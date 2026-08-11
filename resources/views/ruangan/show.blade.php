@extends('layouts.app')

@section('title', 'Detail Ruangan')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2><i class="bi bi-info-circle"></i> Detail Ruangan</h2>
            <hr>

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="30%">ID</th>
                            <td>{{ $ruangan->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ruangan</th>
                            <td>{{ $ruangan->nama_ruangan }}</td>
                        </tr>
                        <tr>
                            <th>Kode Ruangan</th>
                            <td>{{ $ruangan->kode_ruangan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $ruangan->lokasi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Aset</th>
                            <td>
                                <span class="badge badge-info">
                                    {{ $ruangan->asets->count() ?? 0 }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Daftar Aset</th>
                            <td>
                                @if($ruangan->asets->count() > 0)
                                    <ul>
                                        @foreach($ruangan->asets as $aset)
                                            <li>{{ $aset->nama_aset }} ({{ $aset->kode_aset }})</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">Tidak ada aset di ruangan ini</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat</th>
                            <td>{{ $ruangan->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diperbarui</th>
                            <td>{{ $ruangan->updated_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('ruangan.edit', $ruangan->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection