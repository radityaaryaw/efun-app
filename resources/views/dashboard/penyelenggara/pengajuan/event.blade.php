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
                      <a class="nav-link text-white " href="{{route('officerborrow')}}">

                          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="fa-solid fa-file-pen" style="color: #ffffff;"></i>
                          </div>

                          <span class="nav-link-text ms-1">Validasi Data</span>
                      </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link text-white " style="background: rgba(191, 191, 191, 0.4);">

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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Pengajuan Event</h5>
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
                <button type="button" class="btn-riwayat" onclick="addbook()" style="font-size: 13px;">
                    <i class="fa-solid fa-plus" style="margin-right: 10px;"></i> Tambah Pengajuan
                </button>
                {{-- <form action="{{route('exportbooks')}}" method="POST">
                    @csrf
                    <input name="search" value="{{request('search')}}" type="text" hidden>
                    <button type="submit" class="btn-terima" onclick="" style="font-size: 13px;">
                        <i class="fa-solid fa-download" style="margin-right: 10px;"></i> Export Excel
                    </button>
                </form> --}}
            </div>


            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                <form action="{{route('officerbook')}}" method="GET">
                    <div class="input-group">
                        <div class="form-outline" data-mdb-input-init>
                          <input type="search" value="{{ request('search') }}" style="font-size: 14px; width: 400px;" name="search" id="search" class="form-control" placeholder="Cari data pengajuan disini .." />
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
                        <th scope="col">Cover</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Tanggal Event</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Status Pengajuan</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($book as $b)
                      <tr>
                        <th>{{$loop->iteration}}</th>
                        <td class="text-center">
                            <img src="{{ $b->cover }}" class="rounded" style="width: 150px">
                        </td>
                        <td>
                            <div class="row">
                                <p style="font-size:13px; font-weight: 500">{{$b->title}}</p>
                                <p style="margin-top: -12px; font-size:13px; font-weight: 400">{{$b->author}}</p>
                            </div>
                        </td>
                        <td>{{$b->publisher}}</td>
                        <td>{{$b->year_publish}}</td>
                        <td>{{$b->categories}}</td>
                        <td>{{$b->status}}</td>
                        <td>
                        {{-- UNTUK KONDISI JIKA PENGAJUAN BELUM DISETUJUI ADMIN --}}
                        <form action="{{route('bookdestroy', $b->id)}}" method="POST">
                         <span style="font-weight: 500; color: #ff74b7;">
                            Menunggu Persetujuan!
                            @csrf
                                @method('DELETE')
                            <button type="submit" style="padding: 6px 8px; font-size: 13px; border: none; border-radius: 5px; margin-left: 10px;">
                                <i class="fa-solid fa-trash" style="color: #ff74b7;"></i>
                            </button>
                            </span>
                        </form>
                        {{-- UNTUK KONDISI JIKA PENGAJUAN SUDAH DISETUJUI ADMIN --}}
                            {{-- <span style="font-weight: 500; color: #5cadff;">
                            Pengajuan Diterima!
                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateevent{{$b->id}}" style="padding: 6px 8px; font-size: 13px; border: none; border-radius: 5px; margin-left: 10px;">
                                <i class="fas fa-user-edit" style="color: #5cadff;"></i>
                            </button>
                            </span>
                        <div class="modal fade" id="updateevent{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content" style="border-radius: 12px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="margin-left: 15px; font-weight: 600; color: #515151; font-size: 17px;">
                                        <i class="fas fa-user-edit" style="margin-right: 5px;"></i> Update Info Event
                                    </h5>
                                </div>

                                <div class="modal-body">
                                    <div class="modal-body">
                                        <form action="{{route('bookupdate', $b->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="cover" class="form-label" style="font-weight: 500;">Cover Event</label>
                                                <input type="file" style="font-size: 14px;" class="form-control" id="cover" name="cover" value="{{$b->cover}}">
                                            </div>
                                            <div class="form-group">
                                                <img src="{{asset($b->cover)}}" width="50%" height="10%" alt="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="title" class="form-label" style="font-weight: 500;">Nama Event</label>
                                                <input type="text" style="font-size: 14px;" class="form-control" id="title" name="title" value="{{$b->title}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="author" class="form-label" style="font-weight: 500;">Deskripsi Event</label>
                                                <textarea class="form-control" id="author" name="author" rows="5" style="font-size: 14px; border-radius: 15px; padding: 16px; margin-top: 10px;">{{$b->author}}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="publisher" class="form-label" style="font-weight: 500;">Tanggal Event</label>
                                                <input type="text" style="font-size: 14px;" class="form-control" id="publisher" name="publisher" value="{{$b->publisher}}">
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="publisher" class="form-label" style="font-weight: 500;">Tanggal Event</label>
                                                <input type="date" style="font-size: 14px;" class="form-control" id="publisher" name="publisher" value="{{$b->publisher}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="year_publish" class="form-label" style="font-weight: 500;">Stok Tiket</label>
                                                <input type="number" style="font-size: 14px;" class="form-control" id="year_publish" name="year_publish" value="{{$b->year_publish}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" style="font-weight: 500;" class="form-label">Harga Tiket</label>
                                                <input type="text"
                                                    style="font-size: 14px;"
                                                    class="form-control" id="" name=""required
                                                    oninput="formatRupiah(this)">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-outline">
                                                    <label class="form-label" style="font-weight: 500;">Kategori Event</label>
                                                    <select class="form-control" style="font-size: 14px; border-radius: 10px; margin-top: 10px;" id="categories" name="categories" value="{{$b->categories}}">
                                                        <option value="">-- Pilih Kategori --</option>
                                                        @foreach($namecategory as $category)
                                                            <option value="{{$category->name_category}}">{{$category->name_category}}</option>
                                                         @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                             <script>
                                                function formatRupiah(input) {
                                                    let angka = input.value.replace(/\D/g, "");
                                                    let formatted = new Intl.NumberFormat('id-ID').format(angka);
                                                    input.value = formatted;
                                                }
                                                </script>

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
                          </div> --}}
                        </td>
                      </tr>
                      @empty
                      <div class="alert alert-danger" style="color: white;">
                        <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i> Data pengajuan belum tersedia
                      </div>
                      @endforelse
                    </tbody>
                  </table>
            </div>
        </main>
        <script>

            function addbook() {
                window.location.href = '{{ route('bookcreate') }}';
            }
        </script>
    </body>
@endsection
