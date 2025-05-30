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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Pengajuan Event</h5>
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
            {{-- <div class="button-container" style="padding-bottom: 20px; padding-top: 10px; display: flex; justify-content: space-between; padding-left: 20px;">
                <button type="button" class="btn-riwayat" onclick="addbook()" style="font-size: 13px;">
                    <i class="fa-solid fa-plus" style="margin-right: 10px;"></i> Tambah Pengajuan
                </button>
                <form action="{{route('exportbook')}}" method="POST">
                    @csrf
                    <input name="search" value="{{request('search')}}" type="text" hidden>
                    <button type="submit" class="btn-terima" onclick="" style="font-size: 13px;">
                        <i class="fa-solid fa-download" style="margin-right: 10px;"></i> Export Excel
                    </button>
                </form>
            </div>--}}


            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <form action="{{route('book.index')}}" method="GET">
                    <div class="input-group">
                        <div class="form-outline" data-mdb-input-init>
                          <input type="search" value="{{ request('search') }}" style="font-size: 14px; width: 400px;" name="search" id="search" class="form-control" placeholder="Cari data pengajuan disini .." />
                        </div>
                        <button type="button" class="btn" style="background-color:#acacac; color: #fff; font-size: 15px;" data-mdb-ripple-init>
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                </form>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Penyelenggara</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($book as $b)
                      <tr>
                        <th>{{$loop->iteration}}</th>
                        <td class="text-center">
                            <img src="{{ $b->cover }}" class="rounded" style="width: 150px">
                        </td>
                        <td>{{$b->publisher}}</td>
                        <td>
                            <div class="row">
                                <p style="font-size:13px; font-weight: 500">{{$b->title}}</p>
                                <p style="margin-top: -12px; font-size:13px; font-weight: 400">{{$b->author}}</p>
                            </div>
                        </td>
                        <td>{{$b->publisher}}</td>
                        <td>{{$b->year_publish}}</td>
                        <td>{{$b->year_publish}}</td>
                        <td>
    <form action="" method="POST" style="display: inline;">
        @csrf
        <button type="submit" style="font-size: 13px; background-color: #D2F7C9; color: #60AB32; padding: 10px 20px; border: none; border-radius: 10px; font-weight: 500; cursor: pointer; font-family: 'Poppins', sans-serif; margin-left: 12px;">
            <i class="fa-solid fa-check" style="margin-right: 8px; color: #60AB32;"></i> Disetujui
        </button>
    </form>

    <form action="" method="POST" style="display: inline; margin-left: 10px;">
        @csrf
        <button type="submit" style="font-size: 13px; background-color: #f7cdc9; color: #ab3232; padding: 10px 20px; border: none; border-radius: 10px; font-weight: 500; cursor: pointer; font-family: 'Poppins', sans-serif; margin-left: 12px;">
            <i class="fa-solid fa-xmark" style="margin-right: 8px;"></i> Ditolak
        </button>
    </form>

    <!-- Tombol untuk lihat detail -->
    <button type="button" data-bs-toggle="modal" data-bs-target="#viewDetail{{$b->id}}"
        class="btn-riwayat" style="font-size: 13px; background-color: #007bff; margin-left: 10px;">
        <i class="fa-solid fa-eye"></i>
    </button>

    <!-- Modal Detail Pengajuan -->
    <div class="modal fade" id="viewDetail{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="viewDetailLabel{{$b->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header">
                    <h5 style="margin-left: 15px; font-weight: 600; color:#515151; font-size: 17px;">
                        <i class="fas fa-info-circle" style="margin-right: 5px;"></i> Detail Pengajuan
                    </h5>
                </div>
                <div class="modal-body" style="padding: 25px;">
                    <img src="{{ asset('img/contoh.png') }}" width="100%" style="border-radius: 8px; margin-bottom: 15px;">

                    <div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 20px;">
                        <i class="fa-solid fa-map-location-dot" style="font-size: 24px; color: #dc5496; margin-top: 4px;"></i>
                        <div>
                            <div style="font-weight: 600; font-size: 14px; color: #ff74b7;">Taman Safari Night</div>
                            <div style="font-weight: 300; font-size: 12px; color: #ff94c8;">Kategori Atraksi</div>
                        </div>
                    </div>
                    <p style="font-size: 14px; font-weight: 500; color: #4389cf; margin-bottom: 4px;">Deskripsi Event</p>
                    <p style="font-weight: 300; font-size: 13px; color: #515151; margin-top: 0; white-space: normal; word-wrap: break-word;">
                        Taman Safari Night atau Night Safari adalah program wisata yang menawarkan pengalaman melihat satwa liar di malam hari, terutama satwa nokturnal. Pengalaman ini berbeda dengan mengunjungi kebun binatang pada siang hari, di mana pengunjung dapat menikmati aktivitas satwa yang berbeda di malam hari.
                    </p>

                    <p style="font-size: 14px; font-weight: 500; color: #4389cf; margin-bottom: 4px;">Penyelenggara</p>
                    <p style="font-weight: 300; font-size: 13px; color: #515151; margin-top: 0; white-space: normal; word-wrap: break-word;">
                        PT. Taman Safari Indonesia
                    </p>
                    <p style="font-size: 14px; font-weight: 500; color: #4389cf; margin-bottom: 4px;">Informasi Event</p>
                    <table style="width: 100%; font-size: 13px; color: #515151; border-collapse: collapse; margin-bottom: 20px;">
                        <tr>
                            <td style="padding: 6px 0; font-weight: 500;">Tanggal Event</td>
                            <td style="padding: 6px 0;">15 Juni 2025</td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 0; font-weight: 500; width: 40%;">Harga Tiket</td>
                            <td style="padding: 6px 0;">Rp 75.000</td>
                        </tr>
                        <tr>
                            <td style="padding: 6px 0; font-weight: 500;">Stok Tiket</td>
                            <td style="padding: 6px 0;">120</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</td>

                      </tr>
                      @empty
                      <div class="alert alert-danger" style="color: white;">
                        <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i> Data buku belum tersedia
                      </div>
                      @endforelse
                    </tbody>
                  </table>
            </div>
        </main>
        <script>

            function addbook() {
                window.location.href = '{{ route('book.create') }}';
            }
        </script>
    </body>
@endsection
