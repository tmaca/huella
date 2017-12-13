<div id="alcance3" style="display:none">
    <form action="{{ ('#') }}" method="POST">
    {{ csrf_field() }}
    <!--GASES-->
        <!--GASES-->

        <!--ELECTRICIDAD-->
        <div class="form-group row" >
            <label name="electricidad" class="col-form-label col-sm-6">Electricidad KWh</label>
            <div class="col-sm-6">
                <input id="electricidad" name="electricidad" class="form-control">
            </div>
        </div>
        <!--ELECTRICIDAD-->

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
        <div class="form-group row">
            <label name="papelcartonR" class="col-form-label col-sm-6">Papeasdsadsdasdads)</label>
            <div class="col-sm-6">
                <input id="papelcartonR" name="papelcartonR" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label name="papelcartonR" class="col-form-label col-sm-6">P666666duos)</label>
            <div class="col-sm-6">
                <input id="papelcartonR" name="papelcartonR" class="form-control">
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

        <input type="submit" value="Guardar" class="btn btn-success"/>
    </form>
</div>
