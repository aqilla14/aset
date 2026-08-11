@extends('layouts.app')


@section('title', 'Tambah Peminjaman')


@section('page-title', 'Tambah Peminjaman')


@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ route('peminjaman.index') }}">Data Peminjaman</a>
    </li>

    <li class="breadcrumb-item active">
        Tambah Peminjaman
    </li>

@endsection



@section('content')


<div class="card">


    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-handshake mr-2"></i>

            Tambah Peminjaman

        </h3>

    </div>




    <div class="card-body">



        <form action="{{ route('peminjaman.store') }}" method="POST">


            @csrf




            <div class="form-group">

                <label>
                    Nama Peminjam
                </label>


                <input type="text"
                       name="nama_peminjam"
                       class="form-control @error('nama_peminjam') is-invalid @enderror"
                       value="{{ old('nama_peminjam') }}"
                       placeholder="Masukkan nama peminjam">


                @error('nama_peminjam')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>





            <div class="form-group">


                <label>
                    Pilih Aset
                </label>



                <select name="aset_id"
                        class="form-control @error('aset_id') is-invalid @enderror">


                    <option value="">
                        -- Pilih Aset --
                    </option>



                    @foreach($asets as $aset)


                        <option value="{{ $aset->id }}"
                            {{ old('aset_id') == $aset->id ? 'selected' : '' }}>


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


                <label>
                    Tanggal Pinjam
                </label>


                <input type="date"
                       name="tanggal_pinjam"
                       class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                       value="{{ old('tanggal_pinjam') }}">



                @error('tanggal_pinjam')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>







            <div class="form-group">


                <label>
                    Tanggal Kembali
                </label>


                <input type="date"
                       name="tanggal_kembali"
                       class="form-control @error('tanggal_kembali') is-invalid @enderror"
                       value="{{ old('tanggal_kembali') }}">



                @error('tanggal_kembali')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>







            <div class="form-group">


                <label>
                    Jumlah
                </label>


                <input type="number"
                       name="jumlah"
                       class="form-control @error('jumlah') is-invalid @enderror"
                       value="{{ old('jumlah') }}"
                       min="1"
                       placeholder="Jumlah aset yang dipinjam">



                @error('jumlah')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>







            <div class="form-group">


                <label>
                    Status
                </label>


                <select name="status" class="form-control">


                    <option value="Dipinjam">
                        Dipinjam
                    </option>


                    <option value="Selesai">
                        Selesai
                    </option>


                </select>


            </div>








            <div class="form-group">


                <label>
                    Keterangan
                </label>


                <textarea name="keterangan"
                          class="form-control"
                          rows="3"
                          placeholder="Masukkan keterangan">{{ old('keterangan') }}</textarea>


            </div>








            <div class="form-group mt-3">



                <a href="{{ route('peminjaman.index') }}"
                   class="btn btn-secondary">


                    <i class="fas fa-arrow-left mr-1"></i>

                    Kembali


                </a>





                <button type="submit"
                        class="btn btn-primary">


                    <i class="fas fa-save mr-1"></i>

                    Simpan


                </button>



            </div>




        </form>



    </div>


</div>


@endsection