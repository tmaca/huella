@extends("layouts.main")

@section("title", config("app.name"))

@section("content")

    <section class="container-fluid row mx-0" id="queEs">
        <div class="container align-self-center">
            <h1>¿Qué es la huella de carbono?</h1>
            <hr>
            <div class="row align-items-center">

                <img src="{{ url("assets/img/huella.png") }}" class="offset-4 col-4 offset-sm-0 order-2 order-sm-1" alt="Huella de pie verde creado con bombillas, simbolo de reciclaje y otras imagenes que fomentan el ecologismo.">

                <div class="col-12 col-sm-8 order-1 order-sm-2 text-justify">
                    <p>
                        El cambio climático, provocado por la emisión de Gases de Efecto Invernadero y en especial del CO<sup>2</sup>, es uno de los mayores probleas de nuestro tiempo y existen evidencias considerables de que la mayor parte del calentamiento global ha sido causado por las actividades humanas. Hoy día, casi todas las actividades que realizamos y bienes que poseemos y utilizamos implican <strong>consumir energía</strong>, lo que significa <strong>contribuir a las emisiones a la atmósfera</strong>. La <strong>Huella de Carbono</strong> se conoce como la totalidad de gases de efecto invernadero, también conocidos como GEI, emitidos por efecto directo (por el centro/organización) o indirecto (emitidos por terceros).
                    </p>
                    <p class="d-none d-sm-block">
                        Bajo este prisma, la Huella de Carbono, representa una medida para la contribución de las organizaciones a ser entidades socialmente responsables y un elemento más de concienciación para la asunción entre los ciudadanos de prácticas más sostenibles. Con esta iniciativa se pretende cuantificar la cantidad de emisiones de GEI, medidas en emisiones de CO2 equivalente, que son liberadas a la atmósfera debido a nuestras actividades cotidianas o a la comercialización de un producto. Este análisis abarca todas las actividades de su ciclo de vida (desde la adquisición de las materias primas hasta su gestión como residuo) permitiendo a los consumidores decidir qué alimentos comprar en base a la contaminación generada como resultado de los procesos por los que ha pasado.
                    </p>
                </div>

                <p class="d-block d-sm-none col-sm-8 order-3 text-justify">
                    Bajo este prisma, la Huella de Carbono, representa una medida para la contribución de las organizaciones a ser entidades socialmente responsables y un elemento más de concienciación para la asunción entre los ciudadanos de prácticas más sostenibles. Con esta iniciativa se pretende cuantificar la cantidad de emisiones de GEI, medidas en emisiones de CO2 equivalente, que son liberadas a la atmósfera debido a nuestras actividades cotidianas o a la comercialización de un producto. Este análisis abarca todas las actividades de su ciclo de vida (desde la adquisición de las materias primas hasta su gestión como residuo) permitiendo a los consumidores decidir qué alimentos comprar en base a la contaminación generada como resultado de los procesos por los que ha pasado.
                </p>

            </div>
        </div>
    </section>

    <section class="container-fluid row mx-0" id="comoFunciona">
        <div class="container align-self-center">
            <h1>Como funciona</h1>
            <hr>

            <p class="text-justify">
                Nunca había sido tan fácil realizar el calculo de la huella de carbono, una vez activada tu cuenta sigue los siguientes pasos.
            </p>

            <div class="card-deck mb-2">

                <div class="card bg-primary text-white">
                    <div class="card-header text-center">
                        <i class="fa fa-building-o fa-4x"></i>
                    </div>
                    <div class="card-body text-center">
                        Para comenzar has de registrar el edificio, símplemente indica un nombre y la dirección del mismo.
                    </div>
                </div>
                <div class="card bg-primary text-white">
                    <div class="card-header text-center">
                        <i class="fa fa-database fa-4x"></i>
                    </div>
                    <div class="card-body text-center">
                        Una vez hayas terminados con la inserción de los edificios inserta los datos requeridos. Es posible que necesites tener las facturas a mano para poder completar de forma precisa los datos.
                    </div>
                </div>
                <div class="card bg-primary text-white">
                    <div class="card-header text-center">
                        <i class="fa fa-bar-chart fa-4x"></i>
                    </div>
                    <div class="card-body text-center">
                        Tras varias inserciones tendrás a tu disposición gráficos con opción de realizar comparativas respecto a valores de otros años.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid row px-0 mx-0" id="centrosInvolucrados">
        <div class="container align-self-center">
            <h1>Centros involucrados</h1>
            <hr>
            <p>A continuación puedes ver los centros que ya utilizan la aplicación para realizar un seguimiento de la huella de carbono</p>
            <ul class="buildings list-unstyled"></ul>
        </div>
        <div class="container-fluid px-0 mx-0" id="map">
            <noscript>
                <div class="container">
                    <div class="alert alert-warning">
                        <i class="fa fa-exclamation-triangle"></i>
                        <strong>¡Atención!</strong>, parece ser que tienes javascript deshabilitado en tu navegador. Esto está impidiendo la carga del mapa, considera activarlo para poder disfrutar de mayor contenido y fluidez en la web.
                    </div>
                </div>
            </noscript>
        </div>
    </section>

    <script src="{{ asset("assets/js/landingMap.js")}}" charset="utf-8" defer></script>
    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        createMap();
        createMarkers(buildings);
    });

    let buildings = [
        @foreach(App\Models\Building::all() as $building)
        @if ($building->user->publicViewable && $building->latitude && $building->longitude)
        {
            "type": "building",
            "properties": {
                "name": "{{ $building->name }}",
                "description": "<p>{{ $building->description }}</p>",
            },
            "geometry": {
                "type": "Point",
                "coordinates": [{{ $building->longitude }}, {{ $building->latitude}}],
                "longitude": {{ $building->longitude }},
                "latitude": {{ $building->latitude }}
            }
        },
        @endif
        @endforeach
        ];
    </script>

    <section class="container-fluid row mx-0" id="contacto">
        <div class="container align-self-center">
            <div class="row">
                <div class="col-md-12">

                    <h1>Contacto</h1>
                    <hr>
                    @include("forms.guest.contacto")

                </div>
            </div>
        </div>
    </section>

@endsection
