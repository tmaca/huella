const navbarColor = "#5cb85c";

$(document).ready(function() {

    if (location.pathname != "/") {
        $(".navbar").css({"background-color": navbarColor});

    } else {
        $(window).scroll(function() {
            if ($(window).scrollTop() > $("header").height() - $("#mainNavbar").height()) {
                $("#mainNavbar").css({"background-color": navbarColor});

            } else {
                $("#mainNavbar").css({"background-color": "transparent"});
            }
        });
    }

});