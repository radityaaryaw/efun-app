<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-3 px-3">
        <nav aria-label="breadcrumb">
            <h5 class="font-weight-bolder mb-0"
                style="font-family: 'Poppins', sans-serif; color: #515151; font-weight:bold;">Dashboard
                Penyelenggara</h5>
        </nav>
        <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-body px-0">
                    <span style="display: none; font-family: 'Poppins', sans-serif; color: #515151; font-weight: 600;"
                        class="d-sm-inline d-none">Hai, {{ Auth::user()->name }} &ensp;</span>
                    <i class="fa fa-user me-sm-1" style="color: #515151;"></i>
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>
