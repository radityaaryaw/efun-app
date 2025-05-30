@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show bg-gray-200">
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
                        <a class="nav-link text-white" style="background: rgba(191, 191, 191, 0.4);">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>

                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white " href="{{route('officerborrow')}}">

                          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="fa-solid fa-file-pen" style="color: #ffffff;"></i>
                          </div>

                          <span class="nav-link-text ms-1">Validasi Data</span>
                      </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('officerbook')}}">

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
                    <a class="btn bg-white w-100" href="{{route('logout')}}" type="button"><i
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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Dashboard Penyelenggara</h5>
                    </nav>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link text-body px-0">
                                <span
                                    style="display: none; font-family: 'Poppins', sans-serif; color: #515151; font-weight: 600;"
                                    class="d-sm-inline d-none">Hai, {{Auth::user()->name}} &ensp;</span>
                                <i class="fa fa-user me-sm-1" style="color: #515151;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            <!-- End Side Navbar -->

            <div class="container-fluid py-4 mt-2" style="padding-right: 20px; padding-left: 20px;">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="border-radius-lg pt-4 pb-6 px-3 d-flex justify-content-between align-items-start"
                        style="background: linear-gradient(90deg, hsl(210, 100%, 68%), #ff74b7); box-shadow: 5px 5px 10px #c7e8ff; border-radius: 15px;">

                        <!-- Kiri: Salam & Nama -->
                        <div>
                            <h1 class="text-white text-capitalize" style="font-family: 'Poppins', sans-serif;">👋🏻</h1>
                            <h6 class="text-white text-capitalize" style="font-family: 'Poppins', sans-serif;">
                                Hai, {{ Auth::user()->name }}
                            </h6>
                            <p class="text-white"
                                style="font-size: 13px; margin-bottom: 0px; font-family: 'Poppins', sans-serif;">
                                Selamat datang kembali di dashboard E-Fun.
                            </p>
                        </div>

                        <!-- Kanan: Role penyelenggara dalam kotak -->
                        <div class="mt-2 mr-4">
                            <span class="text-white d-inline-flex align-items-center px-4 py-2"
                                style="background-color: rgba(255, 255, 255, 0.2); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">
                                <i class="fa-solid fa-image-portrait me-2"></i> Penyelenggara
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </main>
    </body>
@endsection
