@extends('layouts.app')

@section('title', 'Tambah Aset')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2><i class="bi bi-plus-circle"></i> Tambah Aset Baru</h2>
            <hr>

            <form action="{{ route('aset.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="kode_aset" class="form-label">Kode Aset <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('kode_aset') is-invalid @enderror" id="kode_aset"
                        name="kode_aset" value="{{ old('kode_aset') }}" placeholder="Contoh: AST-001" required>
                    @error('kode_aset')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_aset" class="form-label">Nama Aset <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_aset') is-invalid @enderror" id="nama_aset"
                        name="nama_aset" value="{{ old('nama_aset') }}" required>
                    @error('nama_aset')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select class="form-control @error('kategori_id') is-invalid @enderror" id="kategori_id"
                        name="kategori_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ruangan_id" class="form-label">Ruangan <span class="text-danger">*</span></label>
                    <select class="form-control @error('ruangan_id') is-invalid @enderror" id="ruangan_id" name="ruangan_id"
                        required>
                        <option value="">Pilih Ruangan</option>
                        @foreach ($ruangans as $ruangan)
                            <option value="{{ $ruangan->id }}" {{ old('ruangan_id') == $ruangan->id ? 'selected' : '' }}>
                                {{ $ruangan->nama_ruangan }}
                            </option>
                        @endforeach
                    </select>
                    @error('ruangan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- ===== SUPPLIER (OPSIONAL) ===== -->
                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier</label>
                    <select class="form-control @error('supplier_id') is-invalid @enderror" id="supplier_id"
                        name="supplier_id">
                        <option value="">Pilih Supplier (Opsional)</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}"
                                {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->nama_supplier }}
                            </option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status"
                        required>
                        <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="rusak" {{ old('status') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                        <option value="pemeliharaan" {{ old('status') == 'pemeliharaan' ? 'selected' : '' }}>Pemeliharaan
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_perolehan" class="form-label">Tanggal Perolehan <span
                            class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('tanggal_perolehan') is-invalid @enderror"
                        id="tanggal_perolehan" name="tanggal_perolehan" value="{{ old('tanggal_perolehan') }}" required>
                    @error('tanggal_perolehan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        name="harga" value="{{ old('harga') }}" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('aset.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
