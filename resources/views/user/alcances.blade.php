@extends("layouts.userHome")

@section("title", "Inicio")

@section("userContent")

    <div class="container">
        <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
            @foreach($studies as $study)
            <li class="nav-item">
                <a class="nav-link" id="study-{{ $study->year }}-tab" data-toggle="tab" href="#study-{{ $study->year }}">
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
                @include("forms.user.alcances", ["study" => $study])
            </div>
            @endforeach

            <div class="tab-pane fade show active" id="contact">
                @include("forms.user.alcances", ["study" => new App\Models\Study])
            </div>
        </div>

    </div>

@endsection
