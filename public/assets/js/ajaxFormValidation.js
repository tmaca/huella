$(function () {
    let nameError, emailError, passwordError, termsError, subjectError, messageError;

    $("#loginForm, #registerForm, #contactForm").on("submit", function(e) {
        e.preventDefault();
        removeErrors();

        let $submitBtn = $(this).children("[type=\"submit\"]");
        $submitBtn.attr("disabled", "disabled");

        return;
        let post_url = $(this).attr("action");
        let formId = $(this).attr("id");
        let data = $(this).serialize();

        $.ajax({
            url: post_url,
            type: 'POST',
            data: data,

            success: function(data) {
                if (data.error) {
                    validationFailed(formId, data.error);
                } else {
                    validationPassed(formId, data.error);
                }
            },
            complete: function() {
                $submitBtn.removeAttr("disabled");
            }
        });
    });

    function removeErrors() {
        $("#email").removeClass("is-invalid");
        $("#password").removeClass("is-invalid");
        $("#terms").removeClass("is-invalid");
        $("#subject").removeClass("is-invalid");
        $("#message").removeClass("is-invalid");
        $(".ajaxError").remove();
        nameError, emailError, passwordError, termsError, subjectError, messageError = null;
    }

    function setErrorsVariables(formId, errors) {
        for (let i = 0; i < errors.length; i++) {
            if (errors[i].indexOf("name") > -1) {
                nameError = errors[i];
                appendError(formId, "name", nameError);
            } else if (errors[i].indexOf("email") > -1){
                emailError = errors[i];
                appendError(formId, "email", emailError);
            } else if (errors[i].indexOf("password") > -1){
                passwordError = errors[i];
                appendError(formId, "password", passwordError);
            } else if (errors[i].indexOf("terms") > -1){
                termsError = errors[i];
                appendError(formId, "terms", termsError);
            } else if (errors[i].indexOf("subject") > -1){
                subjectError = errors[i].replace("subject", "asunto");
                appendError(formId, "subject", subjectError);
            } else if (errors[i].indexOf("message") > -1){
                messageError = errors[i].replace("message", "mensaje");
                appendError(formId, "message", messageError);
            }
        }

        if (errors.email) {
            emailError = errors.email;
            appendError(formId, "email", emailError);
        }
    }

    function appendError(formId, inputId, errorVariable) {
        $("#" + formId + " #" + inputId).addClass("is-invalid").parent().append($("<div/>", {"class": "d-block invalid-feedback ajaxError"}).append($("<strong/>", {text: errorVariable})));
    }

    function validationPassed(formId) {
        if (formId === "loginForm" || formId === "registerForm") {
            location.reload();
        } else {
            removeErrors();

            swal({
                icon: "success",
                title: "Email enviado",
                text: "Tu mensaje se ha enviado correctamente",
            });
        }
    }

    function validationFailed(formId, errors) {
        removeErrors();
        setErrorsVariables(formId, errors);

        if (formId === "contactForm") {
            swal({
                icon: "error",
                title: "Error",
                text: "Tu mensaje no se ha enviado",
            });
        }
    }

});
