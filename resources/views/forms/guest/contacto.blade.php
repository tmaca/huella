<form action="{{ route('contact') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Email:</label>
        <input id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old("email") }}">

        @if ($errors->has('email'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="subject">Asunto:</label>
        <input id="subject" name="subject" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" value="{{ old("subject") }}">

        @if ($errors->has('email'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="message">Mensaje:</label>
        <textarea id="message" name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="Escribe tu mensaje aqui...">{{ old("message") }}</textarea>

        @if ($errors->has('email'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fa fa-send"></i>
        Enviar mensaje
    </button>
</form>

@if(session()->get("isContactValid") === false)
    <script defer>
        document.addEventListener("DOMContentLoaded", function() {
                swal({
                    icon: "warning",
                    title: "Email no enviado",
                    text: "Algunos campos no han pasado la validación",
                    buttons: {
                        cancel: "No revisar",
                        confirm: "Revisar formulario",
                    }
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        smoothScroll(document.getElementById("contacto"), true);
                    }

                });
        }, false);
    </script>
@endif
