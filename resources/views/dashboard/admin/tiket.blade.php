@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show  bg-gray-200">
        <!-- Navbar -->
        @include('dashboard.admin.partials.sidebar')
        <!-- End Navbar -->

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Side Navbar -->
            @include('dashboard.admin.partials.navbar')

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
                                <td>{{ $tiket->event->judul }}</td>
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
