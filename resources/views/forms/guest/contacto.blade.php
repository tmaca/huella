@if(session()->get("isContactValid") === true)
    <div class="alert alert-success print-success-msg">
        Tu mensaje se ha enviado correctamente.
    </div>
@endif

<div class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
</div>

<form id="contactForm" action="{{ route('contact') }}" method="POST">
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

        @if ($errors->has('subject'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('subject') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="message">Mensaje:</label>
        <textarea id="message" name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="Escribe tu mensaje aqui...">{{ old("message") }}</textarea>

        @if ($errors->has('message'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('message') }}</strong>
            </div>
        @endif
    </div>

    <button id="btn-submit" type="submit" class="btn btn-primary">
        <i class="fa fa-send"></i>
        Enviar mensaje
    </button>
</form>

<script>
    $(document).ready(function() {
        $("#contactForm").on("submit", function(e) {
            e.preventDefault();

            let post_url = $(this).attr("action");
            let _token = $("input[name='_token']").val();
            let email = $("input[name='email']").val();
            let subject = $("input[name='subject']").val();
            let message = $("textarea[name='message']").val();

            $.ajax({
                url: post_url,
                type: 'POST',
                data: {
                    _token: _token,
                    email: email,
                    subject: subject,
                    message: email,
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".ajaxError").remove();
                        $("#email").removeClass("is-invalid");
                        $("#subject").removeClass("is-invalid");
                        $("#message").removeClass("is-invalid");

                        swal({
                            icon: "success",
                            title: "Email enviado",
                            text: "Tu mensaje se ha enviado correctamente",
                        });
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg(msg) {
            let emailError, subjectError, messageError, swalText;

            for (let i = 0; i < msg.length; i++) {
                if (msg[i].indexOf("email") > -1) {
                    emailError = msg[i];
                } else if (msg[i].indexOf("subject") > -1){
                    subjectError = msg[i].replace("subject", "asunto");
                } else if (msg[i].indexOf("message") > -1){
                    messageError = msg[i].replace("message", "mensaje");
                }
            }

            $(".ajaxError").remove();
            $("#email").removeClass("is-invalid");
            $("#subject").removeClass("is-invalid");
            $("#message").removeClass("is-invalid");

            if (emailError !== undefined) {
                $("#email").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: emailError})));
                buildSwalText(emailError);
            }
            if(subjectError !== undefined) {
                $("#subject").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: subjectError})));
                buildSwalText(subjectError);
            }
            if(messageError !== undefined) {
                $("#message").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: messageError})));
                buildSwalText(messageError);
            }

            function buildSwalText(error) {
                if (swalText === undefined) {
                    swalText = error;
                } else { 
                    swalText = swalText + "\n" + error;
                }
            }

            swal({
                icon: "warning",
                title: "Email no enviado",
                text: swalText,
            });
        }
    });
</script>
