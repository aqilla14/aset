@extends('layouts.app')


@section('title', 'Data Supplier')


@section('page-title', 'Data Supplier')


@section('breadcrumb')
    <li class="breadcrumb-item active">
        Data Supplier
    </li>
@endsection


@section('content')


<div class="card">


    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-truck mr-2"></i>
            Data Supplier
        </h3>


        <div class="card-tools">

            <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">

                <i class="fas fa-plus mr-1"></i>
                Tambah Supplier

            </a>

        </div>

    </div>


    <div class="card-body">


        {{-- ALERT SUCCESS --}}
        @if (session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="fas fa-check-circle mr-2"></i>

                {{ session('success') }}


                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                    <span aria-hidden="true">
                        &times;
                    </span>

                </button>

            </div>

        @endif



        <div class="table-responsive">


            <table class="table table-bordered table-hover">


                <thead>

                    <tr>

                        <th width="50">No</th>

                        <th>Nama Supplier</th>

                        <th>Kode Supplier</th>

                        <th>Alamat</th>

                        <th>No Kontak</th>

                        <th>Email</th>

                        <th width="150">Aksi</th>

                    </tr>

                </thead>



                <tbody>


                @forelse ($suppliers as $index => $supplier)

                    <tr>


                        <td>
                            {{ $index + 1 }}
                        </td>



                        <td>
                            {{ $supplier->nama_supplier }}
                        </td>



                        <td>
                            {{ $supplier->kode_supplier ?? '-' }}
                        </td>



                        <td>
                            {{ $supplier->alamat ?? '-' }}
                        </td>



                        <td>
                            {{ $supplier->kontak ?? '-' }}
                        </td>



                        <td>
                            {{ $supplier->email ?? '-' }}
                        </td>



                        <td>


                            {{-- DETAIL --}}

                            <a href="{{ route('supplier.show', $supplier->id) }}" 
                               class="btn btn-info btn-sm"
                               title="Detail">

                                <i class="fas fa-eye"></i>

                            </a>



                            {{-- EDIT --}}

                            <a href="{{ route('supplier.edit', $supplier->id) }}" 
                               class="btn btn-warning btn-sm"
                               title="Edit">

                                <i class="fas fa-edit"></i>

                            </a>



                            {{-- HAPUS --}}

                            <form action="{{ route('supplier.destroy', $supplier->id) }}" 
                                  method="POST" 
                                  class="d-inline">


                                @csrf

                                @method('DELETE')


                                <button type="submit" 
                                        class="btn btn-danger btn-sm" 
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus supplier ini?')">


                                    <i class="fas fa-trash"></i>


                                </button>


                            </form>


                        </td>


                    </tr>


                @empty


                    <tr>


                        <td colspan="7" class="text-center py-4">


                            <i class="fas fa-truck fa-2x text-muted mb-2"></i>


                            <p class="mb-0">
                                Belum ada data supplier
                            </p>


                        </td>


                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


@endsection