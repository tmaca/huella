<nav class="navbar navbar-default navbar-fixed-top" id="mainNavbar" data-spy="affix" data-offset-top="100px">

    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                {{ config("app.name") }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/">
                        Inicio
                    </a>
                </li>
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
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li>
                    <a href="/login">
                        <i class="fa fa-sign-in"></i>
                        Login
                    </a>
                </li>
                <li>
                    <a href="/register">
                        <i class="fa fa-user-plus"></i>
                        Registro
                    </a>
                </li>
                @else
                <li>
                    <a href="http://localhost/~jesus/Authentication/public/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        Cerrar Sesion
                    </a>
                    <form id="logout-form" action="/logout" method="POST">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>