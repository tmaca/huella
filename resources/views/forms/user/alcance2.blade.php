<div class="container-fluid">
    <form action="{{ ('#') }}" method="POST">
    {{ csrf_field() }}
        <!--ELECTRICIDAD-->
        <div class="form-group row" >
            <label name="electricidad" class="col-form-label col-sm-4">Electricidad KWh</label>
            <div class="col-sm-8">
                <input id="electricidad" name="electricidad" class="form-control">
            </div>
        </div>
        <!--ELECTRICIDAD-->

        <input type="submit" value="Guardar" class="btn btn-primary"/>
    </form>
</div>
