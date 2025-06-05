<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main"
    style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
           font-family: 'Poppins', sans-serif; box-shadow: 0 8px 24px rgba(37,117,252,0.4);">

    <div class="sidenav-header position-relative px-4 py-3">
        <i class="fas fa-times cursor-pointer text-white opacity-50 position-absolute end-3 top-3 d-xl-none"
            id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#">
            <img src="{{ asset('img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo"
                style="max-height: 48px;">
        </a>
    </div>

    <hr class="horizontal light opacity-50 my-3">

    <div class="collapse navbar-collapse w-auto px-3" id="sidenav-collapse-main"
        style="max-height: 85vh;   overflow-y: auto;">
        <ul class="navbar-nav">

            {{-- Dashboard --}}
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center gap-3
            {{ Request::routeIs('admin.dash') ? 'active' : '' }}"
                    href="{{ route('admin.dash') }}">
                    <i class="material-icons opacity-90 fs-5">dashboard</i>
                    <span class="nav-link-text fw-medium fs-6">Dashboard</span>
                </a>
            </li>

            {{-- Pengguna --}}
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center gap-3
            {{ Request::routeIs('admin.user.*') ? 'active' : '' }}"
                    href="{{ route('admin.user.index') }}">
                    <i class="fa-solid fa-user-group opacity-90 fs-5"></i>
                    <span class="nav-link-text fw-medium fs-6">Pengguna</span>
                </a>
            </li>

            {{-- Kategori Event --}}
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center gap-3
            {{ Request::routeIs('admin.category.*') ? 'active' : '' }}"
                    href="{{ route('admin.category.index') }}">
                    <i class="fa-solid fa-bookmark opacity-90 fs-5"></i>
                    <span class="nav-link-text fw-medium fs-6">Kategori Event</span>
                </a>
            </li>

            {{-- Data Event --}}
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center gap-3
            {{ Request::routeIs('admin.event.*') ? 'active' : '' }}"
                    href="{{ route('admin.event.index') }}">
                    <i class="fa-solid fa-calendar-days opacity-90 fs-5"></i>
                    <span class="nav-link-text fw-medium fs-6">Data Event</span>
                </a>
            </li>

            {{-- Laporan Event --}}
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center gap-3
            {{ Request::routeIs('admin.tiket.*') ? 'active' : '' }}"
                    href="{{ route('admin.tiket.index') }}">
                    <i class="fa-solid fa-file-lines opacity-90 fs-5"></i>
                    <span class="nav-link-text fw-medium fs-6">Laporan Event</span>
                </a>
            </li>

        </ul>

    </div>

    {{-- Footer Logout --}}
    <div class="sidenav-footer position-absolute w-100 bottom-0 px-4 pb-4">
        <a class="btn btn-light w-100 d-flex align-items-center justify-content-center gap-2 fw-semibold"
            href="{{ route('logout') }}" type="button" style="font-size: 15px; color: #252525;">
            <i class="fa-solid fa-arrow-right-from-bracket fs-5"></i>
            Logout
        </a>
    </div>

    <style>
        /* Reset nav-link */
        #sidenav-main .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 12px 20px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        /* Hover efek */
        #sidenav-main .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff !important;
        }

        #sidenav-main .nav-link:hover i {
            color: #fff !important;
        }

        /* Active menu */
        #sidenav-main .nav-link.active {
            background-color: #f093fb;
            color: #4a148c !important;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.6);
        }

        #sidenav-main .nav-link.active i {
            color: #4a148c !important;
        }

        /* Icons style */
        #sidenav-main .nav-link i {
            color: rgba(255, 255, 255, 0.7);
            transition: color 0.3s ease;
        }

        /* Scrollbar */
        #sidenav-main .navbar-collapse::-webkit-scrollbar {
            width: 6px;
        }

        #sidenav-main .navbar-collapse::-webkit-scrollbar-track {
            background: transparent;
        }

        #sidenav-main .navbar-collapse::-webkit-scrollbar-thumb {
            background-color: rgba(240, 147, 251, 0.5);
            border-radius: 3px;
        }
    </style>

</aside>
