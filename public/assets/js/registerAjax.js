$(document).ready(function() {
    $("#registerForm").on("submit", function(e) {
        e.preventDefault();

        let post_url = $(this).attr("action");
        let formData = $(this).serialize();

        $.ajax({
            url: post_url,
            type: 'POST',
            data: formData,

            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    location.reload();
                } else {
                    let nameError, emailError, passwordError, termsError;

                    for (let i = 0; i < data.error.length; i++) {
                        if (data.error[i].indexOf("name") > -1) {
                            nameError = data.error[i];
                        } else if (data.error[i].indexOf("email") > -1){
                            emailError = data.error[i];
                        } else if (data.error[i].indexOf("password") > -1){
                            passwordError = data.error[i];
                        } else if (data.error[i].indexOf("terms") > -1){
                            termsError = data.error[i];
                        }
                    }

                    $(".ajaxError").remove();
                    $("#name").removeClass("is-invalid");
                    $("#email").removeClass("is-invalid");
                    $("#password").removeClass("is-invalid");
                    $("#terms").removeClass("is-invalid");

                    if (nameError !== undefined) {
                        $("#name").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: nameError})));
                    }

                    if (emailError !== undefined) {
                        $("#registerForm #email").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: emailError})));
                    }

                    if (passwordError !== undefined) {
                        $("#registerForm #password").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: passwordError})));
                    }

                    if (termsError !== undefined) {
                        $("#terms").parent().append($("<div/>", {"class": "d-block invalid-feedback ajaxError"}).append($("<strong/>", {text: termsError})));
                    }
                }
            }
        });
    });
});
