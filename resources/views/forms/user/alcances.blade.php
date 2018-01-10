<div class="container-fluid">
    <form action="{{ ('alcances') }}" method="POST">
    {{ csrf_field() }}
    <!--GASES-->
        <div class="form-group row">
            <label name="a1_gas_natural_kwh" class="col-form-label col-sm-4" >Gas natural (kwh)</label>
            <div class="col-sm-8">
                <input id="a1_gas_natural_kwh" name="a1_gas_natural_kwh" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label name="a1_gas_natural_nm3" class="col-form-label col-sm-4">Gas natural (Nm3)</label>
            <div class="col-sm-8">
                <input id="a1_gas_natural_nm3" name="a1_gas_natural_nm3" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label name="a1_refrigerantes" class="col-form-label col-sm-4">Refrigerantes</label>
            <div class="col-sm-8">
                <input id="a1_refrigerantes" name="a1_refrigerantes" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label name="a1_recarga_gases_refrigerantes" class="col-form-label col-sm-4">Recarga gases refrigerantes</label>
            <div class="col-sm-8">
                <input id="a1_recarga_gases_refrigerantes" name="a1_recarga_gases_refrigerantes" class="form-control">
            </div>
        </div>
        <!--GASES-->

        <!--ELECTRICIDAD-->
        <div class="form-group row" >
            <label name="a2_electricidad_kwh" class="col-form-label col-sm-4">Electricidad KWh</label>
            <div class="col-sm-8">
                <input id="a2_electricidad_kwh" name="a2_electricidad_kwh" class="form-control">
            </div>
        </div>
        <!--ELECTRICIDAD-->

        <!--agua-->
        <div class="form-group row">
            <label name="a3_agua_potable_m3" class="col-form-label col-sm-4">Agua potable (m3)</label>
            <div class="col-sm-8">
                <input id="a3_agua_potable_m3" name="a3_agua_potable_m3" class="form-control">
            </div>
        </div>
        <!--agua-->

        <!--papel y carton-->
        <div class="form-group row">
            <label name="a3_papel_carton_consumo_kg" class="col-form-label col-sm-4">Papel y carton (consumo)</label>
            <div class="col-sm-8">
                <input id="a3_papel_carton_consumo_kg" name="a3_papel_carton_consumo_kg" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label name="a3_papel_carton_residuos_kg" class="col-form-label col-sm-4">Papel y carton (residuos)</label>
            <div class="col-sm-8">
                <input id="a3_papel_carton_residuos_kg" name="a3_papel_carton_residuos_kg" class="form-control">
            </div>
        </div>
        <!--papel y carton-->

        <!--factor-->
        <div class="form-group row">
            <label name="a3_factor_kwh_nm3" class="col-form-label col-sm-4">Factor kwh/Nm3</label>
            <div class="col-sm-8">
                <input id="a3_factor_kwh_nm3" name="a3_factor_kwh_nm3" class="form-control">
            </div>
        </div>
        <!--factor-->

        <input type="submit" value="Guardar" class="btn btn-primary"/>
    </form>
</div>
