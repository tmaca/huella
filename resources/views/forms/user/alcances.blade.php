<div class="container-fluid">
    <form action="{{ ('alcances') }}" method="POST">
    {{ csrf_field() }}
    <!--GASES-->
        <div id="alc">
        <h3 id="alh2">Alcance 1</h3>
        <hr>
        <div class="form-group row">
            <label name="a1_gas_natural_kwh" class="col-form-label col-sm-4" >Gas natural</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input id="a1_gas_natural_kwh" name="a1_gas_natural_kwh" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">kWh</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label name="a1_gas_natural_nm3" class="col-form-label col-sm-4">Gas natural</label>
            <div class="col-sm-8"><div class="input-group">
                    <input id="a1_gas_natural_nm3" name="a1_gas_natural_nm3" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">Nm<sup>3</sup></span>
                    </div>
                </div>
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
        </div><!--alc1-->

        <div id="alc">
        <h3 id="alh2">Alcance 2</h3>
        <hr>
        <!--ELECTRICIDAD-->
        <div class="form-group row" >
            <label name="a2_electricidad_kwh" class="col-form-label col-sm-4">Electricidad</label>
            <div class="col-sm-8"><div class="input-group">
                    <input id="a2_electricidad_kwh" name="a2_electricidad_kwh" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">kWh</span>
                    </div>
                </div>
            </div>
        </div>
        <!--ELECTRICIDAD-->
        </div><!--alc2-->

        <div id="alc">
        <h3 id="alh2">Alcance 3</h3>
        <hr>
        <!--agua-->

        <div class="form-group row" >
            <label name="a3_agua_potable_m3" class="col-form-label col-sm-4">Agua potable</label>
            <div class="col-sm-8"><div class="input-group">
                    <input id="a3_agua_potable_m3" name="a3_agua_potable_m3" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">m<sup>3</sup></span>
                    </div>
                </div>
            </div>
        </div>
        <!--agua-->

        <!--papel y carton-->
        <div class="form-group row">
            <label name="a3_papel_carton_consumo_kg" class="col-form-label col-sm-4">Papel y cartón</label>
            <div class="col-sm-8"><div class="input-group">
                    <input id="a3_papel_carton_consumo_kg" name="a3_papel_carton_consumo_kg" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">consumo</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label name="a3_papel_carton_residuos_kg" class="col-form-label col-sm-4">Papel y cartón</label>
            <div class="col-sm-8"><div class="input-group">
                <input id="a3_papel_carton_residuos_kg" name="a3_papel_carton_residuos_kg" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">residuos</span>
                    </div>
                </div>
            </div>
        </div>
        <!--papel y carton-->

        <!--factor-->
        <div class="form-group row">
            <label name="a3_factor_kwh_nm3" class="col-form-label col-sm-4">Factor</label>
            <div class="col-sm-8"><div class="input-group">
                <input id="a3_factor_kwh_nm3" name="a3_factor_kwh_nm3" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">kWh/Nm<sup>3</sup></span>
                    </div>
                </div>
            </div>
        </div>
        <!--factor-->
        </div><!--alc3-->

        <input type="submit" value="Guardar" class="btn btn-primary"/>
    </form>
</div>
