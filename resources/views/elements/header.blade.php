<header>
    <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item video-js" autoplay loop>
            <source src="/assets/video/header.mp4" type="video/mp4">
            <source src="/assets/video/header.webm" type="video/webm">
        </video>
    </div>
    <div id="texto">

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in velit eget metus lobortis semper id vel ante.</p>
    </div>
    <div id="superpuesto">
        <div class="vertical-aligned text-center">
            @guest
            <a href="/register" class="btn btn-success btn-lg">
                <i class="fa fa-user"></i>
                Registrarse
            </a>
            @else
            <a href="/logout" class="btn btn-success btn-lg">
                <i class="fa fa-sign-out"></i>
                Cerrar Sesión
            </a>
            @endguest
        </div>
    </div>
</header>
