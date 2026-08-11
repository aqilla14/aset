@extends('layouts.app')

@section('title', 'Tambah Ruangan')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2><i class="bi bi-plus-circle"></i> Tambah Ruangan Baru</h2>
            <hr>

            <form action="{{ route('ruangan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_ruangan" class="form-label">Nama Ruangan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" id="nama_ruangan"
                        name="nama_ruangan" value="{{ old('nama_ruangan') }}" placeholder="Contoh: Ruang Rapat, Lab Komputer" required>
                    @error('nama_ruangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
                    <input type="text" class="form-control @error('kode_ruangan') is-invalid @enderror" id="kode_ruangan"
                        name="kode_ruangan" value="{{ old('kode_ruangan') }}" placeholder="Contoh: R-001, LAB-01">
                    @error('kode_ruangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                        name="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Lantai 2, Gedung A">
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection