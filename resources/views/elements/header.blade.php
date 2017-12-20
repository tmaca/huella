<header id="inicio">
    <div class="embed-responsive embed-responsive-16by9">
        <video class="embed-responsive-item video-js" autoplay loop muted poster="https://images.unsplash.com/photo-1502219778817-93d41333bd19?dpr=1&auto=format&fit=crop&w=1000&q=80&cs=tinysrgb&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D" style="object-fit:cover;">
            <source src="assets/video/video.mp4" type="video/mp4">
            <source src="assets/video/video.webm" type="video/webm">
        </video>
    </div>
    <div id="superpuesto">
        <div class="vertical-aligned">

            @if(Request::session()->get("postRegister"))
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function () {
                    swal("Activación de cuenta", "Se ha enviado un email de confirmación a la dirección indicada, {{ Request::session()->get("emailAddress") }}, una vez confirmado el email se activará la cuenta", "info");
                });
            </script>

            <noscript>
                <div class="alert alert-info">
                    <h4>Activación de cuenta</h4>
                    <p>
                        Se ha enviado un email de confirmación a la dirección indicada, {{ Request::session()->get("emailAddress") }}, una vez confirmado el email se activará la cuenta
                    </p>
                </div>
            </noscript>
            @endif

            @if(Request::session()->get("accountActivated"))
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function () {
                    swal("Cuenta activada", "Se ha realizado la activación de la cuenta, {{ Request::session()->get("emailAddress") }}", "success").then(function() {
                        $("#loginModal #email").val("{{ Request::session()->get("emailAddress") }}");
                        $("#loginModal").modal("show");
                    });
                });
            </script>

            <noscript>
                <div class="alert alert-success">
                    <h4>Cuenta activada</h4>
                    <p>
                        Se ha enviado un email de confirmación a la dirección indicada, {{ Request::session()->get("emailAddress") }}, una vez confirmado el email se activará la cuenta

                    </p>
                </div>
            </noscript>
            @endif

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
