@extends('layouts.admin')
@section('content')

    <body class="g-sidenav-show bg-gray-200">
        <!-- Navbar -->
         @include('dashboard.admin.partials.sidebar')
        <!-- End Navbar -->

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Side Navbar -->
             @include('dashboard.admin.partials.navbar')
            <!-- End Side Navbar -->

            <div class="table-container" style="font-family: 'Poppins', sans-serif; font-size: 13px; margin-bottom: 40px;">
                <form action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div style="display: flex; gap: 20px; align-items: flex-start;">
                        <div style="flex: 1;">
                            <label for="nama_kategori" style="font-weight: 500; font-size: 14px; color:#515151;"
                                class="form-label">Kategori</label>
                            <input type="text"
                                style="font-size: 14px; padding: 18px; border-radius: 10px; margin-top: 10px; color:#868686;"
                                class="form-control" id="nama_kategori" placeholder="Ketikkan kategori"
                                name="nama_kategori" required>
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
