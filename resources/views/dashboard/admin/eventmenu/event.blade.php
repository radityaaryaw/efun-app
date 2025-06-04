@extends('layouts.admin')

@section('content')

    <body class="g-sidenav-show bg-gray-200">
        <!-- Sidebar -->
        {{-- Sidebar tetap sama, tidak diubah --}}
        @include('dashboard.admin.partials.sidebar')

        <!-- Main Content -->
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <!-- Navbar -->
            @include('dashboard.admin.partials.navbar', ['title' => 'Pengajuan Event'])

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <form action="{{ route('admin.event.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="search" value="{{ request('search') }}" name="search" id="search"
                            class="form-control" placeholder="Cari data pengajuan disini .."
                            style="font-size: 14px; width: 400px;" />
                        <button type="submit" class="btn"
                            style="background-color:#acacac; color: #fff; font-size: 15px;" data-mdb-ripple-init>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cover</th>
                            <th>Penyelenggara</th>
                            <th>Nama Event</th>
                            <th>Deskripsi</th>
                            <th>Harga Tiket</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $event)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td class="text-center">
                                    <img src="{{ $event->event_img }}" alt="Cover Image" class="rounded"
                                        style="width: 150px;">
                                </td>
                                <td>{{ $event->penyelenggara->name ?? '-' }}</td>
                                <td>{{ $event->judul }}</td>
                                <td>{{ Str::limit($event->deskripsi ?? '-', 50) }}</td>
                                <td>Rp {{ number_format($event->harga_tiket, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}</td>
                                <td>
                                    <span
                                        class="badge
                                            @if ($event->status === 'Disetujui') bg-success
                                            @elseif ($event->status === 'Ditolak') bg-danger
                                            @else bg-secondary text-white @endif"
                                        style="font-size: 13px; font-weight: 500; border-radius: 5px;">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>

                                <td>
                                    <form action="{{ route('admin.event.approve', $event->id) }}" method="POST"
                                        style="display: inline;" class="form-approval">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm"
                                            style="font-size: 13px; font-weight: 500; border-radius: 10px;">
                                            <i class="fa-solid fa-check me-1"></i> Disetujui
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.event.reject', $event->id) }}" method="POST"
                                        style="display: inline; margin-left: 5px;" class="form-reject">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            style="font-size: 13px; font-weight: 500; border-radius: 10px;">
                                            <i class="fa-solid fa-xmark me-1"></i> Ditolak
                                        </button>
                                    </form>

                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#viewDetail{{ $event->id }}"
                                        style="font-size: 13px; margin-left: 5px;">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="viewDetail{{ $event->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="viewDetailLabel{{ $event->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content" style="border-radius: 12px;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewDetailLabel{{ $event->id }}">
                                                        Detail Pengajuan Event</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <h6 class="mb-1">Cover:</h6>
                                                    <img src="{{ $event->event_img }}" alt="Cover Image"
                                                        class="img-fluid rounded">

                                                    <h6 class="mb-1">Judul Event:</h6>
                                                    <p class="mb-3">{{ $event->judul }}</p>

                                                    <h6 class="mb-1">Deskripsi:</h6>
                                                    <p class="mb-3">{{ $event->deskripsi }}</p>

                                                    <h6 class="mb-1">Penyelenggara:</h6>
                                                    <p class="mb-3">{{ $event->penyelenggara->name ?? '-' }}</p>

                                                    <h6 class="mb-1">Harga Tiket:</h6>
                                                    <p class="mb-3">Rp
                                                        {{ number_format($event->harga_tiket, 0, ',', '.') }}</p>

                                                    <h6 class="mb-1">Tanggal Event:</h6>
                                                    <p class="mb-3">
                                                        {{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}
                                                    </p>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data pengajuan event.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{ $events->links() }}
                </div>
            </div>
        </main>

        <!-- JS Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            document.querySelectorAll('.form-approval').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Yakin menyetujui event ini?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, setujui!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            document.querySelectorAll('.form-reject').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Tolak event ini?',
                        text: "Tindakan ini tidak dapat dibatalkan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, tolak!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    </body>
@endsection
