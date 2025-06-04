@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show bg-gray-200">
        <!-- Navbar -->
        @include('dashboard.user.partials.sidebar')
        <!-- End Navbar -->

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Side Navbar -->
             @include('dashboard.user.partials.navbar', ['title' => 'Tiket Event'])
            <!-- End Side Navbar -->

            {{-- TABEL DATA EVENT --}}
            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <form action="#" method="GET">
                    <div class="input-group mb-3" style="max-width: 420px;">
                        <input type="search" value="{{ request('search') }}" name="search" id="search"
                            class="form-control" placeholder="Cari tiket event disini .." style="font-size: 14px;" />
                        <button type="submit" class="btn"
                            style="background-color:#acacac; color: #fff; font-size: 15px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <table class="table table-hover">
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
                        @foreach ($tikets as $tiket)
                            <tr style="text-align: center">
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $tiket->penyelenggara->name }}</td>
                                <td>{{ $tiket->user->name }}</td>
                                <td>{{ $tiket->judul_event }}</td>
                                <td>{{ \Carbon\Carbon::parse($tiket->tanggal_event)->format('d M Y') }}</td>
                                <td>{{ $tiket->kategori->nama_kategori }} | {{ $tiket->kategori->sub_kategori }}</td>
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
