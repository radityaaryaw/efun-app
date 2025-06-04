@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show bg-gray-200">
        <!-- Navbar -->
        @include('dashboard.user.partials.sidebar')
        <!-- End Navbar -->

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Side Navbar -->
            @include('dashboard.user.partials.navbar')
            <!-- End Side Navbar -->

            <div class="container-fluid py-4 mt-2" style="padding-right: 20px; padding-left: 20px;">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="border-radius-lg pt-4 pb-6 px-3 d-flex justify-content-between align-items-start"
                        style="background: linear-gradient(90deg, hsl(210, 100%, 68%), #ff74b7); box-shadow: 5px 5px 10px #c7e8ff; border-radius: 15px;">

                        <!-- Kiri: Salam & Nama -->
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

                        <!-- Kanan: Role Admin dalam kotak -->
                        <div class="mt-2 mr-4">
                            <span class="text-white d-inline-flex align-items-center px-4 py-2"
                                style="background-color: rgba(255, 255, 255, 0.2); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 13px;">
                                <i class="fa-solid fa-image-portrait me-2"></i> User
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </main>
    </body>
@endsection
