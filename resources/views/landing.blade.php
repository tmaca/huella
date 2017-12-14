@extends("layouts.main")

@section("title", "Inicio")

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

            <div class="card-deck mb-2">

                <div class="card bg-primary text-white">
                    <div class="card-header text-center">
                        <i class="fa fa-user-plus fa-4x"></i>
                    </div>
                    <div class="card-body text-center">
                        Registrate y verifica tu e-mail
                    </div>
                </div>
                <div class="card bg-primary text-white">
                    <div class="card-header text-center">
                        <i class="fa fa-check-square-o fa-4x"></i>
                    </div>
                    <div class="card-body text-center">
                        Completa los formularios
                    </div>
                </div>
                <div class="card bg-primary text-white">
                    <div class="card-header text-center">
                        <i class="fa fa-bar-chart fa-4x"></i>
                    </div>
                    <div class="card-body text-center">
                        Ve estadísticas de tus emisiones e históricos
                    </div>
                </div>

            </div>

            <p class="text-justify">
                Para calcular la Huella de Carbono de tu centro debes seguir los siguientes pasos, es muy sencillo. Primero <a href="{{ route("register") }}">registras</a> el centro, una vez registrada la cuenta <a href="{{ route("login") }}">inicias sesión</a> y cumplimentas los formularios, para algunos de ellos necesitarás tener las facturas a mano. Una vez finalizado se realizará el cálculo de la emisión, estos datos serán almacenados para que puedar ir realizando comparaciones de la evolución, todos estos datos serán mostrados en gráficos.
            </p>
            <p class="text-justify">
                A continuación te mostramos una simulación de la evolución de la evolución del consumo durante un año.
            </p>

            <div id="example-chart">
                <canvas width="300" height="100"></canvas>

                <script>
                var ctx = document.getElementById("example-chart").getElementsByTagName("canvas")[0].getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [
                            "Enero",
                            "Febrero",
                            "Marzo",
                            "Abril",
                            "Mayo",
                            "Junio",
                            "Julio",
                            "Agosto",
                            "Septiembre",
                            "Octubre",
                            "Noviembre",
                            "Diciembre",
                        ],
                        datasets: [{
                            data: [
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                                Math.random() *10,
                            ],
                            backgroundColor: "rgba(60, 184, 62, 0.3)",
                            borderColor: "#3cb83e",
                            borderWidth: 3,
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                            },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                }
                            }]
                        }
                    }
                });
                </script>

            </div>
        </div>
    </section>

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
