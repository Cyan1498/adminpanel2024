<div class="navbar-bg"></div>

<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            {{-- <div class="search-result">
                <div class="search-header">
                    Histories
                </div>
                <div class="search-item">
                    <a href="#">How to hack NASA using CSS</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">Kodinger.com</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">#Stisla</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-header">
                    Result
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30"
                            src="{{ asset('assets/img/products/product-3-50.png') }}" alt="product">
                        oPhone S9 Limited Edition
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30"
                            src="{{ asset('assets/img/products/product-2-50.png') }}" alt="product">
                        Drone X2 New Gen-7
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30"
                            src="{{ asset('assets/img/products/product-1-50.png') }}" alt="product">
                        Headphone Blitz
                    </a>
                </div>
                <div class="search-header">
                    Projects
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-danger text-white mr-3">
                            <i class="fas fa-code"></i>
                        </div>
                        Stisla Admin Template
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-primary text-white mr-3">
                            <i class="fas fa-laptop"></i>
                        </div>
                        Create a new Homepage Design
                    </a>
                </div>
            </div> --}}
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
            </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">
                    {{-- Bienvenido, Usuario --}}
                    @auth
                    Bienvenido, {{ auth()->user()->name }}
                    <h2>{{ auth()->user()->name }}</h2>
                    @else
                    Bienvenido, Yan
                    @endauth
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <button href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </button>
                <button href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </button>
                <button href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </button>
                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                
                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                </form> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item has-icon">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </button>
                </form>
                <div class="dropdown-divider"></div>
                {{-- <a 
                    href="{{ route('#') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i>
                Logout
                </a> --}}

            </div>
        </li>
    </ul>
</nav>
