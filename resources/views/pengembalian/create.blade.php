@extends('layouts.app')

@section('title', 'Tambah Pengembalian')

@section('content')


<div class="row">

    <div class="col-md-8 offset-md-2">

        <h2>
            <i class="bi bi-arrow-return-left"></i>
            Tambah Pengembalian
        </h2>

        <hr>


        <form action="{{ route('pengembalian.store') }}" method="POST">

            @csrf


            {{-- PEMINJAMAN --}}
            <div class="mb-3">

                <label for="peminjaman_id" class="form-label">
                    Peminjaman <span class="text-danger">*</span>
                </label>

                <select
                    class="form-control @error('peminjaman_id') is-invalid @enderror"
                    id="peminjaman_id"
                    name="peminjaman_id"
                    required>

                    <option value="">
                        -- Pilih Peminjaman --
                    </option>

                    @foreach ($peminjamans as $peminjaman)

                        <option
                            value="{{ $peminjaman->id }}"
                            {{ old('peminjaman_id') == $peminjaman->id ? 'selected' : '' }}>

                            @if ($peminjaman->aset)

                                {{ $peminjaman->aset->nama_aset }}

                                @if ($peminjaman->aset->kode_aset)
                                    - {{ $peminjaman->aset->kode_aset }}
                                @endif

                            @else

                                Peminjaman #{{ $peminjaman->id }}

                            @endif

                        </option>

                    @endforeach

                </select>

                @error('peminjaman_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- TANGGAL KEMBALI --}}
            <div class="mb-3">

                <label for="tanggal_kembali" class="form-label">
                    Tanggal Kembali <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    class="form-control @error('tanggal_kembali') is-invalid @enderror"
                    id="tanggal_kembali"
                    name="tanggal_kembali"
                    value="{{ old('tanggal_kembali', date('Y-m-d')) }}"
                    required>

                @error('tanggal_kembali')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- KONDISI --}}
            <div class="mb-3">

                <label for="kondisi" class="form-label">
                    Kondisi Aset <span class="text-danger">*</span>
                </label>

                <select
                    class="form-control @error('kondisi') is-invalid @enderror"
                    id="kondisi"
                    name="kondisi"
                    required>

                    <option value="">
                        -- Pilih Kondisi --
                    </option>

                    <option value="baik"
                        {{ old('kondisi', 'baik') == 'baik' ? 'selected' : '' }}>
                        Baik
                    </option>

                    <option value="rusak_ringan"
                        {{ old('kondisi') == 'rusak_ringan' ? 'selected' : '' }}>
                        Rusak Ringan
                    </option>

                    <option value="rusak_berat"
                        {{ old('kondisi') == 'rusak_berat' ? 'selected' : '' }}>
                        Rusak Berat
                    </option>

                </select>

                @error('kondisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- CATATAN --}}
            <div class="mb-3">

                <label for="catatan" class="form-label">
                    Catatan
                </label>

                <textarea
                    class="form-control @error('catatan') is-invalid @enderror"
                    id="catatan"
                    name="catatan"
                    rows="4"
                    placeholder="Masukkan catatan kondisi atau informasi pengembalian">{{ old('catatan') }}</textarea>

                @error('catatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- BUTTON --}}
            <button type="submit" class="btn btn-primary">

                <i class="bi bi-save"></i>
                Simpan

            </button>

            <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>


@endsection
