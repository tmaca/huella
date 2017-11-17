@extends("layouts.main")

@section("title", "Hola Mundo")

@section("content")
    <div id="register">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nombre de la organización</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('nif') ? ' has-error' : '' }}">
                                    <label for="nif" class="col-md-4 control-label">CIF/NIF</label>

                                    <div class="col-md-6">
                                        <input id="nif" type="text" class="form-control" name="nif" value="{{ old('nif') }}" required autofocus>

                                        @if ($errors->has('nif'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('nif') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                    <label for="telephone" class="col-md-4 control-label">Teléfono de contacto</label>

                                    <div class="col-md-6">
                                        <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" required autofocus>

                                        @if ($errors->has('telephone'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                                    <label for="year" class="col-md-4 control-label">Año de inventario</label>

                                    <div class="col-md-6">
                                        <input id="year" type="text" class="form-control" name="year" value="{{ old('year') }}" required autofocus>

                                        @if ($errors->has('year'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
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
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($postRegister) && $postRegister)
        <script type="text/javascript">
            swal("Activación de cuenta", "Se ha enviado un email de confirmación a la dirección indicada, {{ $emailAddress }}, una vez confirmado el email se activará la cuenta", "info");
        </script>
    @endif

@endsection
