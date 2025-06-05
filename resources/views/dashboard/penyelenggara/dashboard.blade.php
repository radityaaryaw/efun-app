@extends('layouts.admin')

@section('content')

    <body class="g-sidenav-show bg-gray-200">
        <!-- Sidebar -->
        @include('dashboard.penyelenggara.partials.sidebar')

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <!-- Navbar -->
            @include('dashboard.penyelenggara.partials.navbar')

            <div class="container-fluid py-4 mt-2" style="padding-right: 20px; padding-left: 20px;">

                <!-- Header Welcome Section -->
                <div class="card-header p-0 position-relative mt-n4 z-index-2">
                    <div class="border-radius-lg pt-4 pb-6 px-3 d-flex justify-content-between align-items-start"
                        style="background: linear-gradient(90deg, hsl(210, 100%, 68%), #ff74b7); box-shadow: 5px 5px 10px #c7e8ff; border-radius: 15px;">

                        <!-- Greeting & User Info -->
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

                        <!-- Role Display -->
                        <div class="mt-2 mr-4">
                            <span class="text-white d-inline-flex align-items-center px-4 py-2"
                                style="background-color: rgba(255, 255, 255, 0.2); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">
                                <i class="fa-solid fa-image-portrait me-2"></i> Penyelenggara
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Header -->

                <!-- Total Event Card -->
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow border-0"
                            style="border-radius: 20px; background: linear-gradient(135deg, #6fb1fc, #4364f7); color: white;">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="icon bg-white text-primary rounded-circle p-3 me-3 shadow-sm">
                                        <i class="fa-solid fa-calendar-days fa-2xl"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1" style="font-weight: 600;">Total Event</h5>
                                        <p class="mb-0" style="font-size: 13px;">Jumlah event yang kamu kelola</p>
                                    </div>
                                </div>
                                <div class="text-end fs-2 fw-bold">
                                    {{ $totalEvents ?? 0 }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Daftar Event Terbaru -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm border-radius-lg p-3">
                            <h5 class="mb-3">Event Terbaru</h5>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Judul Event</th>
                                            <th>Tanggal</th>
                                            <th>Lokasi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentEvents as $event)
                                            <tr>
                                                <td>{{ $event->judul }}</td>
                                                <td>{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</td>
                                                <td>{{ $event->lokasi }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $event->status === 'Disetujui' ? 'success' : 'warning' }}">
                                                        {{ ucfirst($event->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">Belum ada event terbaru.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Container -->
        </main>
    </body>
@endsection
