document.addEventListener("DOMContentLoaded", function() {

    for (let i = 0; i < document.links.length; i++) {
        let link = document.links[i]
        let href = link.href.replace(window.location.origin + "/", "");

        if (href.charAt(0) == "#") {
            link.addEventListener("click", scroll, false);
        }
    }

    function scroll(e) {
        e.preventDefault();

        let id = this.href.replace(window.location.origin + "/#", "");

        document.getElementById(id).scrollIntoView({behavior: "smooth", inline: "start"});
        window.history.pushState(null, document.title, "#" + id);
    }

}, false);