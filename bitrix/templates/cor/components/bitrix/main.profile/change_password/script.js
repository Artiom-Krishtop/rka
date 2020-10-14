function removeElement(arr, sElement)
{
	var tmp = new Array();
	for (var i = 0; i<arr.length; i++) if (arr[i] != sElement) tmp[tmp.length] = arr[i];
	arr=null;
	arr=new Array();
	for (var i = 0; i<tmp.length; i++) arr[i] = tmp[i];
	tmp = null;
	return arr;
}

function SectionClick(id)
{
	var div = document.getElementById('user_div_'+id);
	if (div.className == "profile-block-hidden")
	{
		opened_sections[opened_sections.length]=id;
	}
	else
	{
		opened_sections = removeElement(opened_sections, id);
	}

	document.cookie = cookie_prefix + "_user_profile_open=" + opened_sections.join(",") + "; expires=Thu, 31 Dec 2020 23:59:59 GMT; path=/;";
	div.className = div.className == 'profile-block-hidden' ? 'profile-block-shown' : 'profile-block-hidden';
}
/*$(document).ready(function() {
    $('input[name="NEW_PASSWORD"]').on("keyup", function() { // Выполняем скрипт при изменении содержимого 2-го поля
        var input = $(this).val(); // Получаем содержимое 2-го поля
        if((input.match(/[A-Z]/)) && (input.match(/[A-z]/)) ){
            $(this).removeClass("erinp");
            $(".error-pass").html(""); // Выводим сообщение
            $(".error-pass").hide();
            $(".error-pass").parent().removeClass('govuk-form-group--error');
        }else{
            $(this).addClass("erinp");
            $(".error-pass").html("Пароль должен содержать латинские прописные и строчные буквы"); // Выводим сообщение
            $(".error-pass").show();
            $(".error-pass").parent().addClass('govuk-form-group--error');
        }

    });
});
$(document).ready(function() {
    $('input[name="NEW_PASSWORD_CONFIRM"]').on("keyup", function() { // Выполняем скрипт при изменении содержимого 2-го поля
        var value_input1 = $('input[name="NEW_PASSWORD"]').val(); // Получаем содержимое 1-го поля
        var value_input2 = $(this).val(); // Получаем содержимое 2-го поля

        if(value_input1 != value_input2) { // Условие, если поля не совпадают

            $(".error-pass-conf").html("Не верное подтверждение пароля"); // Выводим сообщение
            $(".error-pass-conf").show();
            $(this).addClass("erinp");
            $(this).parent().addClass('govuk-form-group--error');

            $(".btn.bg-teal-400").attr("disabled", "disabled"); // Запрещаем отправку формы
        } else { // Условие, если поля совпадают
            if($('#26').prop('checked')) {
                $(".btn.bg-teal-400").removeAttr("disabled");  // Разрешаем отправку формы
            }
            $(".error-pass-conf").html(""); // Скрываем сообщение
            $(".error-pass-conf").hide();
            $(this).removeClass("erinp");
            $(this).parent().removeClass('govuk-form-group--error');
        }
    });
});

(function( $ ){

    $(function() {

        $('#change_pass').each(function(){
            // Объявляем переменные (форма и кнопка отправки)
            var form = $(this),
                btn = form.find("#but_change");

            // Добавляем каждому проверяемому полю, указание что поле пустое
            form.find('.req-input').addClass('empty_field');

            // Функция проверки полей формы
            function checkInput(){
                form.find('.req-input').each(function(){
                    if($(this).val() != ''){
                        // Если поле не пустое удаляем класс-указание
                        $(this).removeClass('empty_field');
                        $(this).css({'border':'2px solid #0b0c0c'});
                        $(this).prev('.govuk-error-message').html("");
                        $(this).prev('.govuk-error-message').hide();

                        if($(this).hasClass("erinp")){

                        }else{
                            $(this).parent().removeClass('govuk-form-group--error');
                        }

                    } else {
                        // Если поле пустое добавляем класс-указание
                        $(this).addClass('empty_field');
                    }

                });
            }
            /* function checkPass(){
                 form.find($('input[name="REGISTER[PASSWORD]"]')).each(function(){
                     var password = $(this).val();
                     if((password.match(/[A-Z]/)) && (password.match(/[A-z]/)) ){
                         $(this).removeClass("erinp");
                         $(".error-pass").html(""); // Выводим сообщение
                         $(".error-pass").hide();
                         $(".error-pass").parent().removeClass('govuk-form-group--error');
                     }else{
                         $(this).addClass("erinp");
                         $(".error-pass").html("Пароль должен содержать латинские прописные и строчные буквы"); // Выводим сообщение
                         $(".error-pass").show();
                         $(".error-pass").parent().addClass('govuk-form-group--error');
                     }
                 });
             }*//*

            // Функция подсветки незаполненных полей
            function lightEmpty(){
                form.find('.empty_field').css({'border':'4px solid #d4351c'});
                form.find('.empty_field').prev('.govuk-error-message').html("Поле обязательно для заполнения");
                form.find('.empty_field').prev('.govuk-error-message').show();
                form.find('.empty_field').parent().addClass('govuk-form-group--error');
                // Через полсекунды удаляем подсветку
                /* setTimeout(function(){
                     form.find('.empty_field').removeAttr('style');
                 },1500);*//*
            }

            // Проверка в режиме реального времени
            setInterval(function(){
                // Запускаем функцию проверки полей на заполненность
                checkInput();

                // Считаем к-во незаполненных полей
                var sizeEmpty = form.find('.empty_field').size();
                // Вешаем условие-тригер на кнопку отправки формы
                if(sizeEmpty > 0){
                    if(btn.hasClass('notcheck')){
                        return false
                    } else {
                        btn.addClass('notcheck')
                    }
                } else {
                    btn.removeClass('notcheck')
                }
            },500);

            // Событие клика по кнопке отправить
            btn.click(function(){
                if($(this).hasClass('notcheck')){
                    // подсвечиваем незаполненные поля и форму не отправляем, если есть незаполненные поля
                    lightEmpty();
                    //checkPass();
                    return false
                } else {
                    // Все хорошо, все заполнено, отправляем форму
                    console.log(form);
                    //form.submit();
                    //$('#loginregistr').val($('#registermail').val());
                    //$('#reg_user_form').submit();

                    return true
                }
            });
        });
    });

})( jQuery );
*/