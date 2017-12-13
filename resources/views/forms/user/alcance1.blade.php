<form action="{{ ('#') }}" method="POST">
{{ csrf_field() }}
<!--GASES-->

    <div class="form-group row">
        <label name="gasnatural" class="col-form-label col-sm-6" >Gas natural (kwh)</label>
        <div class="col-sm-6">
            <input id="gasnatural" name="gasnatural" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label name="gasnaturalNm" class="col-form-label col-sm-6">Gas natural (Nm3)</label>
        <div class="col-sm-6">
            <input id="gasnaturalNm" name="gasnaturalNm" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label name="refrigerantes" class="col-form-label col-sm-6">Refrigerantes</label>
        <div class="col-sm-6">
            <input id="refrigerantes" name="refrigerantes" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label name="recarga" class="col-form-label col-sm-6">Recarga gases refrigerantes</label>
        <div class="col-sm-6">
            <input id="recarga" name="recarga" class="form-control">
        </div>
    </div>
    <!--GASES-->

    <!--ELECTRICIDAD-->
    <div class="form-group row" >
        <label name="electricidad" class="col-form-label col-sm-6">Electricidad KWh</label>
        <div class="col-sm-6">
            <input id="electricidad" name="electricidad" class="form-control">
        </div>
    </div>
    <!--ELECTRICIDAD-->

    <!--agua-->
    <div class="form-group row">
        <label name="agua" class="col-form-label col-sm-6">Agua potable (m3)</label>
        <div class="col-sm-6">
            <input id="agua" name="agua" class="form-control">
        </div>
    </div>
    <!--agua-->

    <!--papel y carton-->
    <div class="form-group row">
        <label name="papelcartonC" class="col-form-label col-sm-6">Papel y carton (consumo)</label>
        <div class="col-sm-6">
            <input id="papelcartonC" name="papelcartonC" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label name="papelcartonR" class="col-form-label col-sm-6">Papel y carton (residuos)</label>
        <div class="col-sm-6">
            <input id="papelcartonR" name="papelcartonR" class="form-control">
        </div>
    </div>
    <!--papel y carton-->

    <!--factor-->
    <div class="form-group row">
        <label name="factor" class="col-form-label col-sm-6">Factor kwh/Nm3</label>
        <div class="col-sm-6">
            <input id="factor" name="factor" class="form-control">
        </div>
    </div>
    <!--factor-->

    <input type="submit" value="Guardar" class="btn btn-primary"/>
</form>
