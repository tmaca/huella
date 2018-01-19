$(document).ready(function() {
    $("#contactForm").on("submit", function(e) {
        e.preventDefault();

        let post_url = $(this).attr("action");
        let formData = $(this).serialize();

        $.ajax({
            url: post_url,
            type: 'POST',
            data: formData,

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
