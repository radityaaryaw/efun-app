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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Kategori Event
                        </h5>
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
            </nav>
            <!-- End Side Navbar -->

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px; margin-bottom: 40px;">
                <form action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div style="flex: 1; position: relative;">
                            <label for="nama_kategori" style="font-weight: 500; font-size: 14px; color:#515151;"
                                class="form-label">Nama Kategori</label>
                            <select class="form-control"
                                style="font-size: 14px; border-radius: 10px; margin-top: 10px; color:#868686;"
                                id="nama_kategori" name="nama_kategori" required>
                                <option value="">-- Pilih Nama Kategori --</option>
                                <option value="Event">Event</option>
                                <option value="Atraksi">Atraksi</option>
                            </select>
                        </div>
                        <div style="flex: 1;">
                            <label for="sub_kategori" style="font-weight: 500; font-size: 14px; color:#515151;"
                                class="form-label">Sub Kategori</label>
                            <input type="text"
                                style="font-size: 14px; padding: 18px; border-radius: 10px; margin-top: 10px; color:#868686;"
                                class="form-control" id="sub_kategori" placeholder="Ketikkan sub kategori"
                                name="sub_kategori" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-user"
                        style="margin-bottom: 15px; margin-top: 15px; font-size: 13px;">
                        <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Simpan
                    </button>
                </form>
            </div>

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Sub Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategoris as $kategori)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>{{ $kategori->sub_kategori }}</td>
                                <td>
                                    <form action="{{ route('admin.category.destroy', $kategori->id) }}" method="post">
                                        <div class="column">
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#update{{ $kategori->id }}"
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

                                    {{-- TAMPILKAN MODAL --}}
                                    <div class="modal fade" id="update{{ $kategori->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border-radius: 12px;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        style="margin-left: 15px; font-weight: 600; color: #515151; font-size: 17px;">
                                                        Update Kategori</h5>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('admin.category.update', $kategori->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="nama_kategori" class="form-label"
                                                                style="font-weight: 500;">Kategori</label>
                                                            <input type="text" style="font-size: 14px;"
                                                                class="form-control" id="nama_kategori"
                                                                name="nama_kategori"
                                                                value="{{ $kategori->nama_kategori }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="sub_kategori" class="form-label"
                                                                style="font-weight: 500;">Sub Kategori</label>
                                                            <input type="text" style="font-size: 14px;"
                                                                class="form-control" id="sub_kategori"
                                                                name="sub_kategori" value="{{ $kategori->sub_kategori }}"
                                                                required>
                                                        </div>
                                                        <button type="submit" class="btn-user" style="font-size: 13px;">
                                                            <i class="fa-solid fa-right-to-bracket"
                                                                style="margin-right: 10px;"></i> Update
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data kategori belum tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </body>
@endsection
