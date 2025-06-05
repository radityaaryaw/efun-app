@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show  bg-gray-200">
        <!-- Navbar -->
        @include('dashboard.admin.partials.sidebar');
        <!-- End Navbar -->

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Side Navbar -->
            @include('dashboard.penyelenggara.partials.navbar')
            <!-- End Side Navbar -->
            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px; margin-bottom: 40px;">
                <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="cover" style="font-weight: 600; font-size: 14px;" class="form-label">Cover
                            Event</label>
                        <input type="file" style="font-size: 14px; border-radius: 10px; padding: 10px; margin-top: 10px;"
                            class="form-control" id="cover" name="cover" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" style="font-weight: 600; font-size: 14px;" class="form-label">Nama
                            Event</label>
                        <input type="text"
                            style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;"
                            class="form-control" id="title" placeholder="Ketikkan nama event" name="title"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Deskripsi
                            Event</label>
                        <textarea
                            style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px; height: 150px; resize: vertical;"
                            class="form-control" id="" placeholder="Ketikkan deskripsi event disini" name="" required></textarea>
                    </div>

                    <!-- Baris Harga dan Stok Tiket -->
                    <div class="row">
                        <!-- Harga Tiket -->
                        <div class="col-md-6 mb-3">
                            <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Harga
                                Tiket</label>
                            <input type="text"
                                style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;"
                                class="form-control" id="" name="" placeholder="Ketikkan harga tiket"
                                required oninput="formatRupiah(this)">
                        </div>

                        <!-- Stok Tiket -->
                        <div class="col-md-6 mb-3">
                            <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Stok
                                Tiket</label>
                            <input type="number"
                                style="font-size: 14px; border-radius: 15px; padding: 26px; margin-top: 10px;"
                                class="form-control" id="" name=""
                                placeholder="Ketikkan jumlah stok tiket" required>
                        </div>
                    </div>

                    <!-- Baris Tanggal dan Kategori -->
                    <div class="row">
                        <!-- Tanggal Event -->
                        <div class="col-md-6 mb-3">
                            <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Tanggal
                                Event</label>
                            <input type="date"
                                style="font-size: 14px; border-radius: 15px; padding: 16px 26px; margin-top: 10px;"
                                class="form-control" id="" name="" required>
                        </div>

                        <!-- Kategori Event -->
                        <div class="col-md-6 mb-3">
                            <label for="" style="font-weight: 600; font-size: 14px;" class="form-label">Kategori
                                Event</label>
                            <select class="form-control" style="font-size: 14px; border-radius: 10px; margin-top: 10px;"
                                id="" name="">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($namecategory as $category)
                                    <option value="{{ $category->name_category }}">{{ $category->name_category }}
                                    </option>
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

                    <button type="submit" class="btn-user"
                        style="margin-bottom: 15px; margin-top: 15px; font-size: 13px;">
                        <i class="fa-solid fa-right-to-bracket" style="margin-right: 10px;"></i> Simpan
                    </button>
                </form>
            </div>

        </main>

    </body>
@endsection
