<form method="POST" action="{{ route('register') }}" novalidate>
    {{ csrf_field() }}

    <span class="form-group">
        <label for="name" class="col-control-label">Nombre de la organización</label>

        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </span>

    <span class="form-group">
        <label for="nif" class="col-control-label">CIF/NIF</label>

        <input id="nif" type="text" class="form-control{{ $errors->has('nif') ? ' is-invalid' : '' }}" name="nif" value="{{ old('nif') }}" required>

        @if ($errors->has('nif'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('nif') }}</strong>
        </span>
        @endif
    </span>

    <span class="form-group">
        <label for="telephone" class="col-control-label">Teléfono de contacto</label>

        <input id="telephone" type="text" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" required>

        @if ($errors->has('telephone'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('telephone') }}</strong>
        </span>
        @endif
    </span>

    <span class="form-group">{{ $errors->has('password') ? ' is-invalid' : '' }}
        <label for="year" class="col-control-label">Año de inventario</label>

        <input id="year" type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" required>

        @if ($errors->has('year'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('year') }}</strong>{{ $errors->has('password') ? ' is-invalid' : '' }}
        </span>
        @endif
    </span>

    <span class="form-group">
        <label for="email" class="col-control-label">E-Mail</label>

        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </span>

    <span class="form-group">
        <label for="password" class="col-control-label">Contraseña</label>

        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </span>

    <span class="form-group">
        <label for="password-confirm" class="col-control-label">Confirmar contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </span>

    <span class="form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="terms" value="true" @if(old("terms")){{ 'checked' }}@endif>
                He leido y acepto los <a href="{{ route("termsOfService") }}" target="_blank">Terminos del Servicio</a>
        </label>

        @if ($errors->has('terms'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('terms') }}</strong>
        </span>
        @endif
    </span>

    <button type="submit" class="btn btn-primary">
        Register
    </button>
</form>
