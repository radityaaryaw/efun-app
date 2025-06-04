@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show  bg-gray-200">
        <!-- Navbar -->
        <aside
            class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
            id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="">
                    <img src="{{ asset('img/logo.png') }}"class="navbar-brand-img h-100" alt="main_logo">
                </a>
            </div>
            <hr class="horizontal light mt-4 mb-2">
            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <!-- DASHBOARD -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.dash') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.dash') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.dash') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>

                    <!-- PENGGUNA -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.user.*') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.user.*') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.user.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user-group" style="color: #ffffff;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengguna</span>
                        </a>
                    </li>

                    <!-- KATEGORI EVENT -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.category.*') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.category.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bookmark" style="color: #ffffff;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Kategori Event</span>
                        </a>
                    </li>

                    <!-- DATA EVENT -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.event.*') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.event.*') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.event.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-calendar-days" style="color: #ffffff;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Data Event</span>
                        </a>
                    </li>

                    <!-- LAPORAN EVENT (TIKET) -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.tiket.*') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.tiket.*') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.tiket.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-file-lines" style="color: #ffffff;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan Event</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidenav-footer position-absolute w-100 bottom-0 ">
                <div class="mx-3">
                    <a class="btn bg-white w-100" href="{{ route('logout') }}" type="button"><i
                            class="fa-solid fa-arrow-right-from-bracket" style="color: #515151;"></i>
                        <span class="nav-link-text ms-1"
                            style="color: #515151; font-family: 'Poppins', sans-serif; font-weight: 800; font-size: 14px;">Logout</span></a>
                    <div class="caption" style="padding-bottom: 10px; padding-top: 20px;">
                    </div>
                </div>
            </div>
        </aside>
        <!-- End Navbar -->

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Side Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
                data-scroll="true">
                <div class="container-fluid py-3 px-3">
                    <nav aria-label="breadcrumb">
                        <h5 class="font-weight-bolder mb-0"
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Laporan Data Event
                        </h5>
                        <p id="tanggal" class="mb-0"
                            style="color: #868686; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500;">
                        </p>
                    </nav>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link text-body px-0">
                                <span
                                    style="display: none; font-family: 'Poppins', sans-serif; color: #515151; font-weight: 600;"
                                    class="d-sm-inline d-none">Hai, {{ Auth::user()->name }}&ensp;</span>
                                <i class="fa fa-user me-sm-1" style="color: #515151;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <table class="table">
                    <form action="#" method="GET">
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" value="{{ request('search') }}"
                                    style="font-size: 14px; width: 400px;" name="search" id="search"
                                    class="form-control" placeholder="Cari data event disini .." />
                            </div>
                            <button type="button" class="btn"
                                style="background-color:#acacac; color: #fff; font-size: 15px;" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">#</th>
                            <th scope="col">Penyelenggara</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Event</th> <!-- isinya judul -->
                            <th scope="col">Aktif Tiket</th> <!-- isinya tanggal event -->
                            <th scope="col">Kategori</th> <!-- isinya nama kategori | sub kategori -->
                            <th scope="col">Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tikets as $tiket)
                            <tr style="text-align: center">
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $tiket->event->penyelenggara->name }}</td>
                                <td>{{ $tiket->user->name }}</td>
                                <td>{{ $tiket->event->judul }}</td>
                                <td>{{ \Carbon\Carbon::parse($tiket->event->tanggal_event)->format('d M Y') }}</td>
                                <td>{{ $tiket->event->kategori->nama_kategori }} |
                                    {{ $tiket->event->kategori->sub_kategori }}</td>
                                <td
                                    style="
                    background-color:
                        @if ($tiket->status_pembayaran === 'Sudah Dibayar') #22c55e
                        @elseif($tiket->status_pembayaran === 'Belum Dibayar') orange
                        @elseif($tiket->status_pembayaran === 'Gagal') red
                        @else black @endif;
                    color: white;
                    font-weight: 600;
                    padding: 6px 12px;
                    border-radius: 6px;
                    text-align: center;
                    display: inline-block;
                ">
                                    {{ ucfirst(str_replace('_', ' ', $tiket->status_pembayaran)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </main>

    </body>
@endsection
