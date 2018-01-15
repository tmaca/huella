<nav class="nav-side-menu">
    <div class="brand">{{ Auth::user()->name }}</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li>
                <a href="{{ route("user.profile") }}">
                    <i class="fa fa-user fa-lg"></i> Perfil
                </a>
            </li>


            <li data-toggle="collapse" data-target="#service" class="collapsed">
                <a href="#"><i class="fa fa-globe fa-lg"></i>Edificios<span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse{{ Request::url() == route("building") ? " show" : "" }}" id="service">
                <a href="{{ URL::route('building') }}"><li>Añadir edificio</li></a>
                <li>Editar edificio</li>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                <li id="alcance1-tab" data-toggle="pill" href="#alcances" role="tab">Alcances</li>

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
</nav>
