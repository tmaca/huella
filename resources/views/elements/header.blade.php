<header id="inicio">
    <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item video-js" autoplay loop muted poster="https://images.unsplash.com/photo-1502219778817-93d41333bd19?dpr=1&auto=format&fit=crop&w=1000&q=80&cs=tinysrgb&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D" style="object-fit:cover;">
            <source src="assets/video/video.mp4" type="video/mp4">
            <source src="assets/video/video.webm" type="video/webm">
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
