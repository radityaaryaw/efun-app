@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show  bg-gray-200">
        <!-- Navbar -->
        @include('dashboard.user.partials.sidebar')
        <!-- End Navbar -->

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Side Navbar -->
            @include('dashboard.user.partials.navbar', ['title' => 'Pembelian Tiket'])
            <!-- End Side Navbar -->
            {{-- <div class="button-container" style="padding-bottom: 20px; padding-top: 10px; display: flex; justify-content: space-between; padding-right: 30px;">
                <button type="button" class="btn-riwayat" onclick="" style="font-size: 13px;">
                    <i class="fa-solid fa-print" style="margin-right: 10px;"></i> Print Bukti
                </button>
                <button type="button" class="btn-terima" onclick="" style="font-size: 13px;">
                    <i class="fa-solid fa-download" style="margin-right: 10px;"></i> Export Excel
                </button>
            </div> --}}


            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <table class="table">
                    <form action="{{ route('user.pembelian.create') }}" method="GET">
                        <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" value="{{ request('search') }}" style="font-size: 14px; width: 400px;"
                                    name="search" id="search" class="form-control"
                                    placeholder="Cari data validasi disini .." />
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
                            <th scope="col">Nama Pembeli</th> {{-- dari relasi ke User --}}
                            <th scope="col">Event</th> {{-- dari relasi ke Event --}}
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aktif Tiket</th>
                            <th scope="col">Kategori</th> {{-- dari relasi ke Kategori --}}
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelian as $item)
                            <tr style="text-align: center">
                                <th>{{ $loop->iteration }}</th>

                                {{-- Relasi ke user --}}
                                <td>{{ $item->user->name ?? '-' }}</td>

                                {{-- Relasi ke event --}}
                                <td>{{ $item->event->title ?? '-' }}</td>

                                {{-- Total harga --}}
                                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>

                                {{-- Tanggal aktif tiket --}}
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_aktif)->format('d M Y') }}</td>

                                {{-- Relasi ke kategori --}}
                                <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>

                                {{-- Aksi --}}
                                <td>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#viewDetail{{ $item->id }}" class="btn-riwayat"
                                        style="font-size: 13px; background-color: #007bff; margin-left: 10px;">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </main>

    </body>
@endsection
