<div class="container-fluid bg-dark text-light px-0 py-2">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <span class="fa fa-phone-alt me-2"></span>
                <span>2352-9073</span>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <span class="far fa-envelope me-2"></span>
                <span>asociacioncayaguanca@hotmail.com</span>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center mx-n2 text-end">
                <span>Síguenos:</span>
                <a class="btn btn-link text-light" href="https://www.facebook.com/Asociacion.Cayaguanca" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-link text-light" href="https://twitter.com/cdmypecayaguanc" target="_blank"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('Perfil') }}" class="btn btn-link text-light fw-bold">
                            {{ Auth::user()->name }}
                        </a>
                        <a class="btn btn-link text-light fw-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link text-light fw-bold">Iniciar Sesión</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</div>

<nav x-data="{ open: false }" class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <x-responsive-nav-link class="navbar-brand d-flex align-items-center px-4 px-lg-5" href="{{ route('index') }}" :active="request()->routeIs('dashboard')">
        <img src="{{ asset('img/cayaguanca.png') }}" alt="..." height="90">
        <h1 class="m-0">INICIO</h1>
    </x-responsive-nav-link>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('index') }}" class="nav-item nav-link active">Inicio</a>
            <a href="{{ route('Contactanos') }}" class="nav-item nav-link">Contáctanos</a>
            <a href="{{ route('AcercaDeNosotros') }}" class="nav-item nav-link">Sobre Nosotros</a>
            @if (Route::has('login'))
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Administración</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="{{ route('ListaUsuarios') }}" class="dropdown-item">Usuarios</a>
                            <a href="{{ route('ListaProyectos') }}" class="dropdown-item">Proyectos</a>
                            <a href="{{ route('ListaEventos') }}" class="dropdown-item">Eventos</a>
                            <a href="{{ route('ListaDonantes') }}" class="dropdown-item">Donantes</a>
                            <a href="{{ route('ListaMunicipios') }}" class="dropdown-item">Municipios</a>
                            <a href="{{ route('ListaSuscriptores') }}" class="dropdown-item">Suscriptores</a>
                            <a href="{{ route('ListaGaleria') }}" class="dropdown-item">Galería</a>
                        </div>
                    </div>
                @endauth
            @endif
        </div>
        <a href="{{ route('ListaProyTerminados') }}" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Proyectos<i
            class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
