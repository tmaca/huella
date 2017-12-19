@extends("layouts.main")

@section("title", "Registro")

@section("content")
    <div class="container">

        @if(isset($postRegister) && $postRegister)
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                swal("Activación de cuenta", "Se ha enviado un email de confirmación a la dirección indicada, {{ $emailAddress }}, una vez confirmado el email se activará la cuenta", "info");
            });
        </script>

        <noscript>
            <div class="alert alert-info">
                <h4>Activación de cuenta</h4>
                <p>
                    Se ha enviado un email de confirmación a la dirección indicada, {{ $emailAddress }}, una vez confirmado el email se activará la cuenta
                </p>
            </div>
        </noscript>
        @endif

        @include("forms.auth.register")
    </div>

@endsection
