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
                        <a class="nav-link text-white" href="{{route('user.dash')}}">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>

                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " style="background: rgba(191, 191, 191, 0.4);">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-ticket" style="color: #ffffff;"></i>
                            </div>

                            <span class="nav-link-text ms-1">Tiket Event</span>
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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Data Tiket Event</h5>
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

            {{-- TABEL DATA EVENT --}}
            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <table class="table">
                    <form action="{{ route('lending') }}" method="GET">
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" value="{{ request('search') }}" style="font-size: 14px; width: 400px;" name="search" id="search" class="form-control" placeholder="Cari tiket event disini .." />
                            </div>
                            <button type="button" class="btn" style="background-color:#acacac; color: #fff; font-size: 15px;" data-mdb-ripple-init>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">#</th>
                            <th scope="col">Penyelenggara</th>
                            <th scope="col">Event</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aktif Tiket</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Status Pembayaran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $index = 1; @endphp
                        @forelse($borrow as $item)
                            @if($item->user_id == Auth::user()->id)
                                <tr style="text-align: center">
                                    <th>{{ $index++ }}</th>
                                    <td>{{ $item->users->name }}</td>
                                    <td>{{ $item->book->title }}</td>
                                    <td>{{ $item->book->title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->lending_date)->format('d M Y') }}</td>
                                    <td>Event | Konser</td>
                                    <td>
                                        {{-- KONDISI JIKA TIKET PERLU DILAKUKAN PEMBAYARAN --}}
                                        {{-- <span style="font-weight: 500; color: rgb(254, 53, 53);">
                                            Menunggu Pembayaran
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#viewDetail{{ $item->id }}" style="padding: 6px 8px; font-size: 13px; border: none; border-radius: 5px; margin-left: 10px;">
                                                <i class="fas fa-upload" style="color: red;"></i>
                                            </button>
                                        </span> --}}
                                        <!-- MODAL MENUNGGU PEMBAYARAN-->
                                        <div class="modal fade" id="viewDetail{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="viewDetailLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="border-radius: 12px;">
                                                    <div class="modal-header">
                                                        <h5 style="margin-left: 15px; font-weight: 600; color:#515151; font-size: 17px;">
                                                            <i class="fas fa-info-circle" style="margin-right: 5px;"></i> Unggah Bukti
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body" style="padding: 20px; text-align: left;">
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                {{-- @csrf @method('PUT') --}}
                                                                <p style="font-size: 14px; font-weight: 500; color: #4389cf; margin-bottom: 4px;">Informasi Pembayaran</p>
                                                                <table style="width: 100%; font-size: 13px; color: #515151; border-collapse: collapse; margin-bottom: 20px;">
                                                                    <tr>
                                                                        <td style="padding: 6px 0; font-weight: 500;">Nama Pembeli</td>
                                                                        <td style="padding: 6px 0;">Raditya Arya</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 6px 0; font-weight: 500;">Event</td>
                                                                        <td style="padding: 6px 0;">Rasvara Fest</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 6px 0; font-weight: 500;">Jumlah Tiket</td>
                                                                        <td style="padding: 6px 0;">3</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding: 6px 0; font-weight: 500; width: 40%;">Total Harga</td>
                                                                        <td style="padding: 6px 0;">Rp 300.000</td>
                                                                    </tr>
                                                                </table>

                                                                <div class="mb-3">
                                                                    <p style="font-size: 14px; font-weight: 500; color: #4389cf; margin-bottom: 4px;">Unggah Bukti Pembayaran</p>
                                                                    <input type="file" class="form-control" style="font-size: 14px; border-radius: 10px; padding: 10px; margin-top: 10px;" id="cover" name="cover" required>
                                                                </div>

                                                                <button type="submit" class="btn-user">
                                                                    <i class="fa-solid fa-upload" style="margin-right: 10px;"></i> Unggah
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>{{-- END MODAL MENUNGGU PEMBAYARAN --}}


                                        {{-- KONDISI JIKA TIKET SUDAH DIAPPROVE OLEH PENYELENGGARA --}}
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#viewTicket{{$item->id}}"
                                            class="btn-riwayat" style="font-size: 13px; background-color: #007bff; margin-left: 10px;">
                                            <i class="fa-solid fa-eye" style="margin-right: 5px;"></i> Lihat Tiket Event
                                        </button>

                                        <div class="modal fade" id="viewTicket{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="viewDetailLabel{{$item->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="border-radius: 12px;">
                                                    <div class="modal-header">
                                                        <h5 style="margin-left: 15px; font-weight: 600; color:#515151; font-size: 17px;">
                                                            <i class="fa-solid fa-ticket" style="margin-right: 5px;"></i> Tiket Event
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body" style="padding: 25px; text-align: left;">
                                                    <!-- Pesan Konfirmasi -->
                                                    <div style="background-color: #e6f0fb; border-left: 4px solid #4389cf; padding: 12px 16px; border-radius: 8px; margin-top: 10px;">
                                                        <p style="font-weight: 500; font-size: 13px; color: #4389cf; margin: 0; white-space: normal; word-wrap: break-word;">
                                                            Yay, selamat {{ $item->users->name }}! Tiket anda untuk event "{{ $item->book->title }}" berhasil terkonfirmasi, selamat bersenang-senang dan bahagia selalu ya Sobat!
                                                        </p>
                                                    </div>

                                                    <!-- Booking ID -->
                                                    <div style="text-align: left; margin-top: 15px;">
                                                        <div style="display: inline-block; background-color: #ffe4f0; padding: 6px 10px; border-radius: 8px;">
                                                            <span style="font-weight: 600; font-size: 12px; color: #ff74b7;">BOOKING ID :&nbsp;</span>
                                                            <span style="font-weight: 400; font-size: 12px; color: #ff94c8;">FNE0345</span>
                                                        </div>
                                                    </div>

                                                    <!-- Taman Safari Info -->
                                                    <div style="padding-top: 15px; display: flex; margin-bottom: 20px;">
                                                        <div style="display: flex; align-items: flex-start; gap: 15px;">
                                                            <i class="fa-solid fa-map-location-dot" style="font-size: 24px; color: #dc5496; margin-top: 4px;"></i>
                                                            <div>
                                                                <div style="font-weight: 600; font-size: 14px; color: #ff74b7;">Taman Safari Night</div>
                                                                <div style="font-weight: 300; font-size: 12px; color: #ff94c8;">Kategori Atraksi</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr style="padding-top: 15px;border: none; border-bottom: 1px solid #484747; margin: 15px 0;" />
                                                    <!-- Jadwal Event -->
                                                    <p style="font-size: 14px; font-weight: 600; color: #4389cf; margin-bottom: 15px;">Jadwal Event</p>
                                                    <p style="display: flex; align-items: center; gap: 10px; font-weight: 400; font-size: 13px; color: #515151; margin-bottom: 8px;">
                                                        <i class="fa-regular fa-calendar-days" style="color: #4389cf; font-size: 18px;"></i> Senin, 12 Juni 2025
                                                    </p>

                                                    <!-- Alamat -->
                                                    <p style="display: flex; align-items: flex-start; gap: 10px; font-weight: 400; font-size: 13px; color: #515151; margin-top: 0; white-space: normal; word-wrap: break-word;">
                                                        <i class="fa-solid fa-location-dot" style="color: #4389cf; margin-top: 4px; font-size: 18px;"></i>
                                                        Desa Jatiarjo, RT.12/RW.06, Kecamatan Prigen, Kabupaten Pasuruan, Jawa Timur. Taman Safari Prigen berada di kaki Gunung Arjuno
                                                    </p>

                                                    <hr style="padding-top: 15px; border: none; border-bottom: 1px solid #484747; margin: 15px 0;" />
                                                    <!-- Detail Pembelian -->
                                                    <p style="font-size: 14px; font-weight: 600; color: #4389cf; margin-bottom: 4px;">Detail Pembelian Tiket</p>
                                                    <table style="width: 100%; font-size: 13px; color: #515151; border-collapse: collapse; margin-bottom: 20px;">
                                                        <tr>
                                                            <td style="padding: 6px 0; font-weight: 500;">Nama Pembeli</td>
                                                            <td style="padding: 6px 0;">Raditya Arya</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 6px 0; font-weight: 500;">Event</td>
                                                            <td style="padding: 6px 0;">Rasvara Fest</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 6px 0; font-weight: 500;">Jumlah Tiket</td>
                                                            <td style="padding: 6px 0;">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 6px 0; font-weight: 500; width: 40%;">Total Harga</td>
                                                            <td style="padding: 6px 0;">Rp 300.000</td>
                                                        </tr>
                                                    </table>

                                                </div>

                                                </div>
                                            </div>
                                        </div>


                                        {{-- KONDISI JIKA TIKET SUDAH DIBAYAR NAMUN MASIH PERLU NUNGGU VERIFIKASI PENYELENGGARA --}}
                                        {{-- <span style="font-weight: 500; color: rgb(253, 138, 44);">
                                            Menunggu Verifikasi
                                        </span> --}}
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <div class="alert alert-danger" style="color: white;">
                                <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i> Saat ini, data peminjaman belum tersedia
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>

            </div>
            </div>
            </div>

            </div>
        </main>
    </body>
@endsection
