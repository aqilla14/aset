@extends('layouts.app')

@section('title', 'Detail Aset')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2><i class="bi bi-info-circle"></i> Detail Aset</h2>
            <hr>

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="30%">ID</th>
                            <td>{{ $aset->id }}</td>
                        </tr>
                        <tr>
                            <th>Kode Aset</th>
                            <td>{{ $aset->kode_aset }}</td>
                        </tr>
                        <tr>
                            <th>Nama Aset</th>
                            <td>{{ $aset->nama_aset }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $aset->kategori->nama_kategori ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Ruangan</th>
                            <td>{{ $aset->ruangan->nama_ruangan ?? '-' }}</td>
                        </tr>
                        <!-- ===== TAMBAHKAN SUPPLIER ===== -->
                        <tr>
                            <th>Supplier</th>
                            <td>{{ $aset->supplier->nama_supplier ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span
                                    class="badge bg-{{ $aset->status == 'tersedia' ? 'success' : ($aset->status == 'dipinjam' ? 'warning' : ($aset->status == 'pemeliharaan' ? 'info' : 'danger')) }}">
                                    {{ ucfirst($aset->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Perolehan</th>
                            <td>{{ date('d-m-Y', strtotime($aset->tanggal_perolehan)) }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>Rp {{ number_format($aset->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $aset->deskripsi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat</th>
                            <td>{{ $aset->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Diperbarui</th>
                            <td>{{ $aset->updated_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('aset.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('aset.edit', $aset->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
