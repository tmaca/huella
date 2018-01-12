@extends("layouts.userHome")

@section("title", "Inicio")

@section("userContent")

    <div class="container" id="main">
        <div class="row">
            <div id="alcances-content" class="col-xs-12 col-sm-8 col md-8 col-lg-9 col-xl-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="alcance1" role="tabpanel">@include("forms.user.alcances")</div>
                </div>
            </div>
        </div>
    </div>

@endsection
