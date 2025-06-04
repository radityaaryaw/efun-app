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
                <a class="nav-link text-white" style="background: rgba(191, 191, 191, 0.4);">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>

                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="/dashboard/penyelenggara/pembelian">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-file-pen" style="color: #ffffff;"></i>
                    </div>

                    <span class="nav-link-text ms-1">Validasi Tiket</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="event">

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
            <a class="btn bg-white w-100" href="{{ route('logout') }}" type="button"><i
                    class="fa-solid fa-arrow-right-from-bracket" style="color: #515151;"></i>
                <span class="nav-link-text ms-1"
                    style="color: #515151; font-family: 'Poppins', sans-serif; font-weight: 800; font-size: 14px;">Logout</span></a>
            <div class="caption" style="padding-bottom: 10px; padding-top: 20px;">

            </div>
        </div>
    </div>
</aside>
