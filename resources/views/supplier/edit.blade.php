@extends('layouts.app')


@section('title', 'Edit Supplier')


@section('page-title', 'Edit Supplier')


@section('breadcrumb')

    <li class="breadcrumb-item">
        <a href="{{ route('supplier.index') }}">Data Supplier</a>
    </li>

    <li class="breadcrumb-item active">
        Edit Supplier
    </li>

@endsection



@section('content')


<div class="card">


    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-truck mr-2"></i>
            Edit Supplier
        </h3>

    </div>



    <div class="card-body">


        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">

            @csrf

            @method('PUT')



            <div class="form-group">

                <label>
                    Nama Supplier
                </label>


                <input type="text"
                       name="nama_supplier"
                       class="form-control @error('nama_supplier') is-invalid @enderror"
                       value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
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
                       value="{{ old('kode_supplier', $supplier->kode_supplier) }}"
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
                          placeholder="Masukkan alamat supplier">{{ old('alamat', $supplier->alamat) }}</textarea>


                @error('alamat')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


            </div>




            <div class="form-group">

                <label>
                    Nomor Kontak
                </label>


                <input type="text"
                       name="kontak"
                       class="form-control @error('kontak') is-invalid @enderror"
                       value="{{ old('kontak', $supplier->kontak) }}"
                       placeholder="Masukkan nomor kontak">


                @error('kontak')

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
                       value="{{ old('email', $supplier->email) }}"
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



                <button type="submit" class="btn btn-warning">

                    <i class="fas fa-save mr-1"></i>
                    Update

                </button>


            </div>




        </form>


    </div>


</div>


@endsection