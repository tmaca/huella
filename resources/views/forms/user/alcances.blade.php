<div class="container-fluid">
    <form action="{{ route('alcances') }}" method="POST">
    {{ csrf_field() }}
    <!--GASES-->
        <div id="alc">
        <h3 id="alh2">Datos generales</h3>
        <hr>
        <div class="form-group row">
            <label name="a1_gas_natural_kwh" class="col-form-label col-sm-4">Año </label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input type="number" id="ano" name="ano" class="form-control{{ $errors->has('ano') ? ' is-invalid' : '' }}" value="{{ old("ano")}}" autofocus>
                    @if ($errors->has('ano'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('ano') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>

        <div id="alc">
        <h3 id="alh2">Alcance 1</h3>
        <hr>
        <div class="form-group row">
            <label name="a1_gas_natural_kwh" class="col-form-label col-sm-4" >Gas natural</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input id="a1_gas_natural_kwh" name="a1_gas_natural_kwh" class="form-control{{ $errors->has('a1_gas_natural_kwh') ? ' is-invalid' : '' }}" value="{{ old("a1_gas_natural_kwh")}}">
                    <div class="input-group-append">
                        <span class="input-group-text">kWh</span>
                    </div>
                    @if ($errors->has('a1_gas_natural_kwh'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('a1_gas_natural_kwh') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label name="a1_gas_natural_nm3" class="col-form-label col-sm-4">Gas natural</label>
            <div class="col-sm-8"><div class="input-group">
                    <input id="a1_gas_natural_nm3" name="a1_gas_natural_nm3" class="form-control{{ $errors->has('a1_gas_natural_nm3') ? ' is-invalid' : '' }}" value="{{ old("a1_gas_natural_nm3")}}">
                    <div class="input-group-append">
                        <span class="input-group-text">Nm<sup>3</sup></span>
                    </div>
                    @if ($errors->has('a1_gas_natural_nm3'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('a1_gas_natural_nm3') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label name="a1_refrigerantes" class="col-form-label col-sm-4">Refrigerantes</label>
            <div class="col-sm-8">
                <input id="a1_refrigerantes" name="a1_refrigerantes" class="form-control{{ $errors->has('a1_refrigerantes') ? ' is-invalid' : '' }}" value="{{ old("a1_refrigerantes")}}">
                @if ($errors->has('a1_refrigerantes'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('a1_refrigerantes') }}</strong>
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label name="a1_recarga_gases_refrigerantes" class="col-form-label col-sm-4">Recarga gases refrigerantes</label>
            <div class="col-sm-8">
                <input id="a1_recarga_gases_refrigerantes" name="a1_recarga_gases_refrigerantes" class="form-control{{ $errors->has('a1_recarga_gases_refrigerantes') ? ' is-invalid' : '' }}" value="{{ old("a1_recarga_gases_refrigerantes")}}">
                @if ($errors->has('a1_recarga_gases_refrigerantes'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('a1_recarga_gases_refrigerantes') }}</strong>
                    </div>
                @endif
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
            <div class="col-sm-8">
                <div class="input-group">
                    <input id="a2_electricidad_kwh" name="a2_electricidad_kwh" class="form-control{{ $errors->has('a2_electricidad_kwh') ? ' is-invalid' : '' }}" value="{{ old("a2_electricidad_kwh")}}">
                    <div class="input-group-append">
                        <span class="input-group-text">kWh</span>
                    </div>
                    @if ($errors->has('a2_electricidad_kwh'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('a2_electricidad_kwh') }}</strong>
                        </div>
                    @endif
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
                    <input id="a3_agua_potable_m3" name="a3_agua_potable_m3" class="form-control{{ $errors->has('a3_agua_potable_m3') ? ' is-invalid' : '' }}" value="{{ old("a3_agua_potable_m3")}}">
                    <div class="input-group-append">
                        <span class="input-group-text">m<sup>3</sup></span>
                    </div>
                    @if ($errors->has('a3_agua_potable_m3'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('a3_agua_potable_m3') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--agua-->

        <!--papel y carton-->
        <div class="form-group row">
            <label name="a3_papel_carton_consumo_kg" class="col-form-label col-sm-4">Papel y cartón</label>
            <div class="col-sm-8"><div class="input-group">
                    <input id="a3_papel_carton_consumo_kg" name="a3_papel_carton_consumo_kg" class="form-control{{ $errors->has('a3_papel_carton_consumo_kg') ? ' is-invalid' : '' }}" value="{{ old("a3_papel_carton_consumo_kg")}}">
                    <div class="input-group-append">
                        <span class="input-group-text">consumo</span>
                    </div>
                    @if ($errors->has('a3_papel_carton_consumo_kg'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('a3_papel_carton_consumo_kg') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label name="a3_papel_carton_residuos_kg" class="col-form-label col-sm-4">Papel y cartón</label>
            <div class="col-sm-8"><div class="input-group">
                <input id="a3_papel_carton_residuos_kg" name="a3_papel_carton_residuos_kg" class="form-control{{ $errors->has('a3_papel_carton_residuos_kg') ? ' is-invalid' : '' }}" value="{{ old("a3_papel_carton_residuos_kg")}}">
                    <div class="input-group-append">
                        <span class="input-group-text">residuos</span>
                    </div>
                    @if ($errors->has('a3_papel_carton_residuos_kg'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('a3_papel_carton_residuos_kg') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--papel y carton-->

        <!--factor-->
        <div class="form-group row">
            <label name="a3_factor_kwh_nm3" class="col-form-label col-sm-4">Factor</label>
            <div class="col-sm-8"><div class="input-group">
                <input id="a3_factor_kwh_nm3" name="a3_factor_kwh_nm3" class="form-control{{ $errors->has('a3_factor_kwh_nm3') ? ' is-invalid' : '' }}" value="{{ old("a3_factor_kwh_nm3")}}">
                    <div class="input-group-append">
                        <span class="input-group-text">kWh/Nm<sup>3</sup></span>
                    </div>
                    @if ($errors->has('a3_factor_kwh_nm3'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('a3_factor_kwh_nm3') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--factor-->
        </div><!--alc3-->
        <input type="hidden" name="id" value="{{$id}}"/>
        <input type="submit" name="submit" value="Guardar" class="btn btn-primary"/>
        <button type="submit" name="submit" value="calculateStudy" class="btn btn-primary">
            Calcular Huella de Carbono
        </button>
    </form>
</div>
