@extends("layouts.userHome")

@section("title", "Inicio")

@section("userContent")

    <div class="container">
        <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
            @foreach($studies as $study)
            <li class="nav-item">
                <a class="nav-link" id="study-{{ $study->year }}-tab" data-toggle="tab" href="#study-{{ $study->year }}">
                    @if(!$study->carbon_footprint)
                    <i class="fa fa-exclamation-triangle text-warning" title="Huella no calculada"></i>
                    @endif
                    {{ $study->year }}
                </a>
            </li>
            @endforeach

            <li class="nav-item">
                <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact">
                    <i class="fa fa-plus"></i>
                    Crear nuevo
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            @foreach($studies as $study)
            <div class="tab-pane fade" id="study-{{ $study->year }}">

                @if(!$study->carbon_footprint)
                <div class="alert alert-warning">
                    <i class="fa fa-exclamation-triangle"></i>
                    <strong>¡Atención!</strong> no se ha realizado aún el calculo de la huella. Finalize la compleción de los datos y pulse sobre el botón "calcular huella de carbono". Una vez calculada la huella no podrá editar los campos.
                </div>
                @else
                Valor de la huella: {{ $study->carbon_footprint }}
                @endif

                @include("forms.user.alcances", ["study" => $study])
            </div>
            @endforeach

            <div class="tab-pane fade show active" id="contact">
                @include("forms.user.alcances", ["study" => new App\Models\Study])
            </div>
        </div>

    </div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            for (let form of document.getElementsByName('submit')) {
                form.addEventListener("click", formSubmit, true);
            }
        });

        function formSubmit(e) {
            if (this.value == "calculateStudy" && e.isTrusted) {
                let btn = this;
                e.stopPropagation();
                e.preventDefault();

                swal({
                    "title": "Confirmación de calculo",
                    "text": "Una vez realizado el calculo no podrás realizar cambios, ¿estás seguro?",
                    "icon": "info",
                    buttons: {
                        "cancel": "Cancelar",
                        "confirm": "Continuar con el calculo",
                    }

                }).then(function (isConfirm) {
                    if (isConfirm) {
                        btn.click();
                    }
                });
            }
        }
    </script>

@endsection
