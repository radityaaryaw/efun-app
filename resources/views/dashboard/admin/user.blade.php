@extends('layouts.admin')

@section('content')

    <body class="g-sidenav-show bg-gray-200">
        @include('dashboard.admin.partials.sidebar')

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            @include('dashboard.admin.partials.navbar')

            <div class="button-container"
                style="padding-bottom: 20px; padding-top: 10px; display: flex; justify-content: space-between; padding-right: 30px;">
                <button class="btn-riwayat" style="font-size: 13px;" onclick="addUser()">
                    <i class="fa-solid fa-plus" style="margin-right: 10px;"></i> Tambah User
                </button>
                <form action="{{ route('admin.user.index') }}" method="GET" style="display: flex; align-items: center;">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Cari user..."
                        style="font-size: 14px; width: 300px;" value="{{ request('search') }}">
                    <button type="submit" class="btn"
                        style="background-color:#acacac; color: #fff; font-size: 15px; margin-left: 5px;">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td
                                    style="max-width: 180px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>\
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#updateUser{{ $user->id }}" style="font-size: 13px;">
                                        <i class="fa-solid fa-pen-to-square" style="margin-right: 5px;"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" style="font-size: 13px;">
                                            <i class="fa-solid fa-trash" style="margin-right: 5px;"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Update User -->
                            <div class="modal fade" id="updateUser{{ $user->id }}" tabindex="-1"
                                aria-labelledby="updateUserLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="border-radius: 12px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateUserLabel{{ $user->id }}">
                                                <i class="fas fa-edit" style="margin-right: 5px;"></i> Update User
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="name{{ $user->id }}" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="name{{ $user->id }}"
                                                        name="name" value="{{ $user->name }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email{{ $user->id }}" class="form-label">Email</label>
                                                    <input type="email" class="form-control"
                                                        id="email{{ $user->id }}" name="email"
                                                        value="{{ $user->email }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="role{{ $user->id }}" class="form-label">Role</label>
                                                    <select class="form-select" id="role{{ $user->id }}" name="role"
                                                        required>
                                                        <option value="admin"
                                                            {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="penyelenggara"
                                                            {{ $user->role == 'penyelenggara' ? 'selected' : '' }}>
                                                            Penyelenggara</option>
                                                        <option value="user"
                                                            {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save me-2"></i> Update
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="table-footer"
                    style="padding-top: 10px; padding-left: 15px; font-family: 'Poppins', sans-serif; font-size: 13px;">
                    {{ $users->links() }}
                </div>
            </div>
        </main>

        <script>
            function addUser() {
                window.location.href = '{{ route('admin.user.create') }}';
            }
        </script>

        @if (session('success'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
    </body>
@endsection
