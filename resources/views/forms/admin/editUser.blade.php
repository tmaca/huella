<form action="{{ route("admin.user.edit") }}" method="post" novalidate>
    {{ csrf_field() }}

    <input type="hidden" name="id" id="id" value="{{ old("id") }}">

    <div class="form-group{{ $errors->has("name") ? " has-error" : "" }}">
        <label for="name" class="control-label">Nombre</label>

        <input type="text" name="name" id="name" class="form-control" autofocus value="{{ old("name") }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has("nif") ? " has-error" : "" }}">
        <label for="nif" class="control-label">NIF</label>

        <input type="text" name="nif" id="nif" class="form-control" value="{{ old("nif") }}">
        @if ($errors->has('nif'))
            <span class="help-block">
                <strong>{{ $errors->first('nif') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has("telephone") ? " has-error" : "" }}">
        <label for="telephone" class="control-label">Teléfono</label>

        <input type="number" name="telephone" id="telephone" class="form-control" value="{{ old("telephone") }}">
        @if ($errors->has('telephone'))
            <span class="help-block">
                <strong>{{ $errors->first('telephone') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has("year") ? " has-error" : "" }}">
        <label for="year" class="control-label">Año</label>

        <input type="text" name="year" id="year" class="form-control" value="{{ old("year") }}">
        @if ($errors->has('year'))
            <span class="help-block">
                <strong>{{ $errors->first('year') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has("email") ? " has-error" : "" }}">
        <label for="email" class="control-label">Email</label>

        <input type="text" name="email" id="email" class="form-control" value="{{ old("email") }}">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input class="form-check-input" type="radio" name="verified" value="0" @if(old("verified") == false){{ "checked" }}@endif>
            No Verificada
        </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check form-check-label">
            <input type="radio" name="verified" value="1" @if(old("verified") == true){{ "checked" }}@endif>
            Verificada
        </label>
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

@if(Request::session()->get("editFailed"))
<script type="text/javascript">
    $("#editUserModal").modal("show");
</script>
@endif
