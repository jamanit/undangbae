<div class="navbar-bg bg-primary"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <ul class="navbar-nav mr-3 mr-auto">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('/') }}assets/stisla/dist/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->nick_name }} ({{ Auth::user()->role->role_name }})</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ url('profiles') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>