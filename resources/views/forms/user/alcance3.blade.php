<div class="container-fluid">
    <form action="{{ ('#') }}" method="POST">
        {{ csrf_field() }}
        <!--agua-->
        <div class="form-group row">
            <label name="agua" class="col-form-label col-sm-4">Agua potable (m3)</label>
            <div class="col-sm-8">
                <input id="agua" name="agua" class="form-control">
            </div>
        </div>
        <!--agua-->

        <!--papel y carton-->
        <div class="form-group row">
            <label name="papelcartonC" class="col-form-label col-sm-4">Papel y carton (consumo)</label>
            <div class="col-sm-8">
                <input id="papelcartonC" name="papelcartonC" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label name="papelcartonR" class="col-form-label col-sm-4">Papel y carton (residuos)</label>
            <div class="col-sm-8">
                <input id="papelcartonR" name="papelcartonR" class="form-control">
            </div>
        </div>
        <!--papel y carton-->

        <!--factor-->
        <div class="form-group row">
            <label name="factor" class="col-form-label col-sm-4">Factor kwh/Nm3</label>
            <div class="col-sm-8">
                <input id="factor" name="factor" class="form-control">
            </div>
        </div>
        <!--factor-->

        <input type="submit" value="Guardar" class="btn btn-primary"/>
    </form>
</div>
