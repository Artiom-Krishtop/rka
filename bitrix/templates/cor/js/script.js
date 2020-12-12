$(document).ready(function(){
    $('#partners.flexslider').flexslider({
        animation: "slide",
        itemWidth: 145,
        itemMargin: 3,
        minItems: 3,
        maxItems: 5,
        controlNav:false
    });

    $('#otrasl.flexslider').flexslider({
        animation: "slide",
        itemWidth: 136,
        itemMargin: 0,
        minItems: 3,
        maxItems: 10,
        controlNav:true
    });

    $('#langnavigation').stop().animate({'marginRight':'-73px'},1000);

    $('#langnavigation').hover(
        function () {
            $('#langnavigation').stop().animate({'marginRight':'0px'},200);
        }
    );

    $('#langnavigation').mouseleave(
        function () {
            $('#langnavigation').stop().animate({'marginRight':'-73px'},200);
        }
    );

});