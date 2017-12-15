@extends("layouts.main")

@section("title", "Login")

@section("content")
    <div class="row mx-0">
        <div class="col-12 col sm-4 col-md-4 col-lg-3 col-xl-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                <a class="nav-link active" id="alcance1-tab" data-toggle="pill" href="#alcance1" role="tab">Alcance 1</a>
                <a class="nav-link" id="alcance2-tab" data-toggle="pill" href="#alcance2" role="tab">Alcance 2</a>
                <a class="nav-link" id="alcance3-tab" data-toggle="pill" href="#alcance3" role="tab">Alcance 3</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col md-8 col-lg-9 col-xl-10">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="alcance1" role="tabpanel">@include("forms.user.alcance1")</div>
              <div class="tab-pane fade" id="alcance2" role="tabpanel">@include("forms.user.alcance2")</div>
              <div class="tab-pane fade" id="alcance3" role="tabpanel">@include("forms.user.alcance3")</div>
            </div>
        </div>
    </div>
@endsection
