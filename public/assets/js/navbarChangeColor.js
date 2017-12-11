$(document).ready(function() {
    $(window).on('scroll', updateNavbarColor);

    updateNavbarColor();
});

function updateNavbarColor() {
    try {
        if ($("#initial").attr('class').indexOf("active") !== -1){
            $("#mainNavbar").removeClass("navbar-green");
            $("#mainNavbar").addClass("navbar-transparent");
        } else {
            $("#mainNavbar").removeClass("navbar-transparent");
            $("#mainNavbar").addClass("navbar-green");
        }
    } catch(e) {}
}
