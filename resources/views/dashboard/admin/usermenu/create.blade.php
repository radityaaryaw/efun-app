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

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('admin.dash')}}">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>

                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " style="background: rgba(191, 191, 191, 0.4);">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user-group" style="color: #ffffff;"></i>
                            </div>

                            <span class="nav-link-text ms-1"> Pengguna</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{route('category.index')}}">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bookmark" style="color: #ffffff;"></i>
                            </div>

                            <span class="nav-link-text ms-1"> Kategori Event</span>
                        </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-white " href="{{route('lending')}}">

                          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-ticket" style="color: #ffffff;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Event</span>
                      </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('book.index')}}">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-file-signature" style="color: #ffffff;"></i>
                        </div>

                        <span class="nav-link-text ms-1">Pengajuan Event</span>
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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Tambah Pengguna</h5>
                        <p id="tanggal" class="mb-0"
                            style="color: #515151; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500;">
                        </p>
                    </nav>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link text-body px-0">
                                <span
                                    style="display: none; font-family: 'Poppins', sans-serif; color: #515151; font-weight: 600;"
                                    class="d-sm-inline d-none">Hai, {{Auth::user()->name}}&ensp;</span>
                                <i class="fa fa-user me-sm-1" style="color: #515151;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            <!-- End Side Navbar -->
            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px; margin-bottom: 40px;">
                <form action="{{route('user.store')}}" method="post" onsubmit="return validateForm()">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" style="font-weight: 600; font-size: 14px;" class="form-label">Nama Lengkap</label>
                            <input type="text" style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;" class="form-control" id="name" placeholder="Ketikkan nama lengkap" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="username" style="font-weight: 600; font-size: 14px;" class="form-label">Username</label>
                            <input type="text" style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;" class="form-control" id="username" placeholder="Ketikkan nama pengguna" name="username" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" style="font-weight: 600; font-size: 14px;" class="form-label">Email</label>
                            <input type="email" style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;" class="form-control" id="email" placeholder="Ketikkan email" name="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" style="font-weight: 600; font-size: 14px;" class="form-label">Password</label>
                            <input type="password" style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;" class="form-control" id="password" placeholder="Ketikkan password" name="password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="address" style="font-weight: 600; font-size: 14px;" class="form-label">Alamat</label>
                            <textarea class="form-control" style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;" name="address" rows="4" placeholder="Ketikkan alamat anda"></textarea>
                        </div>
                        {{-- YANG BENER NANTI INI YANG DIMASUKIN --}}
                        {{-- <div class="col-md-6 mb-3">
                            <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Jenis Kelamin</label>
                            <div style="margin-top: 10px; font-size: 14px;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="" id="" value="Laki-laki">
                                    <label class="form-check-label" for="">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="" id="" value="Perempuan">
                                    <label class="form-check-label" for="">Perempuan</label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-6 mb-3">
                            <div class="form-outline">
                                <label class="form-label" style="font-weight: 600; font-size: 14px;" for="role">Role</label>
                                <select class="form-control" style="font-size: 14px; border-radius: 10px; margin-top: 10px;" id="role" name="role">
                                    <option value="">-- Pilih Role --</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Officer">Penyelenggara</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-user" style="margin-bottom: 15px; margin-top: 15px; font-size: 13px;">
                        <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Simpan
                    </button>
                </form>
            </div>

        </main>

    </body>
@endsection
