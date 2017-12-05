<form action="{{ route("admin.user.edit") }}" class="form-horizontal" method="post" novalidate>
    {{ csrf_field() }}

    <input type="hidden" name="id" id="id">

    <div class="form-group{{ $errors->has("name") ? "has-error" : "" }}">
        <label for="name" class="col-sm-2 control-label">Nombre</label>

        <div class="col-sm-10">
            <input type="text" id="name" class="form-control" autofocus>
        </div>
    </div>

    <div class="form-group{{ $errors->has("nif") ? "has-error" : "" }}">
        <label for="nif" class="col-sm-2 control-label">NIF</label>

        <div class="col-sm-10">
            <input type="text" name="nif" id="nif" class="form-control" autofocus>
        </div>
    </div>

    <div class="form-group{{ $errors->has("telephone") ? "has-error" : "" }}">
        <label for="telephone" class="col-sm-2 control-label">Teléfono</label>

        <div class="col-sm-10">
            <input type="text" name="telephone" id="telephone" class="form-control" autofocus>
        </div>
    </div>

    <div class="form-group{{ $errors->has("year") ? "has-error" : "" }}">
        <label for="year" class="col-sm-2 control-label">Año</label>

        <div class="col-sm-10">
            <input type="text" name="year" id="year" class="form-control" autofocus>
        </div>
    </div>

    <div class="form-group{{ $errors->has("email") ? "has-error" : "" }}">
        <label for="email" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
            <input type="text" name="email" id="email" class="form-control" autofocus>
        </div>
    </div>

    <div class="form-group{{ $errors->has("verified") ? "has-error" : "" }}">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="radio" name="verified" value="0">
                    No Verificada
                </label>
                <label>
                    <input type="radio" name="verified" value="1">
                    Verificada
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">
                <span class="fa fa-pencil"></span>
                Guardar Cambios
            </button>
        </div>
    </div>

</form>
