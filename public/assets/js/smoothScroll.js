$(document).ready(function(){
    $('body').scrollspy({target: "#mainNavbar", offset: 57});

    $("#mainNavbar a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html').animate({
                scrollTop: $(hash).offset().top - 56
            }, 500, function() {
                window.history.pushState(null, hash, hash);
            });
        }
    });
});
