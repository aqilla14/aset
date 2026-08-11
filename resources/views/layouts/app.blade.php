<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Inventaris Aset')</title>

    {{-- Google Font --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- AdminLTE --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        {{-- Sidebar Toggle --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        {{-- Right Navbar --}}
        <ul class="navbar-nav ml-auto">

            {{-- Fullscreen --}}
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

            {{-- User --}}
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-circle"></i>
                    <span class="ml-1">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">

                    <a href="#" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i>
                        Profile
                    </a>

                    <div class="dropdown-divider"></div>

                    <form action="#" method="POST">
                        @csrf

                        <button type="submit"
                            class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </button>
                    </form>

                </div>
            </li>

        </ul>

    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        {{-- Brand --}}
        <a href="{{ route('dashboard') }}" class="brand-link">

            <i class="fas fa-boxes ml-3 mr-2"></i>

            <span class="brand-text font-weight-light">
                Inventaris Aset
            </span>

        </a>


        {{-- Sidebar --}}
        <div class="sidebar">

            {{-- User Panel --}}
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="image">
                    <i class="fas fa-user-circle fa-2x text-white"></i>
                </div>

                <div class="info">
                    <a href="#" class="d-block">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </a>
                </div>

            </div>


            {{-- Search --}}
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">

                    <input class="form-control form-control-sidebar"
                        type="search"
                        placeholder="Search"
                        aria-label="Search">

                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>

                </div>
            </div>


            {{-- MENU --}}
            <nav class="mt-2">

                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false">

                    <li class="nav-item">

                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>

                        </a>

                    </li>

                    <li class="nav-header">
                        MASTER DATA
                    </li>


                    {{-- ASET --}}
                    <li class="nav-item">

                        <a href="{{ route('aset.index') }}"
                           class="nav-link {{ request()->routeIs('aset.*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-box"></i>

                            <p>
                                Data Aset
                            </p>

                        </a>

                    </li>


                    {{-- KATEGORI --}}
                    <li class="nav-item">

                        <a href="{{ route('kategori.index') }}"
                           class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-tags"></i>

                            <p>
                                Kategori
                            </p>

                        </a>

                    </li>


                    {{-- RUANGAN --}}
                    <li class="nav-item">

                        <a href="{{ route('ruangan.index') }}"
                           class="nav-link {{ request()->routeIs('ruangan.*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-building"></i>

                            <p>
                                Ruangan
                            </p>

                        </a>

                    </li>


                    {{-- SUPPLIER --}}
                    <li class="nav-item">

                        <a href="{{ route('supplier.index') }}"
                           class="nav-link {{ request()->routeIs('supplier.*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-truck"></i>

                            <p>
                                Supplier
                            </p>

                        </a>

                    </li>

                    <li class="nav-header">
                        TRANSAKSI
                    </li>


                    {{-- PEMINJAMAN --}}
                    <li class="nav-item">

                        <a href="{{ route('peminjaman.index') }}"
                           class="nav-link {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-arrow-right"></i>

                            <p>
                                Peminjaman
                            </p>

                        </a>

                    </li>


                    {{-- PENGEMBALIAN --}}
                    <li class="nav-item">

                        <a href="{{ route('pengembalian.index') }}"
                           class="nav-link {{ request()->routeIs('pengembalian.*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-arrow-left"></i>

                            <p>
                                Pengembalian
                            </p>

                        </a>

                    </li>


                    {{-- PEMELIHARAAN --}}
                    <li class="nav-item">

                        <a href="{{ route('pemeliharaan.index') }}"
                           class="nav-link {{ request()->routeIs('pemeliharaan.*') ? 'active' : '' }}">

                            <i class="nav-icon fas fa-tools"></i>

                            <p>
                                Pemeliharaan
                            </p>

                        </a>

                    </li>

                </ul>

            </nav>

        </div>

    </aside>

    <div class="content-wrapper">

        {{-- Page Header --}}
        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1 class="m-0">
                            @yield('page-title', 'Dashboard')
                        </h1>

                    </div>

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">
                                    Home
                                </a>
                            </li>

                            @yield('breadcrumb')

                        </ol>

                    </div>

                </div>

            </div>

        </div>


        {{-- Main Content --}}
        <section class="content">

            <div class="container-fluid">

                {{-- SUCCESS ALERT --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        <button type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-label="Close">

                            <span aria-hidden="true">
                                &times;
                            </span>

                        </button>

                        <i class="fas fa-check-circle mr-2"></i>

                        {{ session('success') }}

                    </div>

                @endif


                {{-- ERROR ALERT --}}
                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show">

                        <button type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-label="Close">

                            <span aria-hidden="true">
                                &times;
                            </span>

                        </button>

                        <i class="fas fa-exclamation-circle mr-2"></i>

                        {{ session('error') }}

                    </div>

                @endif


                {{-- VALIDATION ERROR --}}
                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>
                            Terjadi kesalahan:
                        </strong>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- CONTENT DARI VIEW --}}
                @yield('content')

            </div>

        </section>

    </div>

    <footer class="main-footer">

        <strong>
            Inventaris Aset
        </strong>

        &copy; {{ date('Y') }}

        <div class="float-right d-none d-sm-inline">
            Sistem Informasi Inventaris Aset
        </div>

    </footer>


    {{-- Control Sidebar --}}
    <aside class="control-sidebar control-sidebar-dark">
    </aside>

</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('scripts')

</body>
</html>