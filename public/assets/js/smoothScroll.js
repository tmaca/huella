document.addEventListener("DOMContentLoaded", function() {

    for (let i = 0; i < document.links.length; i++) {
        let link = document.links[i];
        let href = link.href.replace(window.location.origin + "/", "");

        // scroll top on /
        if (window.location.pathname == "/" && link.href.replace(window.location.origin, "") == "/") {
            link.addEventListener("click", function(e) {
                e.preventDefault();

                document.querySelector("header").scrollIntoView({behavior: "smooth", inline: "start"});
                window.history.pushState(null, document.title, "/");
                setActive(this);
            }, false);

        }  else if (href.charAt(0) == "#") {
            link.addEventListener("click", scroll, false);
        }
    }

    function scroll(e) {
        e.preventDefault();

        let id = this.href.replace(window.location.origin + "/#", "");

        setActive(this);
        document.getElementById(id).scrollIntoView({behavior: "smooth", inline: "start"});
        window.history.pushState(null, document.title, "#" + id);
    }

    function setActive(element) {
        let currentActive = document.getElementById("mainNavbar").querySelector(".active");
        currentActive.className = currentActive.className.replace("active", "");

        element.parentNode.className += " active";
        console.log(element);
    }

}, false);