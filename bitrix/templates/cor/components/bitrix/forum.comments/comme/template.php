<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
CUtil::InitJSCore(array('ajax'));
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
// ************************* Input params***************************************************************
?>
<div class="feed-wrap">
<div class="feed-comments-block">
	<a name="comments"></a>
<?
// *************************/Input params***************************************************************

$link = $APPLICATION->GetCurPageParam("MID=#ID#", array("MID", "sessid", "AJAX_POST", "ENTITY_XML_ID", "ENTITY_TYPE", "ENTITY_ID", "REVIEW_ACTION", "MODE", "FILTER", "result", "b24statAction"));

if (isset($arParams["PUBLIC_MODE"]) && $arParams["PUBLIC_MODE"])
{
	$editRight = "N";
}
else
{
	$editRight = (
		$arResult["PANELS"]["EDIT"] == "N"
			? (
				$arParams["ALLOW_EDIT_OWN_MESSAGE"] === "ALL"
					? "OWN"
					: ($arParams["ALLOW_EDIT_OWN_MESSAGE"] === "LAST" ? "OWNLAST" : "N")
			)
			: "Y"
	);
}?>

<?
foreach ($arResult["MESSAGES"] as $key=>$tmpval) {
    $resultQ = $DB->Query('SELECT * FROM `b_forum_message` WHERE `ID` ='.$tmpval['ID']);
    $row = $resultQ->Fetch();
    $arResult["MESSAGES"][$key]['AUTHOR']['NAME'] = $row['AUTHOR_NAME'];
}
?>
<?$arResult["OUTPUT_LIST"] = $APPLICATION->IncludeComponent(
	"bitrix:main.post.list",
	"",
	array(
		"TEMPLATE_ID" => $arParams["tplID"],
		"RATING_TYPE_ID" => ($arParams["SHOW_RATING"] == "Y" ? "FORUM_POST" : ""),
		"ENTITY_XML_ID" => $arParams["ENTITY_XML_ID"],
		"RECORDS" => $arResult["MESSAGES"],

		"NAV_STRING" => $arResult["NAV_STRING"],
		"NAV_RESULT" => $arResult["NAV_RESULT"],
		"PREORDER" => $arParams["PREORDER"],
		"RIGHTS" => array(
			"MODERATE" =>  $arResult["PANELS"]["MODERATE"],
			"EDIT" => $editRight,
			"DELETE" => $editRight
		),
		"VISIBLE_RECORDS_COUNT" => 3,

		"ERROR_MESSAGE" => $arResult["ERROR_MESSAGE"],
		"OK_MESSAGE" => $arResult["OK_MESSAGE"],
		"RESULT" => ($arResult["RESULT"] ?: $request->getQuery("MID")),
		"PUSH&PULL" => $arResult["PUSH&PULL"],
		"VIEW_URL" => ($arParams["SHOW_LINK_TO_MESSAGE"] == "Y" && !(isset($arParams["PUBLIC_MODE"]) && $arParams["PUBLIC_MODE"]) ? $link : ""),
		"EDIT_URL" => str_replace("?MID", "?MID2", ForumAddPageParams($link, array("REVIEW_ACTION" => "GET"), false, false)),
		"MODERATE_URL" => ForumAddPageParams($link, array("REVIEW_ACTION" => "#ACTION#"), false, false),
		"DELETE_URL" => ForumAddPageParams($link, array("REVIEW_ACTION" => "DEL"), false, false),
		"AUTHOR_URL" => $arParams["URL_TEMPLATES_PROFILE_VIEW"],

		"AVATAR_SIZE" => $arParams["AVATAR_SIZE_COMMENT"],
		"NAME_TEMPLATE" => $arParams["NAME_TEMPLATE"],
		"SHOW_LOGIN" => $arParams['SHOW_LOGIN'],

		"DATE_TIME_FORMAT" => $arParams["DATE_TIME_FORMAT"],
		"LAZYLOAD" => $arParams["LAZYLOAD"],

		"NOTIFY_TAG" => ($arParams["bFromList"] ? "BLOG|COMMENT" : ""),
		"NOTIFY_TEXT" => ($arParams["bFromList"] ? TruncateText(str_replace(Array("\r\n", "\n"), " ", $arParams["POST_DATA"]["~TITLE"]), 100) : ""),
		"SHOW_MINIMIZED" => $arParams["SHOW_MINIMIZED"],
		"SHOW_POST_FORM" => $arResult["SHOW_POST_FORM"],

		"IMAGE_SIZE" => $arParams["IMAGE_SIZE"],
		"BIND_VIEWER" => $arParams["BIND_VIEWER"],
		"mfi" => $arParams["mfi"],
		"bPublicPage" => (isset($arParams["PUBLIC_MODE"]) && $arParams["PUBLIC_MODE"])
	),
	$this->__component
);
?>

<?=$arResult["OUTPUT_LIST"]["HTML"]?><?
if ($arResult["SHOW_POST_FORM"] == "Y")
{
	include(__DIR__."/form.php");
}
?>
</div>
</div>