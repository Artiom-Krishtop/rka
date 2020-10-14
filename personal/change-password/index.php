<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Смена пароля");

?>
<?
//global $USER; $show_more = false;
//$arGroups = $USER->GetUserGroupArray();
//if (in_array(1, $arGroups) || in_array(6, $arGroups)) $show_more = true;
?>

<?/*if ($show_more):?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.profile",
        "profile_rukov",
        array(
            "SET_TITLE" => "Y",
            "COMPONENT_TEMPLATE" => "profile_rukov",
            "SEND_INFO" => "N",
            "CHECK_RIGHTS" => "N",
            "USER_PROPERTY_NAME" => ""
        ),
        false
    );?>
<?else:*/?>
<script>
/*$(document).ready(function () {
    $('.main_box')
  .css({'padding-left':'0px'});
    $('.main_box')
  .css({'padding-right':'0px'});
    $('.main_box')
  .css({'max-width':'100%'});
    $('h1')
  .css({'padding-left':'40px'});

  $('.govuk-back-link')
  .css({'margin-left':'40px'});

  $( ".news-detail" ).addClass( "process-detail" );

  $('ul#vertical-multilevel-menu').removeAttr('id');
     });
    $('ul#vertical-multilevel-menu').addClass( "left_menu_links" );
    $('.left_menu, .password_box').wrapAll('<div class="flex_height">');
*/
</script>
<div class="col-md-9 right_info password_box">
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.profile",
        "change_password",
        array(
            "SET_TITLE" => "N",
            "COMPONENT_TEMPLATE" => "change_password",
            "SEND_INFO" => "Y",
            "CHECK_RIGHTS" => "N",
            "USER_PROPERTY_NAME" => "",
            "USER_PROPERTY" => array(
            )
        ),
        false
    );?>
</div>

<?//endif;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

