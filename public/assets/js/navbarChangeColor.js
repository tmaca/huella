$(document).ready(function() {

    if (location.pathname == "/") {
        $(window).scroll(checkSroll);

        checkSroll();
        function checkSroll() {
            if ($(window).scrollTop() > $("header").height() - $("#mainNavbar").height()) {
                $("#mainNavbar").removeClass("navbar-transparent");
                $("#mainNavbar").addClass("navbar-green");

            } else {
                $("#mainNavbar").removeClass("navbar-green");
                $("#mainNavbar").addClass("navbar-transparent");
            }
        }
    }

});
