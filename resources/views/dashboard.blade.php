@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h2><i class="bi bi-speedometer2"></i> Dashboard Inventaris</h2>
            <hr>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Total Aset</h6>
                            <h2 class="mb-0">{{ $totalAset }}</h2>
                        </div>
                        <i class="bi bi-boxes fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Tersedia</h6>
                            <h2 class="mb-0">{{ $tersedia }}</h2>
                        </div>
                        <i class="bi bi-check-circle fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Dipinjam</h6>
                            <h2 class="mb-0">{{ $dipinjam }}</h2>
                        </div>
                        <i class="bi bi-clock fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Rusak</h6>
                            <h2 class="mb-0">{{ $rusak }}</h2>
                        </div>
                        <i class="bi bi-exclamation-triangle fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Baris Kedua: Pemeliharaan + Aset Terbaru -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title">Pemeliharaan</h6>
                            <h2 class="mb-0">{{ $pemeliharaan }}</h2>
                        </div>
                        <i class="bi bi-wrench fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-clock-history"></i> Aset Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Aset</th>
                                    <th>Kategori</th>
                                    <th>Ruangan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($asetTerbaru as $aset)
                                    <tr>
                                        <td>{{ $aset->kode_aset }}</td>
                                        <td>{{ $aset->nama_aset }}</td>
                                        <td>{{ $aset->kategori->nama_kategori ?? '-' }}</td>
                                        <td>{{ $aset->ruangan->nama_ruangan ?? '-' }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $aset->status == 'tersedia' ? 'success' : ($aset->status == 'dipinjam' ? 'warning' : ($aset->status == 'pemeliharaan' ? 'info' : 'danger')) }}">
                                                {{ ucfirst($aset->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada data aset</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Baris Ketiga: Kategori & Ruangan -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-pie-chart"></i> Aset per Kategori</h5>
                </div>
                <div class="card-body">
                    @if ($kategoriCount->count() > 0)
                        <ul class="list-group">
                            @foreach ($kategoriCount as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->kategori->nama_kategori ?? 'Tidak Ada' }}
                                    <span class="badge bg-primary rounded-pill">{{ $item->total }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center text-muted">Belum ada data</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-building"></i> Aset per Ruangan</h5>
                </div>
                <div class="card-body">
                    @if ($ruanganCount->count() > 0)
                        <ul class="list-group">
                            @foreach ($ruanganCount as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->ruangan->nama_ruangan ?? 'Tidak Ada' }}
                                    <span class="badge bg-success rounded-pill">{{ $item->total }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center text-muted">Belum ada data</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Baris Keempat: Peminjaman & Pemeliharaan Terbaru -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-arrow-right"></i> Peminjaman Terbaru</h5>
                </div>
                <div class="card-body">
                    @if ($peminjamanTerbaru->count() > 0)
                        <ul class="list-group">
                            @foreach ($peminjamanTerbaru as $pinjam)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $pinjam->aset->nama_aset ?? 'Tidak diketahui' }}</strong>
                                            <br>
                                            <small class="text-muted">Peminjam: {{ $pinjam->peminjam }}</small>
                                        </div>
                                        <span class="badge bg-{{ $pinjam->status == 'dipinjam' ? 'warning' : 'success' }}">
                                            {{ ucfirst($pinjam->status) }}
                                        </span>
                                    </div>
                                    <small class="text-muted">Pinjam:
                                        {{ date('d-m-Y', strtotime($pinjam->tanggal_pinjam)) }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center text-muted">Belum ada peminjaman</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><i class="bi bi-wrench"></i> Pemeliharaan Terbaru</h5>
                </div>
                <div class="card-body">
                    @if ($pemeliharaanTerbaru->count() > 0)
                        <ul class="list-group">
                            @foreach ($pemeliharaanTerbaru as $pelihara)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $pelihara->aset->nama_aset ?? 'Tidak diketahui' }}</strong>
                                            <br>
                                            <small class="text-muted">Jenis: {{ $pelihara->jenis_pemeliharaan }}</small>
                                        </div>
                                        <span class="badge bg-info">Rp
                                            {{ number_format($pelihara->biaya, 0, ',', '.') }}</span>
                                    </div>
                                    <small class="text-muted">Tanggal:
                                        {{ date('d-m-Y', strtotime($pelihara->tanggal_pemeliharaan)) }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center text-muted">Belum ada pemeliharaan</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
