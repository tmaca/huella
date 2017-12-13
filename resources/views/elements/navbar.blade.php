<nav class="navbar navbar-expand-lg fixed-top navbar-dark @if(Request::url() == route("landing")){{ "bg-primary-alpha" }}@else{{ "bg-primary" }}@endif" id="mainNavbar">

    <a class="navbar-brand" href="{{ route("landing") }}">{{ config("app.name") }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav mr-auto">
                @if(Request::url() == route("landing"))
                <li id="initial" class="nav-item">
                    <a class="nav-link" href="@if(Request::url() == route("landing")){{ "#inicio" }}@else{{ route("landing") }}@endif">
                        Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#queEs">
                        Que es la Huella de Carbono
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#comoFunciona">
                        Como funciona
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">
                        Contacto
                    </a>
                </li>
                @endif
            </ul>

            <ul class="navbar-nav navbar-right">
                @guest
                <li class="nav-item @if(Request::url() == route("login")){{ "active" }}@endif">
                    <a class="nav-link" data-toggle="modal" data-target="#loginModal">
                        <i class="fa fa-sign-in"></i>
                        Login
                    </a>
                </li>
                <li class="nav-item @if(Request::url() == route("register")){{ "active" }}@endif">
                    <a class="nav-link" data-toggle="modal" data-target="#registerModal">
                        <i class="fa fa-user-plus"></i>
                        Registro
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        Cerrar Sesion
                    </a>
                    <form id="logout-form" action="{{ route("logout") }}" method="POST" style="display:none">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>

</nav>
