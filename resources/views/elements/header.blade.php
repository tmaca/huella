<header id="inicio">
    <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item video-js" autoplay loop muted>
            <source src="assets/video/header.mp4" type="video/mp4">
            <source src="assets/video/header.webm" type="video/webm">
        </video>
    </div>
    <div id="superpuesto">
        <div class="vertical-aligned">
            <div class="well well-lg">
                <h2>
                    Descubre más sobre la Huella de Carbono
                </h2>
                @guest
                <a href="register" class="btn btn-success btn-lg">
                    <i class="fa fa-user"></i>
                    Registrarse
                </a>
                @else
                <a href="logout" class="btn btn-success btn-lg">
                    <i class="fa fa-sign-out"></i>
                    Cerrar Sesión
                </a>
                @endguest
            </div>
        </div>
    </div>
</header>
