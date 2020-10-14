<?
//define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/*if (is_string($_REQUEST["backurl"]) && strpos($_REQUEST["backurl"], "/") === 0)
{
	LocalRedirect($_REQUEST["backurl"]);
}*/

if(!$USER->IsAuthorized())
{?>
    <?
    $APPLICATION->IncludeComponent(
        "bitrix:main.register",
        "letr",
        Array(
            "USER_PROPERTY_NAME" => "",
            "SEF_MODE" => "N",
            "SHOW_FIELDS" => Array("NAME", "SECOND_NAME", "LAST_NAME", "PERSONAL_PHONE"),
            "REQUIRED_FIELDS" => Array(""),
            "AUTH" => "Y",
            "USE_BACKURL" => "Y",
            //"SUCCESS_PAGE" => $APPLICATION->GetCurPageParam('',array('backurl')),
            "SUCCESS_PAGE" => "/auth/auth_ok.php",
            "SET_TITLE" => "N",
            "USER_PROPERTY" => Array("UF_SKYPE","UF_SUBSCR")
        )
    );
    ?>

    <?
    //$_REQUEST["REGISTER[LOGIN]"] = $_REQUEST["REGISTER[EMAIL]"];
} elseif(isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0) {LocalRedirect(SITE_DIR.'personal/profile/');} else { LocalRedirect(SITE_DIR.'personal/profile/');}


$APPLICATION->SetTitle("Авторизация");
/*?>
<p>Вы зарегистрированы и успешно авторизовались.</p>
<?/*
<p>Используйте административную панель в верхней части экрана для быстрого доступа к функциям управления структурой и информационным наполнением сайта. Набор кнопок верхней панели отличается для различных разделов сайта. Так отдельные наборы действий предусмотрены для управления статическим содержимым страниц, динамическими публикациями (новостями, каталогом, фотогалереей) и т.п.</p>
*//* ?>
<p><a href="<?=SITE_DIR?>">Вернуться на главную страницу</a></p>

<?*/require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>