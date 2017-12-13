$(document).ready(function(){
    $("ul#formLinks li a").on("click", function (event) {
        event.preventDefault();

        $id = $(this).prop("hash").toString();

        $("#formularioUser > *:not(" + $id + ")").fadeOut();
        $($id).fadeIn();
    });
});
