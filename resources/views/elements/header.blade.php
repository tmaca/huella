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

            @if(Request::session()->get("emailVerified") === false)
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function () {
                    swal("Cuenta pendiente de activación", "Te ha sido enviado un email para confirmar la cuenta, no podrás iniciar sesión hasta que esta quede activada", "error").then(function() {
                        $("#loginModal #email").val("{{ Request::session()->get("emailAddress") }}");
                        $("#loginModal").modal("show");
                    });
                });
            </script>

            <noscript>
                <div class="alert alert-danger">
                    <h4>Cuenta pendiente de activación</h4>
                    <p>
                        Te ha sido enviado un email para confirmar la cuenta, no podrás iniciar sesión hasta que esta quede activada

                    </p>
                </div>
            </noscript>
            @endif

            <div class="titleContainer">
                <h2 class="headerText text-uppercase" data-target-resolver>
                    Huella de Carbono
                </h2>
            </div>
                <i class="fa fa-chevron-down fa-3x botonHeader whiteScroll" aria-hidden="true"></i>

        </div>
    </div>
</header>

<script>
    const resolver = {
        resolve: function resolve(options, callback) {
            // The string to resolve
            const resolveString = options.resolveString || options.element.getAttribute('data-target-resolver');
            const combinedOptions = Object.assign({}, options, {resolveString: resolveString});

            function getRandomInteger(min, max) {
              return Math.floor(Math.random() * (max - min + 1)) + min;
            };

            function randomCharacter(characters) {
              return characters[getRandomInteger(0, characters.length - 1)];
            };

            function doRandomiserEffect(options, callback) {
              const characters = options.characters;
              const timeout = options.timeout;
              const element = options.element;
              const partialString = options.partialString;

              let iterations = options.iterations;

              setTimeout(() => {
                if (iterations >= 0) {
                  const nextOptions = Object.assign({}, options, {iterations: iterations - 1});

                  // Ensures partialString without the random character as the final state.
                  if (iterations === 0) {
                    element.textContent = partialString;
                  } else {
                    // Replaces the last character of partialString with a random character
                    element.textContent = partialString.substring(0, partialString.length - 1) + randomCharacter(characters);
                  }

                  doRandomiserEffect(nextOptions, callback)
                } else if (typeof callback === "function") {
                  callback();
                }
              }, options.timeout);
            };

            function doResolverEffect(options, callback) {
              const resolveString = options.resolveString;
              const characters = options.characters;
              const offset = options.offset;
              const partialString = resolveString.substring(0, offset);
              const combinedOptions = Object.assign({}, options, {partialString: partialString});

              doRandomiserEffect(combinedOptions, () => {
                const nextOptions = Object.assign({}, options, {offset: offset + 1});

                if (offset <= resolveString.length) {
                  doResolverEffect(nextOptions, callback);
                } else if (typeof callback === "function") {
                  callback();
                }
              });
            };

            doResolverEffect(combinedOptions, callback);
        }
    }

    /* Some GLaDOS quotes from Portal 2 chapter 9: The Part Where He Kills You
    * Source: http://theportalwiki.com/wiki/GLaDOS_voice_lines#Chapter_9:_The_Part_Where_He_Kills_You
    */
    const strings = [
    'Huella de Carbono'
    ];

    let counter = 0;

    const options = {
    // Initial position
    offset: 0,
    // Timeout between each random character
    timeout: 25,
    // Number of random characters to show
    iterations: 10,
    // Random characters to pick from
    characters: ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'y', 'x', '#', '%', '&', '-', '+', '_', '?', '/', '\\', '='],
    // String to resolve
    resolveString: strings[counter],
    // The element
    element: document.querySelector('[data-target-resolver]')
    }

    // Callback function when resolve completes
    function callback() {
        setTimeout(() => {
            counter ++;

            if (counter >= strings.length) {
              counter = 0;
            }

            let nextOptions = Object.assign({}, options, {resolveString: strings[counter]});
            resolver.resolve(nextOptions, callback);
        }, 30000);
    }

    resolver.resolve(options, callback);
</script>
