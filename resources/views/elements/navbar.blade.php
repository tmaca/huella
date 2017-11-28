<nav class="navbar @if(Request::url() == route("landing")){{ "navbar-transparent" }}@else{{ "navbar-green" }}@endif navbar-fixed-top" id="mainNavbar" data-offset-top="100px">

    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route("landing") }}">
                {{ config("app.name") }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="nav navbar-nav">
                <li class="@if(Request::url() == route("landing")){{ "active" }}@endif">
                    <a href="@if(Request::url() == route("landing")){{ "#inicio" }}@else{{ route("landing") }}@endif">
                        Inicio
                    </a>
                </li>
                @if(Request::url() == route("landing"))
                <li>
                    <a href="#quienesSomos">
                        Quienes Somos
                    </a>
                </li>
                <li>
                    <a href="#servicios">
                        Servicios
                    </a>
                </li>
                <li>
                    <a href="#contacto">
                        Contacto
                    </a>
                </li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li class="@if(Request::url() == route("login")){{ "active" }}@endif">
                    <a href="{{ route("login") }}">
                        <i class="fa fa-sign-in"></i>
                        Login
                    </a>
                </li>
                <li class="@if(Request::url() == route("register")){{ "active" }}@endif">
                    <a href="{{ route("register") }}">
                        <i class="fa fa-user-plus"></i>
                        Registro
                    </a>
                </li>
                @else
                <li>
                    <a href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        Cerrar Sesion
                    </a>
                    <form id="logout-form" action="{{ route("logout") }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>

</nav>
