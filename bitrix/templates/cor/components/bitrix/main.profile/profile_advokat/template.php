<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?// список полей из инфблока
CModule::IncludeModule("iblock");
$arFilterEditProfile = Array(
     "IBLOCK_ID"=>17, 
     "PROPERTY_USER"=>$arResult["ID"],
     "PROPERTY_*"
 );
$arSelectEditProfile = Array("ID", "IBLOCK_ID","IBLOCK_SECTION_ID", "NAME", "DATE_ACTIVE_FROM","DATE_ACTIVE_TO","DETAIL_TEXT","PREVIEW_TEXT", "DETAIL_PICTURE","PROPERTY_*");
$resEditProfile = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilterEditProfile, $arSelectEditProfile);
$countEditProfile = $resEditProfile->SelectedRowsCount();
                        
if ($countEditProfile>0):
                 
             $obEditProfile = $resEditProfile->GetNextElement();
             $arFieldsEditProfile = $obEditProfile->GetFields();  
             $arPropsEditProfile = $obEditProfile->GetProperties();
             // вид деятельности
             $arFilter = Array("ACTIVE"=>"Y", "IBLOCK_ID"=>21);
             $arSelect= Array("ID", "IBLOCK_ID", "NAME");
             $resEdit = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, $arSelect);   
             $SFERA_DET = array();
             while($enum_fields = $resEdit->GetNextElement()) {
                $SFERA_DET[$enum_fields->fields["ID"]] =  $enum_fields->fields["NAME"];
            }
?>

<div class="bx-auth-profile">
<div id="success" style="display: none;"><p><font class="notetext">Изменения сохранены</font></p></div>

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
<?CJSCore::Init(array("jquery","date"));?>
<form method="post" name="advokat_edit" id="advokat_edit" action="<?=$arResult["FORM_TARGET"]?>" onsubmit="return false" enctype="multipart/form-data">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
<input type="hidden" name="PROFILE_ID" value="<?=$arFieldsEditProfile["ID"]?>" />
<input type="hidden" name="query" value="advokat_edit" />


<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('personal')"><?=GetMessage("USER_PERSONAL_INFO")?></a></div>
<div id="user_div_personal" class="profile-block-<?=strpos($arResult["opened"], "personal") === false ? "hidden" : "shown"?>">
<table class="data-table profile-table">
	<thead>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
        <tr>
			<td>Телефон:</td>
			<td><input type="text" name="PHONE" maxlength="255" value="<?=$arPropsEditProfile["PHONE"]["VALUE"]?>" /></td>
		</tr>
        <tr>
			<td>О себе:</td>
			<td>
                 <div class="fields string">
                    <div class="fields string">
                        <?$APPLICATION->IncludeComponent("bitrix:fileman.light_editor","",Array(
                                "CONTENT" => $arFieldsEditProfile['~DETAIL_TEXT'],
                                "INPUT_NAME" => "DETAIL_TEXT",
                                "INPUT_ID" => "DETAIL_TEXT",
                                "WIDTH" => "100%",
                                "HEIGHT" => "300px",
                                "RESIZABLE" => "Y",
                                "AUTO_RESIZE" => "Y",
                                "VIDEO_ALLOW_VIDEO" => "N",
                                "VIDEO_MAX_WIDTH" => "640",
                                "VIDEO_MAX_HEIGHT" => "480",
                                "VIDEO_BUFFER" => "20",
                                "VIDEO_LOGO" => "",
                                "VIDEO_WMODE" => "transparent",
                                "VIDEO_WINDOWLESS" => "N",
                                "VIDEO_SKIN" => "/bitrix/components/bitrix/player/mediaplayer/skins/bitrix.swf",
                                "USE_FILE_DIALOGS" => "N",
                                "ID" => "",	
                                "JS_OBJ_NAME" => ""
                                )
                            );?>
                    </div>
                </div>
            </td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_WWW')?></td>
			<td><input type="text" name="SITE_LINK" maxlength="255" value="<?=$arPropsEditProfile["SITE_LINK"]["VALUE"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_ICQ')?></td>
			<td><input type="text" name="ISQ" maxlength="255" value="<?=$arPropsEditProfile["ISQ"]["VALUE"]?>" /></td>
		</tr>
        <tr>
			<td>Skype:</td>
			<td><input type="text" name="SKYPE" maxlength="255" value="<?=$arPropsEditProfile["SKYPE"]["VALUE"]?>" /></td>
		</tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="EMAIL_ADVO" maxlength="255" value="<?=$arPropsEditProfile["EMAIL"]["VALUE"]?>" /></td>
        </tr>
        <tr>
			<td>Номер свидетельства медиатора:</td>
			<td><input type="text" name="NOM_MEDIAT" maxlength="255" value="<?=$arPropsEditProfile["NOM_MEDIAT"]["VALUE"]?>" /></td>
		</tr>
        <tr>
			<td>Номер лицензии:</td>
			<td><input type="text" name="NOM_LIC" maxlength="255" value="<?=$arPropsEditProfile["NOM_LIC"]["VALUE"]?>" /></td>
		</tr>
        <tr>
			<td>Дата выдачи лицензии:</td>
			<td><input type="text" value="<?=$arPropsEditProfile["DATA_LIC"]["VALUE"]?>" name="DATA_LIC" onclick="BX.calendar({node: this, field: this, bTime: false});"></td>
		</tr>
        <tr>
			<td>Регистрационный номер:</td>
			<td><input type="text" name="REG_NOM" maxlength="255" value="<?=$arPropsEditProfile["REG_NOM"]["VALUE"]?>" /></td>
		</tr>
        <tr>
			<td>Начало юридической деятельности:</td>
			<td><input type="text" value="<?=$arPropsEditProfile["DATA_ADV"]["VALUE"]?>" name="DATA_ADV" onclick="BX.calendar({node: this, field: this, bTime: false});"></td>
		</tr>
        <tr>
			<td>Начало работы в адвокатуре:</td>
			<td><input type="text" value="<?=$arPropsEditProfile["DATA_YUR"]["VALUE"]?>" name="DATA_YUR" onclick="BX.calendar({node: this, field: this, bTime: false});"></td>
		</tr>
        <tr>
			<td>Индивидуальная деятельность:</td>
			<td><input type="checkbox" value="11" name="IND_DEYAT" <?if ($arPropsEditProfile["IND_DEYAT"]["VALUE_XML_ID"]=='Y'):?>checked=""<?endif;?>></td>
		</tr>
        <tr>
			<td>Основные сферы деятельности:</td>
			<td>
                <select name="SFERA_DET[]" multiple>
                    <option value="" title="нет">нет</option>
                    <?foreach ($SFERA_DET as $keydet=>$valdet):?>
                        <option <? if (in_array($keydet, $arPropsEditProfile["SFERA_DET"]["VALUE"])):?>selected=""<?endif;?> value="<?=$keydet?>"><?=$valdet?></option>
                    <?endforeach;?>
                </select>
            </td>
		</tr>
        <tr>
			<td>Доп.сферы деятельности:</td>
			<td>
                 <div class="fields string">
                    <div class="fields string">
                        <textarea cols="30" rows="5" name="DOP_SFERA"><?=$arPropsEditProfile["DOP_SFERA"]['~VALUE']['TEXT']?></textarea>
                    </div>
                </div>
            </td>
		</tr>
        <tr>
			<td>Иностранные языки:</td>
			<td>
                 <div class="fields string">
                    <div class="fields string">
                        <textarea cols="30" rows="5" name="LANG"><?=$arPropsEditProfile["LANG"]['~VALUE']['TEXT']?></textarea>
                    </div>
                </div>
            </td>
		</tr>
        
		
	</tbody>
</table>
</div>
 
	<p><input type="submit" id="buttonsubmit" onclick="create_service()" name="save" value="<?=GetMessage("MAIN_SAVE")?>"></p>
</form>
</div>
<script>
function create_service() {
         jQuery('#buttonsubmit').css('display','none');
            var form = document.forms.advokat_edit;
        
                    var formData = new FormData(form);  
          
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "<?=$templateFolder?>/ajax.php");
        
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if(xhr.status == 200) {
                                data = xhr.responseText;
                                if(data == 0) {
                                     alert('Не задан профиль адвоката');
                                     jQuery('#buttonsubmit').css('display','block');
                                } 
                                else if (data == 1) {
                                    jQuery('#success').show();
                                    jQuery('#buttonsubmit').css('display','block');
                                    jQuery('html, body').animate({
                                        scrollTop: jQuery("#success").offset().top
                                    }, 200);
                                }
                                else {
                                    alert(data);
                                }
                            }
                        }
                    };
                    
                    xhr.send(formData);
        }
</script>
<?endif;?>