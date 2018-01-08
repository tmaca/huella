<form action="{{ route("addBuilding") }}" method="post" novalidate>
    {{ csrf_field() }}
    <div class="form-group">
        <input type="text" name="name" id="name" class="form-control{{ $errors->has("name") ? " is-invalid" : "" }}" autofocus value="{{ old("name") }}" placeholder="Nombre del edificio">
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-default">
        <div class="fa fa-pencil"></div>
        Guardar Cambios
    </button>

</form>
