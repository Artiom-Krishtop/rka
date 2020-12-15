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

    var authorization_lawyer = Cookies.get('authorization_lawyer');

    $('form[name="form_auth"] input[type="submit"]').on('click', function(e){
        if (authorization_lawyer == null) {
            if($(this).closest('form').data('event')) {
            } else {
                e.preventDefault();
                initPopUp("form[name='form_auth'] input[type='submit']");
            }
        }
    });

    $('#user-login-form input[type="submit"]').on('click', function(e){
        if (authorization_lawyer == null) {
            if($(this).closest('form').data('event')) {
            } else {
                e.preventDefault();
                initPopUp("#user-login-form input[type='submit']");
            }
        }
    });

    $(document).on('click', '*[data-event="question-exist"]', function(e){
        var name = $(this).data('sid');
        $(this).parent().remove();
        $('.questionOverlay').remove();
        $(name).closest('form').addClass('loadings').attr('data-event', 'loadings');
        // set cookie
        Cookies.set('authorization_lawyer', 'yes');
        $(name).trigger('click');
    });


});

initPopUp = function (form) {
    if($(".question_frame_licenses").length){
    }else {
        $('<div class="questionOverlay"></div>').appendTo('body');
        $('body').append('<div class="question_frame_licenses" style="width: 500px; z-index: 3000; margin-left: -250px; top: 0px; opacity: 1; display: block;animation: toggle_opacity .2s;position: fixed;left: 50%;background: #fff;padding: 55px;"><div class="question_frame_text" style="margin-bottom: 25px;"></div><button id="question_frame_btn" type="button" class="question-btn-success" data-sid="'+form+'" data-event="question-exist">Принимаю</button></div>');
        $(".question_frame_licenses .question_frame_text").load('/include/licenses_text.php');
    }
}