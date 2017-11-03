

$(document).ready(function(){
    $(window).scroll(function(){
        if($(window).scrollTop() > $(window).height()){
            $(".navbar").css({"background-color":"#40a372"});
        }else{
            $(".navbar").css({"background-color":"transparent"});
        }
    })
})


