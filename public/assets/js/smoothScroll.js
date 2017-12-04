$(document).ready(function(){
    $('body').scrollspy({target: ".navbar", offset: 51});

    $("#mainNavbar a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html').animate({
                scrollTop: $(hash).offset().top - 50
            }, 500, function() {
                window.history.pushState(null, hash, hash);
            });
        }
    });
});
