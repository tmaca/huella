@extends("layouts.main")

@section("title", "Login")

@section("content")
    <div class="nav-side-menu">
        <div class="brand">{{ Auth::user()->name }}</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="#">
                        <i class="fa fa-user fa-lg"></i> User
                    </a>
                </li>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="#"><i class="fa fa-globe fa-lg"></i> Calcular Huella <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li>Añadir edificio</li>
                    <li>Editar edificio</li>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                    <li id="alcance1-tab" data-toggle="pill" href="#alcance1" role="tab">Alcance 1</li>
                    <li id="alcance2-tab" data-toggle="pill" href="#alcance2" role="tab">Alcance 2</li>
                    <li id="alcance3-tab" data-toggle="pill" href="#alcance3" role="tab">Alcance 3</li>
                    </div>
                </ul>

                <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="#"><i class="fa fa-bar-chart fa-lg"></i> Estadísticas <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li>Etapa 1</li>
                    <li>Etapa 2</li>
                    <li>Etapa 3</li>
                </ul>


            </ul>
        </div>
    </div>
    <div class="container" id="main">
        <div class="row">
            <div id="alcances-content" class="col-xs-12 col-sm-8 col md-8 col-lg-9 col-xl-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="alcance1" role="tabpanel">@include("forms.user.alcance1")</div>
                    <div class="tab-pane fade" id="alcance2" role="tabpanel">@include("forms.user.alcance2")</div>
                    <div class="tab-pane fade" id="alcance3" role="tabpanel">@include("forms.user.alcance3")</div>
                </div>
            </div>
        </div>
    </div>

@endsection
