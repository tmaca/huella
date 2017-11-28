
    <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}" novalidate>
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
            <label for="code" class="col-md-4 control-label">Código</label>

            <div class="col-md-6">
                <input id="code" type="code" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                @if ($errors->has('code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Contraseña</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Mantener sesión iniciada
                    </label>
                    <div class="help-block">
                        Marcando la siguiente casilla la sesión será conservada hasta cierres la sesión manualmente
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                    Login
                </button>
            </div>
        </div>
    </form>
