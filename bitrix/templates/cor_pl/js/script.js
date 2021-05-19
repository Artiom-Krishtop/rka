jQuery(document).ready(function(){
 jQuery('#partners.flexslider').flexslider({
     animation: "slide",
     itemWidth: 145,
     itemMargin: 3,
     minItems: 3,
     maxItems: 5,
     controlNav:false
 });
});
jQuery(document).ready(function(){
 jQuery('#otrasl.flexslider').flexslider({
    animation: "slide",
    itemWidth: 136,
    itemMargin: 0,
	minItems: 3,
    maxItems: 10, 
	controlNav:true,	 
 });
});
jQuery(function() {
    jQuery('#langnavigation').stop().animate({'marginRight':'-73px'},1000);

    jQuery('#langnavigation').hover(
        function () {
            jQuery('#langnavigation').stop().animate({'marginRight':'0px'},200);
        }
    );
    jQuery('#langnavigation').mouseleave(
        function () {
            jQuery('#langnavigation').stop().animate({'marginRight':'-73px'},200);
        }
    );
});