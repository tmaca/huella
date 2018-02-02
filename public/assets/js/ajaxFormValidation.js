$(function () {
    let nameError, emailError, passwordError, termsError, subjectError, messageError;

    $("#loginForm, #registerForm, #contactForm").on("submit", function(e) {
        e.preventDefault();
        removeErrors();

        let post_url = $(this).attr("action");
        let id = $(this).attr("id");
        let data = $(this).serialize();

        $.ajax({
            url: post_url,
            type: 'POST',
            data: data,

            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    if (id === "loginForm" || id === "registerForm") {
                        loginRegisterSuccess();
                    } else if (id === "contactForm") {
                        contactSuccess();
                    }
                } else {
                    if (id === "loginForm") {
                        loginError(id, data.error);
                    } else if (id === "registerForm") {
                        registerError(id, data.error);
                    } else if (id === "contactForm") {
                        contactError(id, data.error);
                    }
                }
            }
        });
    });

    function removeErrors() {
        $(".ajaxError").remove();
        $("#email").removeClass("is-invalid");
        $("#password").removeClass("is-invalid");
        $("#terms").removeClass("is-invalid");
        $("#subject").removeClass("is-invalid");
        $("#message").removeClass("is-invalid");
    }

    function setErrorVariables(errors) {
        for (let i = 0; i < errors.length; i++) {
            if (errors[i].indexOf("name") > -1) {
                nameError = errors[i];
            } else if (errors[i].indexOf("email") > -1){
                emailError = errors[i];
            } else if (errors[i].indexOf("password") > -1){
                passwordError = errors[i];
            } else if (errors[i].indexOf("terms") > -1){
                termsError = errors[i];
            } else if (errors[i].indexOf("subject") > -1){
                subjectError = errors[i].replace("subject", "asunto");
            } else if (errors[i].indexOf("message") > -1){
                messageError = errors[i].replace("message", "mensaje");
            }
        }

        if(errors.email) {
            emailError = errors.email;
        }
    }

    function loginRegisterSuccess() {
        location.reload();
    }

    function contactSuccess() {
        removeErrors();

        swal({
            icon: "success",
            title: "Email enviado",
            text: "Tu mensaje se ha enviado correctamente",
        });
    }

    function loginError(id, errors) {
        removeErrors();
        setErrorVariables(errors);

        if (emailError !== undefined) {
            $("#" + id + " #email").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: emailError})));
        }

        if (passwordError !== undefined) {
            $("#password").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: passwordError})));
        }
    }

    function registerError(id, errors) {
        removeErrors();
        setErrorVariables(errors);

        if (nameError !== undefined) {
            $("#name").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: nameError})));
        }

        if (emailError !== undefined) {
            $("#" + id + " #email").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: emailError})));
        }

        if (passwordError !== undefined) {
            $("#" + id + " #password").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: passwordError})));
        }

        if (termsError !== undefined) {
            $("#terms").parent().append($("<div/>", {"class": "d-block invalid-feedback ajaxError"}).append($("<strong/>", {text: termsError})));
        }
    }

    function contactError(id, errors) {
        removeErrors();
        setErrorVariables(errors);

        let swalText;

        function buildSwalText(error) {
            if (swalText === undefined) {
                swalText = error;
            } else { 
                swalText = swalText + "\n" + error;
            }
        }

        if (emailError !== undefined) {
            $("#" + id + " #email").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: emailError})));
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

        swal({
            icon: "warning",
            title: "Email no enviado",
            text: swalText,
        });
    }

});
