@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show  bg-gray-200">
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
                        <a class="nav-link text-white" href="{{route('officer.dash')}}">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>

                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " style="background: rgba(191, 191, 191, 0.4);">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bookmark" style="color: #ffffff;"></i>
                            </div>

                            <span class="nav-link-text ms-1">Book Category</span>
                        </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-white " href="{{route('officerborrow')}}">

                          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="fa-solid fa-check-to-slot" style="color: #ffffff;"></i>
                          </div>

                          <span class="nav-link-text ms-1">Book Borrowed</span>
                      </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('officerbook')}}">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-book" style="color: #ffffff;"></i>
                        </div>

                        <span class="nav-link-text ms-1">Book</span>
                    </a>
                </li>
                </ul>
            </div>
            <div class="sidenav-footer position-absolute w-100 bottom-0 ">
                <div class="mx-3">
                    <a class="btn bg-white w-100" href="{{route('logout')}}" type="button"><i
                            class="fa-solid fa-arrow-right-from-bracket" style="color: #2E4B60;"></i>
                        <span class="nav-link-text ms-1"
                            style="color: #2E4B60; font-family: 'Poppins', sans-serif; font-weight: 800; font-size: 14px;">Logout</span></a>
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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Kategori Buku</h5>
                        <p id="tanggal" class="mb-0"
                            style="color: #515151; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500;">
                        </p>
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
            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px; margin-bottom: 40px;">
                <form action="{{route('categorystore')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name_category" style="font-weight: 600; font-size: 14px;" class="form-label">Nama Kategori</label>
                        <input type="text" style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;" class="form-control" id="name_category" placeholder="Ketikkan nama kategori" name="name_category" required>
                    </div>
                    <button type="submit" class="btn-user" style="margin-bottom: 15px; margin-top: 15px; font-size: 13px;">
                        <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Simpan
                    </button>
                </form>
            </div>
            <div class="button-container" style="padding-left: 20px; padding-bottom: 20px; padding-top: 10px; display: flex; justify-content: flex-start;">
                <form action="{{route('exportcategories')}}" method="POST" target="__blank">
                    @csrf
                    <button type="submit" class="btn-terima" onclick="" style="font-size: 13px;">
                        <i class="fa-solid fa-download" style="margin-right: 10px;"></i> Export Excel
                    </button>
                </form>
            </div>

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($category as $c)
                      <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$c->name_category}}</td>
                        <td>
                        <form action="{{route('categorydestroy', $c->id)}}" method="post">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#update{{$c->id}}" class="btn-riwayat"  style="font-size: 13px; background-color: rgb(223, 179, 48);">
                                <i class="fa-solid fa-pen-to-square" style="margin-right: 10px;"></i> Edit
                            </button>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-riwayat" style="margin-left: 12px; font-size: 13px; background-color: rgb(198, 20, 20);">
                                <i class="fa-solid fa-trash" style="margin-right: 10px;"></i> Hapus
                            </button>
                        </form>

                        {{-- TAMPILKAN MODAL --}}
                        <div class="modal fade" id="update{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content" style="border-radius: 12px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="margin-left: 15px; font-weight: 600; color: #515151; font-size: 17px;">
                                        Update Kategori
                                    </h5>
                                </div>

                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="{{route('categoryupdate', $c->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="name_category" class="form-label" style="font-weight: 500;">Kategori</label>
                                                <input type="text" style="font-size: 14px;" class="form-control" id="name_category{{$c->id}}" name="name_category" value="{{$c->name_category}}">
                                            </div>
                                            <!-- Submit button -->
                                            <button type="submit" class="btn-user" style="font-size: 13px;">
                                                <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Update
                                            </button>
                                        </form>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @empty
                      <div class="alert alert-danger" style="color: white;">
                        <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i> Data kategori belum tersedia
                      </div>
                    </tbody>
                    @endforelse
                  </table>
            </div>

        </main>

    </body>
@endsection
