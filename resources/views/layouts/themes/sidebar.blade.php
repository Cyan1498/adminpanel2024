<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="ml-3 mt-1" style="width: 50px"> --}}
            <a href="{{ url('home') }}">healthfitness</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('dashboard') }}">General Dashboard</a></li>
                    <li><a class="nav-link" href="#">Dashboard Secundario</a></li>
                </ul>
            </li>
            <li class="menu-header">MÓDULOS</li>

            <li><a class="nav-link" href="{{ url('home') }}"><i class="far fa-square"></i> <span>Principal</span></a></li>
            <li><a class="nav-link" href="{{ url('users') }}"><i class="fas fa-user"></i> <span>Usuarios</span></a></li>
            <li><a class="nav-link" href="{{ url('units') }}"><i class="fas fa-capsules"></i> <span>Unidades</span></a></li>

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Acerca de
            </a>
        </div>
    </aside>
</div>