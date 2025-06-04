@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show bg-gray-200">
        <!-- Navbar -->
        <aside
            class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
            id="sidenav-main">
            <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="">
                    <img src="{{ asset('img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                </a>
            </div>
            <hr class="horizontal light mt-4 mb-2">
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <!-- DASHBOARD -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.dash') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.dash') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.dash') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>

                    <!-- PENGGUNA -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.user.*') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.user.*') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.user.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user-group" style="color: #ffffff;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Pengguna</span>
                        </a>
                    </li>

                    <!-- KATEGORI EVENT -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.category.*') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.category.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bookmark" style="color: #ffffff;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Kategori Event</span>
                        </a>
                    </li>

                    <!-- DATA EVENT -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.event.*') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.event.*') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.event.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-calendar-days" style="color: #ffffff;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Data Event</span>
                        </a>
                    </li>

                    <!-- LAPORAN EVENT (TIKET) -->
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.tiket.*') ? 'active' : '' }}"
                            style="{{ request()->routeIs('admin.tiket.*') ? 'background: rgba(191, 191, 191, 0.4);' : '' }}"
                            href="{{ route('admin.tiket.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-file-lines" style="color: #ffffff;"></i>
                            </div>
                            <span class="nav-link-text ms-1">Laporan Event</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidenav-footer position-absolute w-100 bottom-0 ">
                <div class="mx-3">
                    <a class="btn bg-white w-100" href="{{ route('logout') }}" type="button"><i
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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">List Pengguna</h5>
                        <p id="tanggal" class="mb-0"
                            style="color: #868686; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500;">
                        </p>
                    </nav>
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link text-body px-0">
                                <span
                                    style="display: none; font-family: 'Poppins', sans-serif; color: #515151; font-weight: 600;"
                                    class="d-sm-inline d-none">Hai, {{ Auth::user()->name }}&ensp;</span>
                                <i class="fa fa-user me-sm-1" style="color: #515151;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            <!-- End Side Navbar -->
            <div class="button-container"
                style="padding-bottom: 20px; padding-top: 10px; display: flex; justify-content: space-between; padding-right: 30px;">
                <a href="{{ route('admin.user.create') }}" class="btn-riwayat" style="font-size: 13px;">
                    <i class="fa-solid fa-plus" style="margin-right: 10px;"></i> Tambah Pengguna
                </a>
            </div>


            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <form action="{{ route('admin.user.index') }}" method="GET">
                    <div class="input-group">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="search" value="{{ request('search') }}" style="font-size: 14px; width: 400px;"
                                name="search" id="search" class="form-control"
                                placeholder="Cari data pengguna disini .." />
                        </div>
                        <button type="submit" class="btn"
                            style="background-color:#acacac; color: #fff; font-size: 15px;" data-mdb-ripple-init>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $s)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td
                                    style="max-width: 130px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $s->name }}</td>
                                <td>{{ $s->username }}</td>
                                <td
                                    style="max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $s->email }}</td>
                                <td
                                    style="max-width: 160px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $s->jenis_kelamin }}
                                </td>

                                <td>{{ $s->role }}</td>
                                <td>
                                    <form action="{{ route('admin.user.destroy', $s->id) }}" method="POST"
                                        class="form-delete">
                                        <div class="column">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#updateuser{{ $s->id }}"
                                                style="font-size: 13px; background-color: rgb(233, 198, 92); color: #fff; padding: 10px 20px; border: none; border-radius: 10px; font-weight: 500; cursor: pointer; font-family: 'Poppins', sans-serif; margin-right: 10px;">
                                                <i class="fa-solid fa-pen-to-square" style="margin-right: 10px;"></i> Edit
                                            </button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="font-size: 13px; background-color: rgb(226, 62, 62); color: #fff; padding: 10px 20px; border: none; border-radius: 10px; font-weight: 500; cursor: pointer; font-family: 'Poppins', sans-serif; margin-left: 12px;">
                                                <i class="fa-solid fa-trash" style="margin-right: 10px;"></i> Hapus
                                            </button>
                                        </div>
                                    </form>

                                    {{-- MODAL UPDATE USER --}}
                                    <div class="modal fade" id="updateuser{{ $s->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border-radius: 12px;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        style="margin-left: 15px; font-weight: 600; color: #515151; font-size: 17px;">
                                                        <i class="fas fa-user-edit" style="margin-right: 5px;"></i> Update
                                                        Pengguna
                                                    </h5>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('admin.user.update', $s->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="name{{ $s->id }}" class="form-label"
                                                                style="font-weight: 500;">Nama Lengkap</label>
                                                            <input type="text" style="font-size: 14px;"
                                                                class="form-control" id="name{{ $s->id }}"
                                                                name="name" value="{{ $s->name }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="username{{ $s->id }}" class="form-label"
                                                                style="font-weight: 500;">Username</label>
                                                            <input type="text" style="font-size: 14px;"
                                                                class="form-control" id="username{{ $s->id }}"
                                                                name="username" value="{{ $s->username }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="email{{ $s->id }}" class="form-label"
                                                                style="font-weight: 500;">Email</label>
                                                            <input type="email" style="font-size: 14px;"
                                                                class="form-control" id="email{{ $s->id }}"
                                                                name="email" value="{{ $s->email }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="password{{ $s->id }}" class="form-label"
                                                                style="font-weight: 500;">Password</label>
                                                            <input type="password" style="font-size: 14px;"
                                                                class="form-control" id="password{{ $s->id }}"
                                                                name="password"
                                                                placeholder="Ketikkan password jika ingin ganti">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="jenis_kelamin{{ $s->id }}"
                                                                class="form-label" style="font-weight: 500;">Jenis
                                                                Kelamin</label>
                                                            <select class="form-control"
                                                                style="font-size: 14px; border-radius: 10px; margin-top: 10px;"
                                                                id="jenis_kelamin{{ $s->id }}"
                                                                name="jenis_kelamin">
                                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                                <option value="Laki-laki"
                                                                    {{ $s->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                    Laki-laki</option>
                                                                <option value="Perempuan"
                                                                    {{ $s->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                    Perempuan</option>
                                                                <option value="Lainnya"
                                                                    {{ $s->jenis_kelamin == 'Lainnya' ? 'selected' : '' }}>
                                                                    Lainnya</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="role{{ $s->id }}" class="form-label"
                                                                style="font-weight: 600; font-size: 14px;">Role</label>
                                                            <select class="form-control"
                                                                style="font-size: 14px; border-radius: 10px; margin-top: 10px;"
                                                                id="role{{ $s->id }}" name="role">
                                                                <option value="">-- Pilih Role --</option>
                                                                <option value="User"
                                                                    {{ $s->role == 'User' ? 'selected' : '' }}>User
                                                                </option>
                                                                <option value="Admin"
                                                                    {{ $s->role == 'Admin' ? 'selected' : '' }}>Admin
                                                                </option>
                                                                <option value="Officer"
                                                                    {{ $s->role == 'Officer' ? 'selected' : '' }}>
                                                                    Penyelenggara</option>
                                                            </select>
                                                        </div>

                                                        <!-- Submit button -->
                                                        <button type="submit" class="btn-user">
                                                            <i class="fa-solid fa-right-to-bracket"
                                                                style="margin-right: 10px;"></i> Update
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- END MODAL UPDATE USER --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-footer"
                style="padding-top: 10px; padding-left: 15px; font-family: 'Poppins', sans-serif; font-size: 13px;">
                <p>{{ $users->links() }}</p>
            </div>
        </main>

        <script>
            // Untuk menampilkan tanggal
            var date = new Date();
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            document.getElementById("tanggal").innerHTML = date.toLocaleDateString('id-ID', options);

            function adduser() {
                var myModal = new bootstrap.Modal(document.getElementById('adduser'));
                myModal.show();
            }
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Sweetalert delete confirmation
                const deleteForms = document.querySelectorAll('.form-delete');

                deleteForms.forEach(form => {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault(); // mencegah submit langsung

                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Data ini akan dihapus secara permanen!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#e23e3e',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // submit form jika dikonfirmasi
                            }
                        });
                    });
                });

                // Sweetalert success message (tambah/update)
                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        timer: 2500,
                        showConfirmButton: false
                    });
                @endif
            });
        </script>

    </body>
@endsection
