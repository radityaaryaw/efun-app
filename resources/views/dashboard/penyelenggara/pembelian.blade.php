@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show  bg-gray-200">
        <!-- Navbar -->
            @include('dashboard.penyelenggara.partials.sidebar')
        <!-- End Navbar -->

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Side Navbar -->
            @include('dashboard.penyelenggara.partials.navbar')
            <!-- End Side Navbar -->

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <table class="table">
                    <form action="{{ route('penyelenggara.pembelian.create') }}" method="GET">
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
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Event</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aktif Tiket</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelian as $item)
                            <tr style="text-align: center">
                                <th>{{ $loop->iteration }}</th>

                                {{-- Relasi ke user --}}
                                <td>{{ $item->user->name }}</td>

                                {{-- Relasi ke event --}}
                                <td>{{ $item->event->title }}</td>

                                {{-- Total harga --}}
                                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>

                                {{-- Tanggal aktif tiket --}}
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_aktif)->format('d M Y') }}</td>

                                {{-- Relasi ke kategori --}}
                                <td>{{ $item->kategori->nama_kategori }}</td>

                                {{-- Aksi --}}
                                <td>
                                    {{-- Tombol disetujui --}}
                                    <form action="{{ route('pembelian.setuju', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit"
                                            style="font-size: 13px; background-color: #D2F7C9; color: #60AB32; padding: 10px 20px; border: none; border-radius: 10px; font-weight: 500; cursor: pointer; font-family: 'Poppins', sans-serif;">
                                            <i class="fa-solid fa-check" style="margin-right: 8px; color: #60AB32;"></i>
                                            Disetujui
                                        </button>
                                    </form>

                                    {{-- Tombol ditolak --}}
                                    <form action="{{ route('pembelian.tolak', $item->id) }}" method="POST"
                                        style="display: inline; margin-left: 10px;">
                                        @csrf
                                        <button type="submit"
                                            style="font-size: 13px; background-color: #f7cdc9; color: #ab3232; padding: 10px 20px; border: none; border-radius: 10px; font-weight: 500; cursor: pointer; font-family: 'Poppins', sans-serif;">
                                            <i class="fa-solid fa-xmark" style="margin-right: 8px;"></i> Ditolak
                                        </button>
                                    </form>

                                    {{-- Tombol lihat detail --}}
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#viewDetail{{ $item->id }}" class="btn-riwayat"
                                        style="font-size: 13px; background-color: #007bff; margin-left: 10px;">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    {{-- Modal Detail --}}
                                    <div class="modal fade" id="viewDetail{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="viewDetailLabel{{ $item->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border-radius: 12px;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" style="font-weight: 600; color:#515151;">
                                                        <i class="fas fa-info-circle" style="margin-right: 5px;"></i>
                                                        Bukti Pembayaran
                                                    </h5>
                                                </div>
                                                <div class="modal-body" style="padding: 25px;">
                                                    <p style="font-size: 14px; font-weight: 500; color: #4389cf;">Bukti
                                                        Transfer</p>
                                                    <img src="{{ asset('storage/' . $item->bukti_transfer) }}"
                                                        width="100%" style="border-radius: 8px; margin-bottom: 15px;">

                                                    <p style="font-size: 14px; font-weight: 500; color: #4389cf;">Informasi
                                                        Pembayaran</p>
                                                    <table
                                                        style="width: 100%; font-size: 13px; color: #515151; border-collapse: collapse;">
                                                        <tr>
                                                            <td style="padding: 6px 0; font-weight: 500;">Nama Pembeli</td>
                                                            <td style="padding: 6px 0;">{{ $item->user->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 6px 0; font-weight: 500;">Jumlah Tiket</td>
                                                            <td style="padding: 6px 0;">{{ $item->jumlah_tiket }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding: 6px 0; font-weight: 500;">Total Pembayaran
                                                            </td>
                                                            <td style="padding: 6px 0;">Rp
                                                                {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </main>

    </body>
@endsection
