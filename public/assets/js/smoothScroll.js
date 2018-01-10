$(document).ready(function(){
    $('body').scrollspy({target: "#mainNavbar", offset: 57});

    $("#mainNavbar a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;
            smoothScroll(hash, true);
            window.history.pushState(null, null, hash);
        }
    });

});

function smoothScroll(nodeElement, isLanding = false) {
    $('html').animate({
        scrollTop: $(nodeElement).offset().top - ((isLanding) ? 56 : 0)
    }, 500);
}
