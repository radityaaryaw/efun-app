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
                        <a class="nav-link text-white " style="background: rgba(191, 191, 191, 0.4);">

                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-book" style="color: #ffffff;"></i>
                            </div>

                            <span class="nav-link-text ms-1">Borrowed</span>
                        </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-white " href="{{route('collection')}}">

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
                            style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Review Buku</h5>
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
            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px; margin-bottom: 40px;">
                <div class="row">
                    <!-- Container 1 untuk data lengkap buku -->
                    <div class="col-md-5">
                        <img class="card-img-top" src="{{ asset($book->cover) }}" style="padding: 16px; border-radius: 15px; margin-bottom: -20px;">
                        <div style="margin-top: 30px; padding: 20px; border-radius: 15px; background-color: #aac1d1;">
                            <h6 style="font-size: 15px; font-weight: 600; margin-bottom: 20px;">INFORMASI BUKU</h6>
                            <h6 style="font-size: 14px;">Judul : {{$book->title}}</h6>
                            <h6 style="font-size: 14px;">Penulis : {{$book->author}}</h6>
                            <h6 style="font-size: 14px;">Kategori : {{$book->categories}}</h6>
                            <h6 style="font-size: 14px;">Penerbit : {{$book->publisher}}</h6>
                            <h6 style="font-size: 14px;">Tahun Terbit : {{$book->year_publish}}</h6>
                            <!-- Tambahkan elemen lainnya sesuai kebutuhan -->
                        </div>
                    </div>


                    <!-- Container 2 untuk data komentar buku -->

                    <div class="col-md-7">
                        @if ($hasBorrowedAndReturned)
                            <form action="{{ route('reviewbook') }}" method="post" onsubmit="return validateForm()">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="mb-3">
                                    <label for="review" style="font-weight: 600; font-size: 14px;" class="form-label">Ulasan Buku</label>
                                    <input type="text" style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;" class="form-control" id="review" placeholder="Ketikkan ulasan buku" name="review" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rating" style="font-weight: 600; font-size: 14px;" class="form-label">Rating</label>
                                    <select class="form-select" style="font-size: 14px; border-radius: 15px; padding: 10px; margin-top: 10px;" aria-label="Default select example" name="rating" id="rating" required>
                                        <option selected disabled>Pilih rating</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn-user" style="margin-bottom: 15px; margin-top: 15px; font-size: 13px;">
                                    <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Simpan
                                </button>
                            </form>
                        {{-- @elseif ($hasBorrowedAndReturned && !$review->isEmpty())
                        <div class="alert alert-success" style="color: white; padding-top: 20px;">
                            <i class="fa-solid fa-book-bookmark" style="margin-right: 10px;"></i> Terimakasih telah mereview buku ini.
                          </div> --}}
                        @endif

                        @foreach ($review as $item)
                            <div style="margin-top: 30px; padding: 20px; border-radius: 15px; background-color: #f9f9f9;">
                                <h6 style="font-size: 15px; font-weight: 600;">{{$item->users->name}}</h6>
                                <h6 style="font-size: 13px;">{{$item->review}}</h6>
                                @for ($i = 0; $i < $item->rating; $i++)
                                    <span style="font-size: 27px; color: gold;">&#9733;</span> <!-- Karakter Unicode untuk bintang hitam -->
                                @endfor
                                <!-- Tambahkan elemen lainnya sesuai kebutuhan -->
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>


        </main>

    </body>
@endsection
