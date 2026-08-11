@extends('layouts.app')


@section('title', 'Tambah Supplier')


@section('page-title', 'Tambah Supplier')


@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ route('supplier.index') }}">Data Supplier</a>
    </li>

    <li class="breadcrumb-item active">
        Tambah Supplier
    </li>

@endsection



@section('content')


<div class="card">


    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-truck mr-2"></i>
            Tambah Supplier
        </h3>

    </div>



    <div class="card-body">


        <form action="{{ route('supplier.store') }}" method="POST">

            @csrf



            <div class="form-group">

                <label>
                    Nama Supplier
                </label>


                <input type="text"
                       name="nama_supplier"
                       class="form-control @error('nama_supplier') is-invalid @enderror"
                       value="{{ old('nama_supplier') }}"
                       placeholder="Masukkan nama supplier">


                @error('nama_supplier')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>




            <div class="form-group">

                <label>
                    Kode Supplier
                </label>


                <input type="text"
                       name="kode_supplier"
                       class="form-control @error('kode_supplier') is-invalid @enderror"
                       value="{{ old('kode_supplier') }}"
                       placeholder="Contoh: SUP001">


                @error('kode_supplier')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>




            <div class="form-group">

                <label>
                    Alamat
                </label>


                <textarea name="alamat"
                          class="form-control @error('alamat') is-invalid @enderror"
                          rows="3"
                          placeholder="Masukkan alamat supplier">{{ old('alamat') }}</textarea>


                @error('alamat')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>




            <div class="form-group">

                <label>
                    Nomor Telepon
                </label>


                <input type="text"
                       name="telepon"
                       class="form-control @error('telepon') is-invalid @enderror"
                       value="{{ old('telepon') }}"
                       placeholder="Masukkan nomor telepon">


                @error('telepon')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>




            <div class="form-group">

                <label>
                    Email
                </label>


                <input type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="Masukkan email supplier">


                @error('email')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>





            <div class="form-group mt-3">


                <a href="{{ route('supplier.index') }}" 
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left mr-1"></i>
                    Kembali

                </a>



                <button type="submit" class="btn btn-primary">

                    <i class="fas fa-save mr-1"></i>
                    Simpan

                </button>


            </div>




        </form>


    </div>


</div>


@endsection
