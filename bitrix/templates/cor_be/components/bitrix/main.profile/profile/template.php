<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

//global $USER;
//echo $id_user=$USER->GetID();
//$arGroups = CUser::GetUserGroup($id_user);
//echo "<pre>"; print_r($arGroups); echo "</pre>";


$arGroupAvalaible = array(1,10,6,7,8); // массив групп, которые в которых нужно проверить доступность пользователя
$arGroups = CUser::GetUserGroup($USER->GetID()); // массив групп, в которых состоит пользователь
$result_user = array_intersect($arGroupAvalaible, $arGroups);// далее проверяем, если пользователь вошёл хотя бы в одну из групп, то позволяем ему что-либо делать
//if(!empty($result_intersect)):     print "мне разрешено находится на данной странице или просматривать данную часть страницы";endif;
//echo in_array($group_id, CUser::GetUserGroup($user_id));
?>

<div class="bx-auth-profile">

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
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
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("REG_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('reg')"><?=GetMessage("REG_SHOW_HIDE")?></a></div>
<div class="profile-block-<?=strpos($arResult["opened"], "reg") === false ? "hidden" : "shown"?>" id="user_div_reg">
<table class="profile-table data-table">
	<thead>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
	<?
	if($arResult["ID"]>0)
	{
	?>
		<?
		if (strlen($arResult["arUser"]["TIMESTAMP_X"])>0)
		{
		?>
		<tr>
			<td><?=GetMessage('LAST_UPDATE')?></td>
			<td><?=$arResult["arUser"]["TIMESTAMP_X"]?></td>
		</tr>
		<?
		}
		?>
		<?
		if (strlen($arResult["arUser"]["LAST_LOGIN"])>0)
		{
		?>
		<tr>
			<td><?=GetMessage('LAST_LOGIN')?></td>
			<td><?=$arResult["arUser"]["LAST_LOGIN"]?></td>
		</tr>
		<?
		}
		?>
	<?
	}
	?>
    <?/*<tr>
		<td><?echo GetMessage("main_profile_title")?></td>
		<td><input type="text" name="TITLE" value="<?=$arResult["arUser"]["TITLE"]?>" /></td>
	</tr>*/?>
	<tr>
		<td>Имя:</td>
		<td><input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('LAST_NAME')?></td>
		<td><input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('SECOND_NAME')?></td>
		<td><input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('EMAIL')?><?if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?endif?></td>
		<td><input type="text" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('LOGIN')?><span class="starrequired">*</span></td>
		<td><input type="text" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" /></td>
	</tr>
<?if($arResult['CAN_EDIT_PASSWORD']):?>
	<tr>
		<td><?=GetMessage('NEW_PASSWORD_REQ')?></td>
		<td><input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = 'inline-block';
</script>
		</td>
	</tr>
<?endif?>
	<tr>
		<td><?=GetMessage('NEW_PASSWORD_CONFIRM')?></td>
		<td><input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" /></td>
	</tr>
<?endif?>
<?if($arResult["TIME_ZONE_ENABLED"] == true):?>
	<tr>
		<td colspan="2" class="profile-header"><?echo GetMessage("main_profile_time_zones")?></td>
	</tr>
	<tr>
		<td><?echo GetMessage("main_profile_time_zones_auto")?></td>
		<td>
			<select name="AUTO_TIME_ZONE" onchange="this.form.TIME_ZONE.disabled=(this.value != 'N')">
				<option value=""><?echo GetMessage("main_profile_time_zones_auto_def")?></option>
				<option value="Y"<?=($arResult["arUser"]["AUTO_TIME_ZONE"] == "Y"? ' SELECTED="SELECTED"' : '')?>><?echo GetMessage("main_profile_time_zones_auto_yes")?></option>
				<option value="N"<?=($arResult["arUser"]["AUTO_TIME_ZONE"] == "N"? ' SELECTED="SELECTED"' : '')?>><?echo GetMessage("main_profile_time_zones_auto_no")?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td><?echo GetMessage("main_profile_time_zones_zones")?></td>
		<td>
			<select name="TIME_ZONE"<?if($arResult["arUser"]["AUTO_TIME_ZONE"] <> "N") echo ' disabled="disabled"'?>>
<?foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name):?>
				<option value="<?=htmlspecialcharsbx($tz)?>"<?=($arResult["arUser"]["TIME_ZONE"] == $tz? ' SELECTED="SELECTED"' : '')?>><?=htmlspecialcharsbx($tz_name)?></option>
<?endforeach?>
			</select>
		</td>
	</tr>
<?endif?>
	</tbody>
</table>
</div>
<?if(!empty($result_user)){?>
<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('personal')"><?=GetMessage("USER_PERSONAL_INFO")?></a></div>
<div id="user_div_personal" class="profile-block-<?=strpos($arResult["opened"], "personal") === false ? "hidden" : "shown"?>">
<table class="data-table profile-table">
	<thead>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
        <?/*<tr>
			<td><?=GetMessage('USER_PROFESSION')?></td>
			<td><input type="text" name="PERSONAL_PROFESSION" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PROFESSION"]?>" /></td>
		</tr>*/?>
		<tr>
			<td><?=GetMessage('USER_WWW')?></td>
			<td><input type="text" name="PERSONAL_WWW" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_WWW"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_ICQ')?></td>
			<td><input type="text" name="PERSONAL_ICQ" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_ICQ"]?>" /></td>
		</tr>
    <?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
        <?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>

            <?if($FIELD_NAME == 'UF_OLD_ID'){continue;}?>
            <?if($FIELD_NAME == 'UF_OLD_LINK'){continue;}?>
            <tr><td class="field-name">
                    <?if ($arUserField["MANDATORY"]=="Y"):?>
                        <span class="starrequired">*</span>
                    <?endif;?>
                    <?=$arUserField["EDIT_FORM_LABEL"]?>:
                    <?$date1 = date("m/d/Y");
                    $date2 = date("Y-m-d");
                    ?>
                    <?if($FIELD_NAME == 'UF_DATELIC'){?><div class="description"> Например, <?=$date1?></div><?}?>
                    <?if($FIELD_NAME == 'UF_STARTUR'){?><div class="description"> Например, <?=$date2?></div><?}?>
                    <?if($FIELD_NAME == 'UF_STARTAD'){?><div class="description"> Например, <?=$date2?></div><?}?>
                </td>

                <td class="field-value">
                    <?/*if($FIELD_NAME == 'UF_DOPSFER'){?>
                        <div class="fields string" id="main_UF_DOPSFER">
                            <div class="fields string">
                                <textarea cols="30" rows="5" name="UF_DOPSFER"></textarea>
                            </div>
                        </div>
                    <?}elseif($FIELD_NAME == 'UF_LANGD'){?>
                        <div class="fields string" id="main_UF_LANGD">
                            <div class="fields string">
                                <textarea cols="30" rows="5" name="UF_LANGD"></textarea>
                            </div>
                        </div>
                    <?}else{*/?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:system.field.edit",
                        $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                        array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"Y"));?>
                    <?//}?>
                </td>
                </tr>
        <?endforeach;?>
    <?endif;?>
        <tr>
            <td><?=GetMessage("USER_WORK_PROFILE")?></td>
            <td><textarea cols="30" rows="5" name="WORK_PROFILE"><?=$arResult["arUser"]["WORK_PROFILE"]?></textarea></td>
        </tr>
        <tr>
            <td><?=GetMessage("USER_NOTES")?></td>
            <td><textarea cols="30" rows="5" name="PERSONAL_NOTES"><?=$arResult["arUser"]["PERSONAL_NOTES"]?></textarea></td>
        </tr>
        <?/*<tr>
			<td><?=GetMessage('USER_GENDER')?></td>
			<td><select name="PERSONAL_GENDER">
				<option value=""><?=GetMessage("USER_DONT_KNOW")?></option>
				<option value="M"<?=$arResult["arUser"]["PERSONAL_GENDER"] == "M" ? " SELECTED=\"SELECTED\"" : ""?>><?=GetMessage("USER_MALE")?></option>
				<option value="F"<?=$arResult["arUser"]["PERSONAL_GENDER"] == "F" ? " SELECTED=\"SELECTED\"" : ""?>><?=GetMessage("USER_FEMALE")?></option>
			</select></td>
		</tr>
		<tr>
			<td><?=GetMessage("USER_BIRTHDAY_DT")?> (<?=$arResult["DATE_FORMAT"]?>):</td>
			<td><?
			$APPLICATION->IncludeComponent(
				'bitrix:main.calendar',
				'',
				array(
					'SHOW_INPUT' => 'Y',
					'FORM_NAME' => 'form1',
					'INPUT_NAME' => 'PERSONAL_BIRTHDAY',
					'INPUT_VALUE' => $arResult["arUser"]["PERSONAL_BIRTHDAY"],
					'SHOW_TIME' => 'N'
				),
				null,
				array('HIDE_ICONS' => 'Y')
			);

			//=CalendarDate("PERSONAL_BIRTHDAY", $arResult["arUser"]["PERSONAL_BIRTHDAY"], "form1", "15")
			?></td>
		</tr>*/?>
		<tr>
			<td><?=GetMessage("USER_PHOTO")?></td>
			<td>
			<?=$arResult["arUser"]["PERSONAL_PHOTO_INPUT"]?>
			<?
			if (strlen($arResult["arUser"]["PERSONAL_PHOTO"])>0)
			{
			?>
			<br />
				<?=$arResult["arUser"]["PERSONAL_PHOTO_HTML"]?>
			<?
			}
			?></td>
		<tr>
			<td colspan="2" class="profile-header"><?=GetMessage("USER_PHONES")?></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_PHONE')?></td>
			<td><input type="text" name="PERSONAL_PHONE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_FAX')?></td>
			<td><input type="text" name="PERSONAL_FAX" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_FAX"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_MOBILE')?></td>
			<td><input type="text" name="PERSONAL_MOBILE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_MOBILE"]?>" /></td>
		</tr>
        <?/*<tr>
			<td><?=GetMessage('USER_PAGER')?></td>
			<td><input type="text" name="PERSONAL_PAGER" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PAGER"]?>" /></td>
		</tr>*/?>
		<tr>
			<td colspan="2" class="profile-header"><?=GetMessage("USER_POST_ADDRESS")?></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_COUNTRY')?></td>
			<td><?=$arResult["COUNTRY_SELECT"]?></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_STATE')?></td>
			<td><input type="text" name="PERSONAL_STATE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_STATE"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_CITY')?></td>
			<td><input type="text" name="PERSONAL_CITY" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_CITY"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_ZIP')?></td>
			<td><input type="text" name="PERSONAL_ZIP" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_ZIP"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage("USER_STREET")?></td>
			<td><textarea cols="30" rows="5" name="PERSONAL_STREET"><?=$arResult["arUser"]["PERSONAL_STREET"]?></textarea></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_MAILBOX')?></td>
			<td><input type="text" name="PERSONAL_MAILBOX" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_MAILBOX"]?>" /></td>
		</tr>
	</tbody>
</table>
</div>
    <?// ********************* User properties ***************************************************?>
    <?/*if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
    <div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('user_properties')"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></a></div>
    <div id="user_div_user_properties" class="profile-block-<?=strpos($arResult["opened"], "user_properties") === false ? "hidden" : "shown"?>">
        <table class="data-table profile-table">
            <thead>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            </thead>
            <tbody>
            <?$first = true;?>

            <?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>

                <?if($FIELD_NAME == 'UF_OLD_ID'){continue;}?>
                <?if($FIELD_NAME == 'UF_OLD_LINK'){continue;}?>
                <tr><td class="field-name">
                        <?if ($arUserField["MANDATORY"]=="Y"):?>
                            <span class="starrequired">*</span>
                        <?endif;?>
                        <?=$arUserField["EDIT_FORM_LABEL"]?>:
                <?$date1 = date("m/d/Y");
                  $date2 = date("Y-m-d");
                  ?>
                <?if($FIELD_NAME == 'UF_DATELIC'){?><div class="description"> Например, <?=$date1?></div><?}?>
                <?if($FIELD_NAME == 'UF_STARTUR'){?><div class="description"> Например, <?=$date2?></div><?}?>
                <?if($FIELD_NAME == 'UF_STARTAD'){?><div class="description"> Например, <?=$date2?></div><?}?>
                    </td>
                    <td class="field-value">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:system.field.edit",
                            $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                            array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
            <?endforeach;?>
            </tbody>
        </table>
    </div>
    <?endif;*/?>
    <?// ******************** /User properties ***************************************************?>
    <?/*<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('work')"><?=GetMessage("USER_WORK_INFO")?></a></div>
<div id="user_div_work" class="profile-block-<?=strpos($arResult["opened"], "work") === false ? "hidden" : "shown"?>">
<table class="data-table profile-table">
	<thead>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=GetMessage('USER_COMPANY')?></td>
			<td><input type="text" name="WORK_COMPANY" maxlength="255" value="<?=$arResult["arUser"]["WORK_COMPANY"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_WWW')?></td>
			<td><input type="text" name="WORK_WWW" maxlength="255" value="<?=$arResult["arUser"]["WORK_WWW"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_DEPARTMENT')?></td>
			<td><input type="text" name="WORK_DEPARTMENT" maxlength="255" value="<?=$arResult["arUser"]["WORK_DEPARTMENT"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_POSITION')?></td>
			<td><input type="text" name="WORK_POSITION" maxlength="255" value="<?=$arResult["arUser"]["WORK_POSITION"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage("USER_WORK_PROFILE")?></td>
			<td><textarea cols="30" rows="5" name="WORK_PROFILE"><?=$arResult["arUser"]["WORK_PROFILE"]?></textarea></td>
		</tr>
		<tr>
			<td><?=GetMessage("USER_LOGO")?></td>
			<td>
			<?=$arResult["arUser"]["WORK_LOGO_INPUT"]?>
			<?
			if (strlen($arResult["arUser"]["WORK_LOGO"])>0)
			{
			?>
				<br /><?=$arResult["arUser"]["WORK_LOGO_HTML"]?>
			<?
			}
			?></td>
		</tr>
		<tr>
			<td colspan="2" class="profile-header"><?=GetMessage("USER_PHONES")?></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_PHONE')?></td>
			<td><input type="text" name="WORK_PHONE" maxlength="255" value="<?=$arResult["arUser"]["WORK_PHONE"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_FAX')?></td>
			<td><input type="text" name="WORK_FAX" maxlength="255" value="<?=$arResult["arUser"]["WORK_FAX"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_PAGER')?></td>
			<td><input type="text" name="WORK_PAGER" maxlength="255" value="<?=$arResult["arUser"]["WORK_PAGER"]?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="profile-header"><?=GetMessage("USER_POST_ADDRESS")?></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_COUNTRY')?></td>
			<td><?=$arResult["COUNTRY_SELECT_WORK"]?></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_STATE')?></td>
			<td><input type="text" name="WORK_STATE" maxlength="255" value="<?=$arResult["arUser"]["WORK_STATE"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_CITY')?></td>
			<td><input type="text" name="WORK_CITY" maxlength="255" value="<?=$arResult["arUser"]["WORK_CITY"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_ZIP')?></td>
			<td><input type="text" name="WORK_ZIP" maxlength="255" value="<?=$arResult["arUser"]["WORK_ZIP"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage("USER_STREET")?></td>
			<td><textarea cols="30" rows="5" name="WORK_STREET"><?=$arResult["arUser"]["WORK_STREET"]?></textarea></td>
		</tr>
		<tr>
			<td><?=GetMessage('USER_MAILBOX')?></td>
			<td><input type="text" name="WORK_MAILBOX" maxlength="255" value="<?=$arResult["arUser"]["WORK_MAILBOX"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage("USER_NOTES")?></td>
			<td><textarea cols="30" rows="5" name="WORK_NOTES"><?=$arResult["arUser"]["WORK_NOTES"]?></textarea></td>
		</tr>
	</tbody>
</table>
</div>*/?>
	<?
	if ($arResult["INCLUDE_FORUM"] == "Y")
	{
	?>

<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('forum')"><?=GetMessage("forum_INFO")?></a></div>
<div id="user_div_forum" class="profile-block-<?=strpos($arResult["opened"], "forum") === false ? "hidden" : "shown"?>">
<table class="data-table profile-table">
	<thead>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
    <?php
    /*print "<pre>";
    print_r($arResult["arForumUser"]);
    print "</pre>";*/
    ?>

		<tr>
			<td><?=GetMessage("forum_SHOW_NAME")?></td>
			<td><input type="hidden" name="forum_SHOW_NAME" value="N" /><input type="checkbox" name="forum_SHOW_NAME" value="Y" <?if ($arResult["arForumUser"]["SHOW_NAME"]=="Y") echo "checked=\"checked\"";?> /></td>
		</tr>
    <tr>
        <td><?=GetMessage("forum_ALLOW_POST")?></td>
        <td><input type="hidden" name="forum_ALLOW_POST" value="N" /><input type="checkbox" name="forum_ALLOW_POST" value="Y" <?if ($arResult["arForumUser"]["ALLOW_POST"]=="Y") echo "checked=\"checked\"";?> /></td>
    </tr>
    <tr>
        <td>Не показывать в списке "Сейчас на форуме"</td>
        <td><input type="hidden" name="forum_HIDE_FROM_ONLINE" value="N" /><input type="checkbox" name="forum_HIDE_FROM_ONLINE" value="Y" <?if ($arResult["arForumUser"]["HIDE_FROM_ONLINE"]=="Y") echo "checked=\"checked\"";?> /></td>
    </tr>
    <tr>
        <td>Включать свои сообщения в рассылку</td>
        <td><input type="hidden" name="forum_SUBSC_GET_MY_MESSAGE" value="N" /><input type="checkbox" name="forum_SUBSC_GET_MY_MESSAGE" value="Y" <?if ($arResult["arForumUser"]["SUBSC_GET_MY_MESSAGE"]=="Y") echo "checked=\"checked\"";?> /></td>
    </tr>
		<tr>
			<td><?=GetMessage('forum_DESCRIPTION')?></td>
			<td><input type="text" name="forum_DESCRIPTION" maxlength="255" value="<?=$arResult["arForumUser"]["DESCRIPTION"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('forum_INTERESTS')?></td>
			<td><textarea cols="30" rows="5" name="forum_INTERESTS"><?=$arResult["arForumUser"]["INTERESTS"]; ?></textarea></td>
		</tr>
		<tr>
			<td><?=GetMessage("forum_SIGNATURE")?></td>
			<td><textarea cols="30" rows="5" name="forum_SIGNATURE"><?=$arResult["arForumUser"]["SIGNATURE"]; ?></textarea></td>
		</tr>
		<tr>
			<td><?=GetMessage("forum_AVATAR")?></td>
			<td><?=$arResult["arForumUser"]["AVATAR_INPUT"]?>
			<?
			if (strlen($arResult["arForumUser"]["AVATAR"])>0)
			{
			?>
				<br /><?=$arResult["arForumUser"]["AVATAR_HTML"]?>
			<?
			}
			?></td>
		</tr>
	</tbody>
</table>
</div>

	<?
	}
	?>
	<?
	/*if ($arResult["INCLUDE_BLOG"] == "Y")
	{
	?>
<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('blog')"><?=GetMessage("blog_INFO")?></a></div>
<div id="user_div_blog" class="profile-block-<?=strpos($arResult["opened"], "blog") === false ? "hidden" : "shown"?>">
<table class="data-table profile-table">
	<thead>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=GetMessage('blog_ALIAS')?></td>
			<td><input class="typeinput" type="text" name="blog_ALIAS" maxlength="255" value="<?=$arResult["arBlogUser"]["ALIAS"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('blog_DESCRIPTION')?></td>
			<td><input class="typeinput" type="text" name="blog_DESCRIPTION" maxlength="255" value="<?=$arResult["arBlogUser"]["DESCRIPTION"]?>" /></td>
		</tr>
		<tr>
			<td><?=GetMessage('blog_INTERESTS')?></td>
			<td><textarea cols="30" rows="5" class="typearea" name="blog_INTERESTS"><?echo $arResult["arBlogUser"]["INTERESTS"]; ?></textarea></td>
		</tr>
		<tr>
			<td><?=GetMessage("blog_AVATAR")?></td>
			<td><?=$arResult["arBlogUser"]["AVATAR_INPUT"]?>
			<?
			if (strlen($arResult["arBlogUser"]["AVATAR"])>0)
			{
			?>
				<br /><?=$arResult["arBlogUser"]["AVATAR_HTML"]?>
			<?
			}
			?></td>
		</tr>
	</tbody>
</table>
</div>
	<?
	}*/
	?>
    <div class="profile-link profile-user-div-link">
        <a href="/personal/add-blog/" class="root-item-selected">Написать в блог</a>
    </div>
    <div class="profile-link profile-user-div-link">
        <a href="/personal/your_comments/" class="root-item-selected">Читать комментарии</a>
    </div>
	<?if ($arResult["INCLUDE_LEARNING"] == "Y"):?>
	<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('learning')"><?=GetMessage("learning_INFO")?></a></div>
	<div id="user_div_learning" class="profile-block-<?=strpos($arResult["opened"], "learning") === false ? "hidden" : "shown"?>">
	<table class="data-table profile-table">
		<thead>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?=GetMessage("learning_PUBLIC_PROFILE");?>:</td>
				<td><input type="hidden" name="student_PUBLIC_PROFILE" value="N" /><input type="checkbox" name="student_PUBLIC_PROFILE" value="Y" <?if ($arResult["arStudent"]["PUBLIC_PROFILE"]=="Y") echo "checked=\"checked\"";?> /></td>
			</tr>
			<tr>
				<td><?=GetMessage("learning_RESUME");?>:</td>
				<td><textarea cols="30" rows="5" name="student_RESUME"><?=$arResult["arStudent"]["RESUME"]; ?></textarea></td>
			</tr>

			<tr>
				<td><?=GetMessage("learning_TRANSCRIPT");?>:</td>
				<td><?=$arResult["arStudent"]["TRANSCRIPT"];?>-<?=$arResult["ID"]?></td>
			</tr>
		</tbody>
	</table>
	</div>
	<?endif;?>
	<?if($arResult["IS_ADMIN"]):?>
	<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('admin')"><?=GetMessage("USER_ADMIN_NOTES")?></a></div>
	<div id="user_div_admin" class="profile-block-<?=strpos($arResult["opened"], "admin") === false ? "hidden" : "shown"?>">
	<table class="data-table profile-table">
		<thead>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?=GetMessage("USER_ADMIN_NOTES")?>:</td>
				<td><textarea cols="30" rows="5" name="ADMIN_NOTES"><?=$arResult["arUser"]["ADMIN_NOTES"]?></textarea></td>
			</tr>
		</tbody>
	</table>
	</div>
	<?endif;?>
<?}?>
    <div class="profile-link profile-user-div-link">
        <a href="/personal/subscribe/" class="root-item-selected">Подписка</a>
    </div>
    <p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
    <?if(!empty($result_user)){
        $arr = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ];
        $month = date('n')-1;
        $month_prev = date('n')-2;
        $month_prev2 = date('n')-3;
        $month_prev3 = date('n')-4;
        $month_prev4 = date('n')-10;
        $month_min = date("Y-m-01");
        $month_max = date("Y-m-d");
        $month_prev_min = date("Y-m-01", strtotime("-1 month"));
        $month_prev_max = date("Y-m-t", strtotime("-1 month"));
        $month_prev2_min = date("Y-m-01", strtotime("-2 month"));
        $month_prev2_max = date("Y-m-t", strtotime("-2 month"));
        $month_prev3_min = date("Y-m-01", strtotime("-9 month"));
        $month_prev3_max = date("Y-m-t", strtotime("-3 month"));
        //echo $arr[$month];
       /* print "<pre>";
        print_r($arr[$month_prev4]);
        print "</pre>";*/
        ?>
        <h2>Скачать отчет за: </h2>
        <div class="col-md-12" style="overflow: hidden;">
            <div class="col-md-6">
                <a id="save_pdf" href="/personal/answered/?search_date=Y&date_filter_min=<?echo $month_prev2_min?>&date_filter_max=<?echo $month_prev2_max?>" style="color:#fff" class="add_blog save_pdf"><?echo $arr[$month_prev2]?></a>
            </div>
            <div class="col-md-6">
                <a id="save_pdf" href="/personal/answered/?search_date=Y&date_filter_min=<?echo $month_prev_min?>&date_filter_max=<?echo $month_prev_max?>" style="color:#fff" class="add_blog save_pdf"><?echo $arr[$month_prev]?></a>
            </div>
            <div class="col-md-6">
                <a id="save_pdf" href="/personal/answered/?search_date=Y&date_filter_min=<?echo $month_min?>&date_filter_max=<?echo $month_max?>" style="color:#fff" class="add_blog save_pdf"><?echo $arr[$month]?></a>
            </div>
        </div>
        <div class="col-md-12" style="overflow: hidden;">
            <div class="col-md-6">
                <a id="save_pdf" href="/personal/answered/?search_date=Y&date_filter_min=<?echo $month_prev3_min?>&date_filter_max=<?echo $month_prev3_max?>" style="color:#fff" class="add_blog save_pdf"> <?echo $arr[$month_prev4]?> - <?echo $arr[$month_prev3]?></a>
            </div>
        </div>
        <script src='/bitrix/templates/cor/components/bitrix/main.profile/profile/js/pdfmake.min.js'></script>
        <script src='/bitrix/templates/cor/components/bitrix/main.profile/profile/js/vfs_fonts.js'></script>
        <script>
            jQuery(document).ready(function ($) {
                jQuery(".save_pdf").on("click", function(){
                    event.preventDefault();
                    var docInfo = {
                        info: {
                            title:'Тестовый документ PDF',
                            author:'Viktor',
                            subject:'Theme',
                            keywords:'Ключевые слова'
                        },
                        pageSize:'A4',
                        pageOrientation:'portrait',//'portrait'
                        pageMargins:[50,50,30,60],

                        header:function(currentPage,pageCount) {
                            return {
                                text: currentPage.toString() + 'из' + pageCount,
                                alignment:'right',
                                margin:[0,30,10,50]
                            }
                        },
                        footer:[
                            {
                                text:'Сгенерировано на rka.by | Разработано Artismedia.by',
                                alignment:'center',//left  right
                            }
                        ],
                        content: [
                            {
                                text:'-Отчет за месяц-',
                                fontSize:20,
                                margin:[10,10,0,0]
                                //pageBreak:'after'
                            },
                            {
                                text:'-----------------------------------------------------------------------------',
                                fontSize:20,
                                margin:[0,0,20,0]
                                //pageBreak:'after'
                            },
                            {
                                text: [
                                    '',
                                    { text: 'Все вопросы', link: this.href, decoration: 'underline', cursor:'pointer', margin:"10,10,0,0"}

                                ]
                            },
                        ],
                        styles: {
                            header: {
                                fontSize:25,
                                bold:true,
                                alignment:'right'
                            }
                        }
                    }

                    pdfMake.createPdf(docInfo).download('name.pdf');
                    /*event.preventDefault();
                    var doc = new jsPDF();
                    doc.addFont('/bitrix/templates/cor/components/bitrix/main.profile/profile/PTSans.ttf', 'PTSans', 'normal');
                    doc.setFont('PTSans'); // set font
                    doc.setFontSize(10);
                    var href = this.href;
                    //var texr = '<a href="'+href+'">Все вопросы</a>';
                    doc.text('Отчет за месяц\n' + 'Сгенерировано на сайте rka.by | Разработано Artismedia', 10, 10);
                    //doc.text(texr, 10, 10);
                    console.log(doc);
                    doc.save('a4.pdf')*/
                });
            });

        </script>

    <?}?>
	<p><input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">&nbsp;&nbsp;<input type="reset" value="<?=GetMessage('MAIN_RESET');?>"></p>
</form>
<?/*
if($arResult["SOCSERV_ENABLED"])
{
	$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
			"SHOW_PROFILES" => "Y",
			"ALLOW_DELETE" => "Y"
		),
		false
	);
}*/
?>
</div>