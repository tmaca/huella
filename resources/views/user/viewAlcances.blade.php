@extends("layouts.userHome")

@section("title", "Inicio")

@section("userContent")

    <div class="container">
        <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
            @if(count($studies) > 0)
                @foreach($studies as $study)
                <li class="nav-item">
                    <a class="nav-link{{ ($errors->first("inputYear") == $study->year || Session::get("showYear") == $study->year) ? " active" : "" }}" id="study-{{ $study->year }}-tab" data-toggle="tab" href="#study-{{ $study->year }}">
                        @if($study->carbon_footprint)
                        <i class="fa fa-paw" title="Huella calculada"></i>
                        @else
                        <i class="fa fa-exclamation-triangle text-warning" title="Huella no calculada"></i>
                        @endif
                        {{ $study->year }}
                    </a>
                </li>
                @endforeach
            @endif
        </ul>
        <div class="tab-content" id="myTabContent">
            @if(count($studies) > 0)
                @foreach($studies as $study)
                <div class="tab-pane fade{{ ($errors->first("inputYear") == $study->year || Session::get("showYear") == $study->year) ? " show active" : "" }}" id="study-{{ $study->year }}">

                    @if(!$study->carbon_footprint)
                    <div class="alert alert-warning">
                        <i class="fa fa-exclamation-triangle"></i>
                        <strong>¡Atención!</strong> no se ha realizado aún el calculo de la huella. Finalize la compleción de los datos y pulse sobre el botón "calcular huella de carbono". Una vez calculada la huella no podrá editar los campos.
                    </div>
                    @else
                    <div class="alert alert-info">
                        <strong><i class="fa fa-paw"></i></strong> Valor de la huella, {{ $study->carbon_footprint }}
                    </div>
                    @endif

                    @include("forms.user.alcances", ["study" => $study])
                </div>
                @endforeach
            @endif
        </div>

    </div>
    <script src="{{ asset("assets/js/user/studies.js") }}" defer></script>
    <script type="text/javascript">
        $(function () {
            $("#myTab .nav-item .nav-link").last().addClass("show active");
            $("#myTabContent .tab-pane").last().addClass("show active");
        });
    </script>
    @if(Session::get("showYear"))
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            swal({
                icon: "success",
                title: "Datos guardados",
                text: " ",
                timer: 1500,
                buttons: false
            });
        });
    </script>
    @endif

@endsection
