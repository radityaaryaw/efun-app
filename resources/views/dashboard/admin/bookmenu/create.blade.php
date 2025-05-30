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
                        <a class="nav-link text-white " href="{{route('user.index')}}">
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
                    <a class="nav-link text-white " style="background: rgba(191, 191, 191, 0.4);">
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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Tambah Pengajuan</h5>
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
                <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="cover" style="font-weight: 600; font-size: 14px;" class="form-label">Cover Event</label>
                        <input type="file" style="font-size: 14px; border-radius: 10px; padding: 10px; margin-top: 10px;" class="form-control" id="cover" name="cover" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" style="font-weight: 600; font-size: 14px;" class="form-label">Nama Event</label>
                        <input type="text" style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;" class="form-control" id="title" placeholder="Ketikkan nama event" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Deskripsi Event</label>
                        <textarea
                            style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px; height: 150px; resize: vertical;"
                            class="form-control"
                            id=""
                            placeholder="Ketikkan deskripsi event disini"
                            name=""
                            required></textarea>
                    </div>

                    <!-- Baris Harga dan Stok Tiket -->
                    <div class="row">
                        <!-- Harga Tiket -->
                        <div class="col-md-6 mb-3">
                            <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Harga Tiket</label>
                            <input type="text"
                                style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;"
                                class="form-control" id="" name="" placeholder="Ketikkan harga tiket" required
                                oninput="formatRupiah(this)">
                        </div>

                        <!-- Stok Tiket -->
                        <div class="col-md-6 mb-3">
                            <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Stok Tiket</label>
                            <input type="number"
                                style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;"
                                class="form-control" id="" name="" placeholder="Ketikkan jumlah stok tiket" required>
                        </div>
                    </div>

                    <!-- Baris Tanggal dan Kategori -->
                    <div class="row">
                        <!-- Tanggal Event -->
                        <div class="col-md-6 mb-3">
                            <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Tanggal Event</label>
                            <input type="date"
                                style="font-size: 14px; border-radius: 15px; padding: 16px 26px; margin-top: 10px;"
                                class="form-control" id="" name="" required>
                        </div>

                        <!-- Kategori Event -->
                        <div class="col-md-6 mb-3">
                            <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Kategori Event</label>
                            <select class="form-control"
                                style="font-size: 14px; border-radius: 10px; margin-top: 10px;" id="" name="">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($namecategory as $category)
                                    <option value="{{$category->name_category}}">{{$category->name_category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <script>
                    function formatRupiah(input) {
                        let angka = input.value.replace(/\D/g, "");
                        let formatted = new Intl.NumberFormat('id-ID').format(angka);
                        input.value = formatted;
                    }
                    </script>

                    <button type="submit" class="btn-user" style="margin-bottom: 15px; margin-top: 15px; font-size: 13px;">
                        <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Simpan
                    </button>
                </form>
            </div>

        </main>

    </body>
@endsection
