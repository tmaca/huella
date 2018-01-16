<form action="{{ route("building.add") }}" method="post" novalidate>
    {{ csrf_field() }}
    <div class="form-group">
        <input type="text" name="name" class="form-control{{ $errors->has("name") ? " is-invalid" : "" }}" autofocus value="{{ old("name") }}" placeholder="Nombre del edificio">
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <select name="Description" class="form-control{{ $errors->has("Description") ? " is-invalid" : "" }}" placeholder="Descripción del edificio">
            <option disabled selected>--Selecciona un pais--</option>
            @foreach (App\Models\Country::all() as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('Description'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('Description') }}</strong>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-default">
        <div class="fa fa-pencil"></div>
        Guardar Cambios
    </button>

</form>
