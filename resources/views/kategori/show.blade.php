@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2><i class="bi bi-info-circle"></i> Detail Kategori</h2>
            <hr>

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="30%">ID</th>
                            <td>{{ $kategori->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Kategori</th>
                            <td>{{ $kategori->nama_kategori }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $kategori->deskripsi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Aset</th>
                            <td>
                                <span class="badge badge-info">
                                    {{ $kategori->asets->count() ?? 0 }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Daftar Aset</th>
                            <td>
                                @if($kategori->asets->count() > 0)
                                    <ul>
                                        @foreach($kategori->asets as $aset)
                                            <li>{{ $aset->nama_aset }} ({{ $aset->kode_aset }})</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">Tidak ada aset dalam kategori ini</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat</th>
                            <td>{{ $kategori->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diperbarui</th>
                            <td>{{ $kategori->updated_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection