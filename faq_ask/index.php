<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "юридическая консультация бесплатно, консультация адвоката бесплатно, консультация адвоката, бесплатная консультация");
$APPLICATION->SetPageProperty("title", "Бесплатная юридическая онлайн-консультация РБ");
$APPLICATION->SetPageProperty("description", "Здесь Вы можете задать вопрос адвокату Республики Беларусь бесплатно онлайн");
$APPLICATION->SetTitle("Интернет-ресурс \"Бесплатная юридическая онлайн-консультация на сайте Белорусской республиканской коллегии адвокатов\"");
?>

<?/*include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
$cpt = new CCaptcha();
$cpt->SetCode();

$captchaPass = COption::GetOptionString("main", "captcha_password", "");
    if(strlen($captchaPass) <= 0) {
        $captchaPass = randString(10);
        COption::SetOptionString("main", "captcha_password", $captchaPass);
    }
$cpt->SetCodeCrypt($captchaPass);*/

?>
<?$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath("include_areas/faqask.php"),
	Array(),
	Array("MODE"=>"html")
);
?>
<?
$APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "cormessage",
    array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHAIN_ITEM_LINK" => "",
        "CHAIN_ITEM_TEXT" => "",
        "COMPONENT_TEMPLATE" => "cormessage",
        "EDIT_URL" => "",
        "HIDE_CAPTION" => "Y",
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "LIST_URL" => "",
        "SEF_MODE" => "N",
        "SUCCESS_URL" => "",
        "USE_EXTENDED_ERRORS" => "N",
        "WEB_FORM_ID" => "4",
        "VARIABLE_ALIASES" => array(
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        )
    ),
    false
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>