@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('page-title', 'Edit Peminjaman')

@section('breadcrumb') <li class="breadcrumb-item"> <a href="{{ route('peminjaman.index') }}">Data Peminjaman</a> </li>

    <li class="breadcrumb-item active">
        Edit Peminjaman
    </li>

@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-handshake mr-2"></i>
                Edit Peminjaman
            </h3>
        </div>

        <div class="card-body">

            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Peminjam</label>

                    <input type="text" name="peminjam" class="form-control @error('peminjam') is-invalid @enderror"
                        value="{{ old('peminjam', $peminjaman->peminjam) }}" placeholder="Masukkan nama peminjam">

                    @error('peminjam')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>NIP / NIM</label>

                    <input type="text" name="nip_nim" class="form-control @error('nip_nim') is-invalid @enderror"
                        value="{{ old('nip_nim', $peminjaman->nip_nim) }}" placeholder="Masukkan NIP / NIM">

                    @error('nip_nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Pilih Aset</label>

                    <select name="aset_id" class="form-control @error('aset_id') is-invalid @enderror">

                        <option value="">-- Pilih Aset --</option>

                        @foreach ($asets as $aset)
                            <option value="{{ $aset->id }}"
                                {{ old('aset_id', $peminjaman->aset_id) == $aset->id ? 'selected' : '' }}>

                                {{ $aset->nama_aset }}

                            </option>
                        @endforeach

                    </select>

                    @error('aset_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Pinjam</label>

                    <input type="date" name="tanggal_pinjam"
                        class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                        value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}">

                    @error('tanggal_pinjam')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Kembali Rencana</label>

                    <input type="date" name="tanggal_kembali_rencana"
                        class="form-control @error('tanggal_kembali_rencana') is-invalid @enderror"
                        value="{{ old('tanggal_kembali_rencana', $peminjaman->tanggal_kembali_rencana) }}">

                    @error('tanggal_kembali_rencana')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Kembali Aktual</label>

                    <input type="date" name="tanggal_kembali_aktual"
                        class="form-control @error('tanggal_kembali_aktual') is-invalid @enderror"
                        value="{{ old('tanggal_kembali_aktual', $peminjaman->tanggal_kembali_aktual) }}">

                    @error('tanggal_kembali_aktual')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Status</label>

                    <select name="status" class="form-control @error('status') is-invalid @enderror">

                        <option value="Dipinjam" {{ old('status', $peminjaman->status) == 'Dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>

                        <option value="Selesai" {{ old('status', $peminjaman->status) == 'Selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>

                        <option value="Terlambat"
                            {{ old('status', $peminjaman->status) == 'Terlambat' ? 'selected' : '' }}>
                            Terlambat
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Keterangan</label>

                    <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3"
                        placeholder="Masukkan keterangan">{{ old('keterangan', $peminjaman->keterangan) }}</textarea>

                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-3">

                    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">

                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali

                    </a>

                    <button type="submit" class="btn btn-primary">

                        <i class="fas fa-save mr-1"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div?

    </div>

@endsection
