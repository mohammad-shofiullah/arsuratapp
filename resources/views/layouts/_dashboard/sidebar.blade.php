<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-1 fixed-start ms-4 "
    id="sidenav-main" data-color="primary">
    <div class="container">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 text-center" href="{{ route('dashboard.index') }}"> <span
                    class=" font-weight-bold h4" style="font-family: Georgia, serif"><u>ARSURATAPP</u></span>
                <p style="font-family: sans-serif">Arsip Surat Application</p>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ set_active('dashboard.index') }}" href="{{ route('dashboard.index') }}">
                        <divz
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </divz>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ set_active(['archives.index', '']) }}" href="{{ route('archives.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-box-2 text-success text-sm opacity-10"></i>
                        </div>
                        {{-- Pesanan --}}
                        <span class="nav-link-text ms-1">Arsip</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ set_active(['about']) }}" href="{{ route('about') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
                        </div>
                        {{-- Pesanan --}}
                        <span class="nav-link-text ms-1">About</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
