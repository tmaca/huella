$(document).ready(function() {
    $(window).on('scroll', function() {
        if ($("#initial").attr('class').indexOf("active") !== -1){
            $("#mainNavbar").removeClass("navbar-green");
            $("#mainNavbar").addClass("navbar-transparent");
            console.log("si");
        } else {
            console.log("no");
            $("#mainNavbar").removeClass("navbar-transparent");
            $("#mainNavbar").addClass("navbar-green");
        }
    });
});
