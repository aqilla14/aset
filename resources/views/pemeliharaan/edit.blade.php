@extends('layouts.app')

@section('title', 'Edit Pemeliharaan')

@section('content')


<div class="row">

    <div class="col-md-8 offset-md-2">

        <h2>
            <i class="bi bi-pencil"></i>
            Edit Pemeliharaan
        </h2>

        <hr>


        <form action="{{ route('pemeliharaan.update', $pemeliharaan->id) }}" method="POST">

            @csrf
            @method('PUT')


            {{-- ASET --}}
            <div class="mb-3">

                <label for="aset_id" class="form-label">
                    Aset <span class="text-danger">*</span>
                </label>

                <select
                    class="form-control @error('aset_id') is-invalid @enderror"
                    id="aset_id"
                    name="aset_id"
                    required>

                    <option value="">-- Pilih Aset --</option>

                    @foreach ($asets as $aset)

                        <option
                            value="{{ $aset->id }}"
                            {{ old('aset_id', $pemeliharaan->aset_id) == $aset->id ? 'selected' : '' }}>

                            {{ $aset->nama_aset }}

                            @if ($aset->kode_aset)
                                - {{ $aset->kode_aset }}
                            @endif

                        </option>

                    @endforeach

                </select>

                @error('aset_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- TANGGAL PEMELIHARAAN --}}
            <div class="mb-3">

                <label for="tanggal_pemeliharaan" class="form-label">
                    Tanggal Pemeliharaan <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    class="form-control @error('tanggal_pemeliharaan') is-invalid @enderror"
                    id="tanggal_pemeliharaan"
                    name="tanggal_pemeliharaan"
                    value="{{ old('tanggal_pemeliharaan', $pemeliharaan->tanggal_pemeliharaan) }}"
                    required>

                @error('tanggal_pemeliharaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- JENIS PEMELIHARAAN --}}
            <div class="mb-3">

                <label for="jenis_pemeliharaan" class="form-label">
                    Jenis Pemeliharaan <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    class="form-control @error('jenis_pemeliharaan') is-invalid @enderror"
                    id="jenis_pemeliharaan"
                    name="jenis_pemeliharaan"
                    value="{{ old('jenis_pemeliharaan', $pemeliharaan->jenis_pemeliharaan) }}"
                    placeholder="Contoh: Perbaikan, Servis, Penggantian Komponen"
                    required>

                @error('jenis_pemeliharaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- BIAYA --}}
            <div class="mb-3">

                <label for="biaya" class="form-label">
                    Biaya <span class="text-danger">*</span>
                </label>

                <input
                    type="number"
                    class="form-control @error('biaya') is-invalid @enderror"
                    id="biaya"
                    name="biaya"
                    value="{{ old('biaya', $pemeliharaan->biaya) }}"
                    min="0"
                    step="0.01"
                    placeholder="Contoh: 150000"
                    required>

                @error('biaya')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- KETERANGAN --}}
            <div class="mb-3">

                <label for="keterangan" class="form-label">
                    Keterangan
                </label>

                <textarea
                    class="form-control @error('keterangan') is-invalid @enderror"
                    id="keterangan"
                    name="keterangan"
                    rows="4"
                    placeholder="Masukkan keterangan pemeliharaan">{{ old('keterangan', $pemeliharaan->keterangan) }}</textarea>

                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- BUTTON --}}
            <button type="submit" class="btn btn-primary">

                <i class="bi bi-save"></i>
                Update

            </button>

            <a href="{{ route('pemeliharaan.index') }}" class="btn btn-secondary">
                Batal
            </a>

        </form>

    </div>

</div>


@endsection
