<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold mb-3" href="/petugas">
                            <i class="fas fa-home text-default"></i>
                            <span class="nav-link-text">Beranda</span>
                        </a>
                        <hr class="mt--1">
                    </li>
                    <li class="nav-item mt--4">
                        <a class="nav-link" disabled>
                            <h6 class="nav-link-text text-gray">PETUGAS</h6>
                        </a>
                    </li>
                    <li class="nav-item mt--2">
                        <a class="nav-link" href="/petugas/pengaduan">
                            <i class="fas fa-book text-primary"></i>
                            <span class="nav-link-text">Data Pengaduan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-3" href="/petugas/masyarakat">
                            <i class="ni ni-single-02 text-danger"></i>
                            <span class="nav-link-text">Data Masyarakat</span>
                        </a>
                        <hr class="mt--1">
                    </li>
                    <li class="nav-item mt--4">
                        <a class="nav-link" DISABLED>
                            <h6 class="nav-link-text text-gray">PENGATURAN</h6>
                        </a>
                    </li>
                    <li class="nav-item mt--2">
                        <a class="nav-link" href="/petugas/profile">
                            <i class="fas fa-user-cog text-success"></i>
                            <span class="nav-link-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#petugas-logout">
                            <i class="ni ni-user-run text-gray-800"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </li>
                </ul>
</nav>

