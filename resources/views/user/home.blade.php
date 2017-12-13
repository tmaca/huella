@extends("layouts.main")

@section("title", "Login")

@section("content")
<div id="wrapper">
    <div id="menuUser">
        <div class="navbar navbar-inverse navbar-fixed-left">
            <a class="navbar-brand" href="#">Usuario #1</a>
            <ul class="nav navbar-nav">
               <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Sub Menu1</a></li>
                        <li><a href="#">Sub Menu2</a></li>
                        <li><a href="#">Sub Menu3</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Sub Menu4</a></li>
                        <li><a href="#">Sub Menu5</a></li>
                    </ul>
                </li>-->
                <li><a href="#">Alcance 1</a></li>
                <li><a href="#">Alcance 2</a></li>
                <li><a href="#">Alcance 3</a></li>

            </ul>
        </div>
    </div><!--menuUser-->


    <div id="formularioUser">

        <form action="{{ ('#') }}" method="POST" class="form-inline">
            {{ csrf_field() }}
            <!--GASES-->

                <label name="gasnatural" class="col-control-label">Gas natural (kwh)</label>
                <input id="gasnatural" name="gasnatural" class="form-control">



                <label name="gasnaturalNm" class="col-control-label">Gas natural (Nm3)</label>
                <input id="gasnaturalNm" name="gasnaturalNm" class="form-control">


            <div class="form-group">
                <label name="refrigerantes" class="col-control-label">Refrigerantes</label>
                <input id="refrigerantes" name="refrigerantes" class="form-control">
            </div>

            <div class="form-group">
                <label name="recarga" class="col-control-label">Recarga gases refrigerantes</label>
                <input id="recarga" name="recarga" class="form-control">
            </div>
                <!--GASES-->

                <!--ELECTRICIDAD-->
            <div class="form-group" >
                <label name="electricidad" class="col-control-label">Electricidad KWh</label>
                <input id="electricidad" name="electricidad" class="form-control">
            </div>
                <!--ELECTRICIDAD-->

                <!--agua-->
            <div class="form-group">
                <label name="agua" class="col-control-label">Agua potable (m3)</label>
                <input id="agua" name="agua" class="form-control">
            </div>
                <!--agua-->

                <!--papel y carton-->
            <div class="form-group">
                <label name="papelcartonC" class="col-control-label">Papel y carton (consumo)</label>
                <input id="papelcartonC" name="papelcartonC" class="form-control">
            </div>

            <div class="form-group">
                <label name="papelcartonR" class="col-control-label">Papel y carton (residuos)</label>
                <input id="papelcartonR" name="papelcartonR" class="form-control">
            </div>
                <!--papel y carton-->

                <!--factor-->
            <div class="form-group">
                <label name="email" class="col-control-label">Factor kwh/Nm3</label>
                <input id="email" name="email" class="form-control">
            </div>
                <!--factor-->
            <input type="submit" value="Guardar" class="btn btn-success"/>
        </form>

    </div>
</div><!--wrapper-->


@endsection