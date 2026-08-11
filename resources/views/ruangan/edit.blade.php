@extends('layouts.app')

@section('title', 'Edit Ruangan')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2><i class="bi bi-pencil"></i> Edit Ruangan</h2>
            <hr>

            <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_ruangan" class="form-label">Nama Ruangan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" id="nama_ruangan"
                        name="nama_ruangan" value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}" required>
                    @error('nama_ruangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
                    <input type="text" class="form-control @error('kode_ruangan') is-invalid @enderror" id="kode_ruangan"
                        name="kode_ruangan" value="{{ old('kode_ruangan', $ruangan->kode_ruangan) }}">
                    @error('kode_ruangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                        name="lokasi" value="{{ old('lokasi', $ruangan->lokasi) }}">
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('ruangan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection