<nav class="navbar navbar-default">
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
                <li>
                    <a href="/login">
                        <i class="fa fa-sign-in"></i>
                        Login
                    </a>
                </li>
                <li>
                    <a href="/registro">
                        <i class="fa fa-user-plus"></i>
                        Registro
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
