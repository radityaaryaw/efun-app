@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show bg-gray-200">
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
                        <a class="nav-link text-white" href="{{route('user.dash')}}">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>

                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{route('library.book')}}">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-book-open-reader" style="color: #ffffff;"></i>
                            </div>

                            <span class="nav-link-text ms-1"> Book Library</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white " href="{{route('borrowed')}}">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-book" style="color: #ffffff;"></i>
                            </div>

                            <span class="nav-link-text ms-1">Borrowed</span>
                        </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-white " style="background: rgba(191, 191, 191, 0.4);">

                          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="fa-solid fa-bookmark" style="color: #ffffff;"></i>
                          </div>

                          <span class="nav-link-text ms-1">Collection</span>
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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Koleksi Buku</h5>
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
            <div class="container-fluid py-4 mt-2" style="padding-right: 40px; padding-left: 40px;">
                <div class="row">
                    @if($collection->isEmpty())
                        <div class="col-12 text-center" style="width: 100px;">
                            <i class="fas fa-book-open" style="font-size: 48px; color: #7590a4;"></i>
                            <p class="mt-3 mb-0" style="font-weight: 600; color: #7590a4; font-size: 14px;font-family: 'Poppins', sans-serif;">Saat ini, anda belum menambahkan koleksi buku apapun.</p>
                        </div>
                    @else
                        @foreach ($collection as $collect)
                            @if($collect->user_id == Auth::user()->id)
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card" style="border-radius: 15px;">
                                        <div class="position-relative">
                                            <img class="card-img-top" src="{{ asset($collect->book->cover) }}" style="padding: 16px; border-radius: 15px; margin-bottom: -20px;">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-between" style="font-family: 'Poppins', sans-serif;">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="icon" style="font-size: 30px; margin-right: 5px;">
                                                    <i class="bx bx-book" style="position: relative; top: -6px; color:#00233D"></i>
                                                </div>
                                                <div class="ms-2 c-details">
                                                    <h6 class="mb-0" style="font-weight: 600; font-size: 13px; color:#00233D; max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$collect->book->title}}</h6>
                                                    <span style="font-size: 12px; max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$collect->book->author}} | {{$collect->book->categories}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer mt-4">
                                            <div class="row">
                                                {{-- <a href="" style="font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 600; color: #1565a2; margin-bottom: 16px;">Lihat Ulasan</a> --}}
                                                <form action="{{ route('collectdelete',$collect->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-riwayat" style="font-size: 13px; background-color: rgb(198, 20, 20); margin-left: 12px;">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            </div>
            </div>
            </div>

            </div>
        </main>
    </body>
@endsection
