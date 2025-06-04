@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show bg-gray-200">
        <!-- Navbar -->
        <aside
            class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
            id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="">
                    <img src="{{ asset('img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                </a>
            </div>
            <hr class="horizontal light mt-4 mb-2">
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Tambah Pengguna
                        </h5>
                        <p id="tanggal" class="mb-0"
                            style="color: #515151; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500;">
                        </p>
                    </nav>
                    <ul class="navbar-nav justify-content-end">
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
            </nav>
            <!-- End Side Navbar -->

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px; margin-bottom: 40px;">
                <form action="{{ route('admin.user.store') }}" method="post" onsubmit="return validateForm()">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" style="font-weight: 600; font-size: 14px;" class="form-label">Nama
                                Lengkap</label>
                            <input type="text"
                                style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Ketikkan nama lengkap" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="username" style="font-weight: 600; font-size: 14px;"
                                class="form-label">Username</label>
                            <input type="text"
                                style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="Ketikkan nama pengguna" name="username" value="{{ old('username') }}"
                                required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" style="font-weight: 600; font-size: 14px;"
                                class="form-label">Email</label>
                            <input type="email"
                                style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Ketikkan email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" style="font-weight: 600; font-size: 14px;"
                                class="form-label">Password</label>
                            <input type="password"
                                style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Ketikkan password" name="password" required minlength="6">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin" style="font-weight: 600; font-size: 14px;"
                                class="form-label">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                style="font-size: 14px; border-radius: 15px; margin-top: 10px;" id="jenis_kelamin"
                                name="jenis_kelamin" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                                <option value="Lainnya" {{ old('jenis_kelamin') == 'Lainnya' ? 'selected' : '' }}>
                                    Lainnya</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-outline">
                                <label class="form-label" style="font-weight: 600; font-size: 14px;"
                                    for="role">Role</label>
                                <select class="form-control @error('role') is-invalid @enderror"
                                    style="font-size: 14px; border-radius: 15px; margin-top: 10px;" id="role"
                                    name="role" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Penyelenggara" {{ old('role') == 'Penyelenggara' ? 'selected' : '' }}>
                                        Penyelenggara</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-user"
                        style="margin-bottom: 15px; margin-top: 15px; font-size: 13px;">
                        <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Simpan
                    </button>
                </form>

            </div>

        </main>

    </body>
@endsection
