<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #37517e">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">
        <div class="sidebar-brand-text mx-3">Presence App</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Sekolah
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if(auth()->check() && auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link " href="{{ route('siswa.index') }}" 
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Siswa</span>
        </a>
    </li>
    @endif
    @if(auth()->check() && auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link " href="{{ route('guru.index') }}" 
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Guru</span>
        </a>
    </li>
    @endif
    @if(auth()->check() && auth()->user()->role == 'guru' || auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link " href="{{ route('mapel.index') }}" 
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book"></i>
            <span>Mata Pelajaran</span>
        </a>
    </li>
    @endif
    @if(auth()->check() && auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link " href="{{ route('kelas.index') }}" 
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-school"></i>
            <span>Kelas</span>
        </a>
    </li>
    @endif
    @if(auth()->check() && auth()->user()->role == 'guru' || auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link " href="{{ route('jadwal.index') }}" 
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-calendar-day"></i>
            <span>Jadwal</span>
        </a>
    </li>
    @endif
    @if(auth()->check() && auth()->user()->role == 'siswa' || auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
    <li class="nav-item" >
        <a class="nav-link " href="{{ route('presensi.index') }}" 
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book"></i>
            <span>Presensi</span>
        </a>
        
    </li>
    @endif

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn" type="button" style="background-color: #37517e">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
                        <img class="img-profile rounded-circle"
                            src="{{ asset('assets-dash/img/undraw_profile.svg') }}">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        
                        @if(auth()->check() && auth()->user()->role == 'guru')
                        <a class="dropdown-item" href="{{ route('guru.edit',Auth::user()->id) }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        @endif
                        @if(auth()->check() && auth()->user()->role == 'siswa')
                        <a class="dropdown-item" href="{{ route('siswa.edit',Auth::user()->id) }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        @endif
                        @if(auth()->check() && auth()->user()->role == 'admin')                        
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                         {{ __('Logout') }}
                        </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                        {{-- <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a> --}}
                    </div>
                </li>

            </ul>

        </nav>
        
        <!-- End of Topbar -->