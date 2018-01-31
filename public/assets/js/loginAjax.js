$(document).ready(function() {
    $("#loginForm").on("submit", function(e) {
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

                    let emailError, passwordError;

                    for (let i = 0; i < data.error.length; i++) {
                        if (data.error[i].indexOf("email") > -1) {
                            emailError = data.error[i];
                        } else if (data.error[i].indexOf("password") > -1){
                            passwordError = data.error[i];
                        }
                    }

                    if(data.error.email) {
                        emailError = data.error.email;
                    }

                    $(".ajaxError").remove();
                    $("#email").removeClass("is-invalid");
                    $("#password").removeClass("is-invalid");

                    if (emailError !== undefined) {
                        $("#loginForm #email").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: emailError})));
                    }

                    if (passwordError !== undefined) {
                        $("#password").addClass("is-invalid").parent().append($("<div/>", {"class": "invalid-feedback ajaxError"}).append($("<strong/>", {text: passwordError})));
                    }
                }
            }
        });
    });
});
