<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Настройки пользователя");
?>
<?
global $USER; $show_more = false;
$arGroups = $USER->GetUserGroupArray();
if (in_array(1, $arGroups) || in_array(10, $arGroups)) $show_more = true;
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	"profile_for_all", 
	array(
		"SET_TITLE" => "Y",
		"COMPONENT_TEMPLATE" => "profile_for_all",
		
		"SEND_INFO" => "Y",
		"CHECK_RIGHTS" => "N",
		"USER_PROPERTY_NAME" => ""
	),
	false
);?>

<?if ($show_more):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	"profile_advokat", 
	array(
		"SET_TITLE" => "Y",
		"COMPONENT_TEMPLATE" => "profile_advokat",
		"SEND_INFO" => "N",
		"CHECK_RIGHTS" => "N",
		"USER_PROPERTY_NAME" => ""
	),
	false
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile", 
	"profile_bottom", 
	array(
		"SET_TITLE" => "Y",
		"COMPONENT_TEMPLATE" => "profile_bottom",
		"SEND_INFO" => "Y",
		"CHECK_RIGHTS" => "N",
		"USER_PROPERTY_NAME" => ""
	),
	false
);?>
<?endif;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>