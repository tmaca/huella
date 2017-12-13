<header id="inicio">
    <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item video-js" autoplay loop muted>
            <source src="assets/video/video.mp4" type="video/mp4">
            <!--<source src="assets/video/header.webm" type="video/webm">
            <source src="assets/video/header.mp4" type="video/mp4">-->
        </video>
    </div>
    <div id="superpuesto">
        <div class="vertical-aligned">
            <div>
                <h2>
                    Descubre más sobre la Huella de Carbono
                </h2>
                @guest
                <a data-toggle="modal" data-target="#registerModal" class="btn btn-primary btn-lg">
                    <i class="fa fa-user"></i>
                    Registrarse
                </a>
                @else
                <a href="logout" class="btn btn-primary btn-lg">
                    <i class="fa fa-sign-out"></i>
                    Cerrar Sesión
                </a>
                @endguest
            </div>
        </div>
    </div>
</header>
