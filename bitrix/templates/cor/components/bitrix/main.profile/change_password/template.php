<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>

<?// список полей из инфблока
/*CModule::IncludeModule("iblock");
$arFilterEditProfile = Array(
    "IBLOCK_ID"=>1,
    "PROPERTY_USER"=>$arResult["ID"],
    "PROPERTY_*"
);
$arSelectEditProfile = Array("ID", "IBLOCK_ID","IBLOCK_SECTION_ID", "NAME", "DATE_ACTIVE_FROM","DATE_ACTIVE_TO","DETAIL_TEXT","PREVIEW_TEXT", "DETAIL_PICTURE","PROPERTY_*");
$resEditProfile = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilterEditProfile, $arSelectEditProfile);
$countEditProfile = $resEditProfile->SelectedRowsCount();

if ($countEditProfile>0):

$obEditProfile = $resEditProfile->GetNextElement();
$arFieldsEditProfile = $obEditProfile->GetFields();
$arPropsEditProfile = $obEditProfile->GetProperties();*/

?>
    <?php
    /*print "<pre>";
    print_r($arResult["arUser"]);
    print "</pre>";*/
    ?>
<div class="bx-auth-profile block">
    <div id="success" style="display: none;"><p><font class="notetext" style="color:green;">Изменения сохранены</font></p></div>
<?//ShowError($arResult["strProfileError"]);
$text = str_replace(array("<br>", "<br />"), "", $arResult["strProfileError"]);
$text = str_replace('Пароль должен  быть не менее 8 символов длиной.Пароль должен содержать латинские символы верхнего регистра (A-Z).','Пароль должен быть не менее 8 символов длиной, содержать латинские прописные и строчные буквы <br />',$text);
$text = str_replace('Пароль должен  быть не менее 8 символов длиной.','Пароль должен  быть не менее 8 символов длиной.<br />',$text);
$text = str_replace('Пароль должен содержать латинские символы верхнего регистра (A-Z).','Пароль должен содержать латинские прописные и строчные буквы. <br />',$text);
//$text = str_replace('Пароль должен быть не менее 8 символов длиной.<br>Пароль должен содержать латинские символы верхнего регистра (A-Z).','Пароль должен быть не менее 8 символов длиной, содержать латинские прописные и строчные буквы.',$arResult["strProfileError"]);

ShowError($text);

/*$pass = $_REQUEST['pass']; //получаем введенный пароль
$login = CUser::GetLogin(); //получаем логин текущего юзера
$USERcheck = new CUser;
$check = $USERcheck->Login($login, $pass, 'N', 'Y');
print "<pre>";
print_r($check);
print "</pre>";
*/
?>


<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>

<?if($arResult["SHOW_SMS_FIELD"] == true):?>

<form method="post" action="<?=$arResult["FORM_TARGET"]?>">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
<table class="profile-table data-table">
	<tbody>
		<tr>
			<td><?echo GetMessage("main_profile_code")?><span class="starrequired">*</span></td>
			<td><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></td>
		</tr>
	</tbody>
</table>

<p><input type="submit" name="code_submit_button" value="<?echo GetMessage("main_profile_send")?>" /></p>

</form>

<script>
new BX.PhoneAuth({
	containerId: 'bx_profile_resend',
	errorContainerId: 'bx_profile_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?=CUtil::PhpToJSObject([
			'signedData' => $arResult["SIGNED_DATA"],
		])?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_profile_error');
			var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
			errorNode.innerHTML = '';
			for(var i = 0; i < response.errors.length; i++)
			{
				errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
			}
			errorDiv.style.display = '';
		}
});
</script>

<div id="bx_profile_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_profile_resend"></div>

<?else:?>

<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if (strlen($arResult["opened"]) > 0)
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>

<?/*<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">*/?>
    <form method="post" id="change_pass" name="form1" action="<?=$arResult["FORM_TARGET"]?>?" enctype="multipart/form-data">
        <?=$arResult["BX_SESSION_CHECK"]?>
        <input type="hidden" name="LOGIN" maxlength="50" value="<?=$arResult["arUser"]["LOGIN"]?>" />
        <input type="hidden" name="EMAIL" maxlength="50" placeholder="name@company.ru" value="<?=$arResult["arUser"]["EMAIL"]?>" />

        <input type="hidden" name="lang" value="<?=LANG?>" />
        <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

        <div class="r" style="margin-bottom: 30px"> 
            <div class="govuk-label"><?=GetMessage('NEW_PASSWORD_REQ')?><span class="star">*</span></div>
            <div class="error-pass"></div>
            <div class="govuk-error-message"></div>
            <input required type="password" name="NEW_PASSWORD" maxlength="50" value="" id='pass' autocomplete="off" class="bx-auth-input req-input" />
            <div class="pr"><?=GetMessage("PASSWORD_MIN_LENGTH")?></div>
        </div>

        <div class="r" style="margin-bottom: 30px">
            <div class="govuk-label"><?=GetMessage('NEW_PASSWORD_CONFIRM')?><span class="star">*</span></div>
            <div class="error-pass-conf"></div>
            <div class="govuk-error-message"></div>
            <input required type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" class="req-input" />
        </div>

        <div class="but-r">
            <button id="but_change" class="button30 govuk-button" type="submit" name="save" value="Смена пароля<?//=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>"><span><?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?></span></button>
            <div class="prompt">
                <span class="star">*</span> &nbsp;&mdash;&nbsp; <?=GetMessage("REQUIRED_FIELDS")?>
            </div>
            <div class="clearboth"></div>
            <?/*<a class="cancel"><?=GetMessage('MAIN_RESET');?></a>*/?>
        </div>

    </form>
<?
/*if($arResult["SOCSERV_ENABLED"])
{
	$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
			"SHOW_PROFILES" => "Y",
			"ALLOW_DELETE" => "Y"
		),
		false
	);
}*/
?>

<?endif?>
</div>

<?//endif;?>