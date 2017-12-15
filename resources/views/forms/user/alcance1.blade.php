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

    <input type="submit" value="Guardar" class="btn btn-primary"/>
</form>
