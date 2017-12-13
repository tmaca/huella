<form method="POST" action="{{ route('register') }}" novalidate>
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-control-label">Nombre de la organización</label>

        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('nif') ? ' has-error' : '' }}">
        <label for="nif" class="col-control-label">CIF/NIF</label>

        <input id="nif" type="text" class="form-control" name="nif" value="{{ old('nif') }}" required autofocus>

        @if ($errors->has('nif'))
        <span class="help-block">
            <strong>{{ $errors->first('nif') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
        <label for="telephone" class="col-control-label">Teléfono de contacto</label>

        <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" required autofocus>

        @if ($errors->has('telephone'))
        <span class="help-block">
            <strong>{{ $errors->first('telephone') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
        <label for="year" class="col-control-label">Año de inventario</label>

        <input id="year" type="text" class="form-control" name="year" value="{{ old('year') }}" required autofocus>

        @if ($errors->has('year'))
        <span class="help-block">
            <strong>{{ $errors->first('year') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-control-label">E-Mail</label>

        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-control-label">Contraseña</label>

        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-control-label">Confirmar contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>

    <div class="form-check{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="terms" value="true" @if(old("terms")){{ 'checked' }}@endif>
                He leido y acepto los <a href="{{ route("termsOfService") }}" target="_blank">Terminos del Servicio</a>
        </label>

        @if ($errors->has('terms'))
        <span class="help-block">
            <strong>{{ $errors->first('terms') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-success">
                Register
            </button>
        </div>
    </div>
</form>
