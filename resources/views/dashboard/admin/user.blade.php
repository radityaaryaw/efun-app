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
                        <a class="nav-link text-white" href="{{route('admin.dash')}}">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>

                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " style="background: rgba(191, 191, 191, 0.4);">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user-group" style="color: #ffffff;"></i>
                            </div>

                            <span class="nav-link-text ms-1"> Pengguna</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{route('category.index')}}">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bookmark" style="color: #ffffff;"></i>
                            </div>

                            <span class="nav-link-text ms-1"> Kategori Event</span>
                        </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-white " href="{{route('lending')}}">

                          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-ticket" style="color: #ffffff;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Event</span>
                      </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('book.index')}}">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-file-signature" style="color: #ffffff;"></i>
                        </div>

                        <span class="nav-link-text ms-1">Pengajuan Event</span>
                    </a>
                </li>
                </ul>
            </div>
            <div class="sidenav-footer position-absolute w-100 bottom-0 ">
                <div class="mx-3">
                    <a class="btn bg-white w-100" href="{{route('logout')}}" type="button"><i
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
            <div class="button-container" style="padding-bottom: 20px; padding-top: 10px; display: flex; justify-content: space-between; padding-right: 30px;">
                <button type="button" class="btn-riwayat" onclick="adduser()" style="font-size: 13px;">
                    <i class="fa-solid fa-plus" style="margin-right: 10px;"></i> Tambah Pengguna
                </button>
                {{-- <form action="{{route('exportuser')}}" method="POST">
                    @csrf
                    <input name="search" value="{{request('search')}}" type="text" hidden>
                    <button type="submit" class="btn-terima" onclick="" style="font-size: 13px;">
                        <i class="fa-solid fa-download" style="margin-right: 10px;"></i> Export Excel
                    </button>
                </form> --}}
            </div>

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <form action="{{route('user.index')}}" method="GET">
                    <div class="input-group">
                        <div class="form-outline" data-mdb-input-init>
                          <input type="search" value="{{ request('search') }}" style="font-size: 14px; width: 400px;" name="search" id="search" class="form-control" placeholder="Cari data pengguna disini .." />
                        </div>
                        <button type="button" class="btn" style="background-color:#acacac; color: #fff; font-size: 15px;" data-mdb-ripple-init>
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
                        @foreach ($user as $s)
                      <tr>
                        <th>{{$loop->iteration}}</th>
                        <td style="max-width: 130px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$s->name}}</td>
                        <td>{{$s->username}}</td>
                        <td style="max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$s->email}}</td>
                        <td style="max-width: 160px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$s->address}}</td>
                        <td>{{$s->role}}</td>
                        <td>
                        <form action="{{route('user.destroy', $s->id)}}" method="POST">
                            <div class="column">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateuser{{$s->id}}"
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
                        <div class="modal fade" id="updateuser{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content" style="border-radius: 12px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="margin-left: 15px; font-weight: 600; color: #515151; font-size: 17px;">
                                        <i class="fas fa-user-edit" style="margin-right: 5px;"></i> Update Pengguna
                                    </h5>
                                </div>

                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="{{route('user.update', $s->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="name" class="form-label" style="font-weight: 500;">Nama Lengkap</label>
                                                <input type="text" style="font-size: 14px;" class="form-control" id="name{{$s->id}}" name="name" value="{{$s->name}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label" style="font-weight: 500;">Username</label>
                                                <input type="text" style="font-size: 14px;" class="form-control" id="username{{$s->id}}" name="username" value="{{$s->username}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label" style="font-weight: 500;">Email</label>
                                                <input type="email" style="font-size: 14px;" class="form-control" id="email{{$s->id}}" name="email" value="{{$s->email}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label" style="font-weight: 500;">Password</label>
                                                <input type="password" style="font-size: 14px;" class="form-control" id="password{{$s->id}}" name="password" placeholder="Ketikkan password">
                                            </div>
                                            {{-- INI NANTI JANGAN DIPAKE --}}
                                            <div class="mb-3">
                                                <label for="address" class="form-label" style="font-weight: 500;">Jenis Kelamin</label>
                                                <input type="text" style="font-size: 14px;" class="form-control" id="address{{$s->id}}" name="address" value="{{$s->address}}">
                                            </div>
                                            {{-- YANG ASLI PAKE YG INI --}}
                                            {{-- <div class="mb-3">
                                            <label for="address{{$s->id}}" class="form-label" style="font-weight: 500;">Jenis Kelamin</label>
                                                <div style="font-size: 14px;">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="address{{$s->id}}" id="laki{{$s->id}}" value="Laki-laki"
                                                            {{ $s->address === 'Laki-laki' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="laki{{$s->id}}">Laki-laki</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="address{{$s->id}}" id="perempuan{{$s->id}}" value="Perempuan"
                                                            {{ $s->address === 'Perempuan' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="perempuan{{$s->id}}">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="mb-3">
                                                <div class="form-outline">
                                                    <label class="form-label" style="font-weight: 600; font-size: 14px;" for="role">Role</label>
                                                    <select class="form-control" style="font-size: 14px; border-radius: 10px; margin-top: 10px;" id="role{{$s->id}}" name="role" value="{{$s->role}}">
                                                        <option value="">-- Pilih Role --</option>
                                                        <option value="User">User</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Officer">Penyelanggara</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Submit button -->
                                            <button type="submit" class="btn-user">
                                                <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Update
                                            </button>
                                        </form>
                                      </div>
                                    </div>
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
            </div>
            </div>
            </div>
            </div>

            </div>
        </main>
        <script>
            function adduser() {
                window.location.href = '{{ route('user.create') }}';
            }
        </script>
    </body>
@endsection
