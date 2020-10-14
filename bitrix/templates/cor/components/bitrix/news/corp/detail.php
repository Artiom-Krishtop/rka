<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if(!\Bitrix\Main\Loader::includeModule('art.corp'))
	return;

// popup gallery
require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/include/popupgallery.php');

$ElementID = $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	$arParams['ARCORP_DETAIL_TEMPLATES'],
	Array(
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"USE_SHARE" 			=> $arParams["USE_SHARE"],
		"SHARE_HIDE" 			=> $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" 		=> $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" 		=> $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
		// corp
		"ARCORP_PROP_MARKER_TEXT"		=> $arParams["ARCORP_PROP_MARKER_TEXT_DETAIL"],
		"ARCORP_PROP_MARKER_COLOR"		=> $arParams["ARCORP_PROP_MARKER_COLOR_DETAIL"],
		"ARCORP_PROP_ACTION_DATE"		=> $arParams["ARCORP_PROP_ACTION_DATE_DETAIL"],
		"ARCORP_PROP_MORE_PHOTO" 		=> $arParams["ARCORP_PROP_MORE_PHOTO"],
	),
	$component
);


?><div class="row backshare"><?
	?><div class="col col-md-6"><?
		?><a class="detailback" href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"]?>"><i class="fa"></i><span><?=GetMessage("AR.CORP.BACK")?></span></a><?
	?></div><?
	
?></div>
<?if ($arParams['IBLOCK_ID']!=35):?>
<div class="row backshare">
<!--<div class="col col-md-12">
    <a class="archive" href="/infotsentr/archive/"><span>Архив новостей</span></a>
</div>-->
</div>
<?endif;?>
<?


if( IsModuleInstalled('subscribe') && $arParams['ARCORP_DETAIL_USE_SUBSCRIBE']=='Y' && $arParams['ARCORP_DETAIL_SUBSCRIBE_PAGE']!='' ) {
	$APPLICATION->IncludeComponent(
		"bitrix:subscribe.form", 
		"detail", 
		array(
			"COMPONENT_TEMPLATE" => "detail",
			"USE_PERSONALIZATION" => "Y",
			"SHOW_HIDDEN" => "N",
			"PAGE" => $arParams['ARCORP_DETAIL_SUBSCRIBE_PAGE'],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"ARCORP_DETAIL_SUBSCRIBE_NOTE" => $arParams["ARCORP_DETAIL_SUBSCRIBE_NOTE"],
		),
		$component,
		array('HIDE_ICONS'=>'Y')
	);
}


/*if( $arParams['ARCORP_LIST_TEMPLATES_DETAIL_USE']=='Y' ) {
	$APPLICATION->IncludeComponent(
		"bitrix:news.list", 
		$arParams['ARCORP_LIST_TEMPLATES_DETAIL'],
		array(
			"IBLOCK_TYPE"	=>	$arParams["IBLOCK_TYPE"],
			"IBLOCK_ID"	=>	$arParams["IBLOCK_ID"],
			"NEWS_COUNT"	=>	$arParams["NEWS_COUNT"],
			"SORT_BY1"	=>	$arParams["SORT_BY1"],
			"SORT_ORDER1"	=>	$arParams["SORT_ORDER1"],
			"SORT_BY2"	=>	$arParams["SORT_BY2"],
			"SORT_ORDER2"	=>	$arParams["SORT_ORDER2"],
			"FIELD_CODE"	=>	$arParams["LIST_FIELD_CODE"],
			"PROPERTY_CODE"	=>	$arParams["LIST_PROPERTY_CODE"],
			"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
			"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"IBLOCK_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
			"DISPLAY_PANEL"	=>	$arParams["DISPLAY_PANEL"],
			"SET_TITLE"	=>	"N",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN"	=>	"N",
			"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
			"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
			"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"DISPLAY_TOP_PAGER"	=>	"N",
			"DISPLAY_BOTTOM_PAGER"	=>	"N",
			"PAGER_TITLE"	=>	$arParams["PAGER_TITLE"],
			"PAGER_TEMPLATE"	=>	$arParams["PAGER_TEMPLATE"],
			"PAGER_SHOW_ALWAYS"	=>	$arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_DESC_NUMBERING"	=>	$arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME"	=>	$arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"DISPLAY_DATE"	=>	$arParams["DISPLAY_DATE"],
			"DISPLAY_NAME"	=>	"Y",
			"DISPLAY_PICTURE"	=>	$arParams["DISPLAY_PICTURE"],
			"DISPLAY_PREVIEW_TEXT"	=>	$arParams["DISPLAY_PREVIEW_TEXT"],
			"PREVIEW_TRUNCATE_LEN"	=>	$arParams["PREVIEW_TRUNCATE_LEN"],
			"ACTIVE_DATE_FORMAT"	=>	$arParams["LIST_ACTIVE_DATE_FORMAT"],
			"USE_PERMISSIONS"	=>	$arParams["USE_PERMISSIONS"],
			"GROUP_PERMISSIONS"	=>	$arParams["GROUP_PERMISSIONS"],
			"FILTER_NAME"	=>	$arParams["FILTER_NAME"],
			"HIDE_LINK_WHEN_NO_DETAIL"	=>	$arParams["HIDE_LINK_WHEN_NO_DETAIL"],
			"CHECK_DATES"	=>	$arParams["CHECK_DATES"],
			// corp
			"ARCORP_SHOW_BLOCK_NAME"		=> $arParams["ARCORP_SHOW_BLOCK_NAME_DETAIL"],
			"ARCORP_BLOCK_NAME_IS_LINK"		=> $arParams["ARCORP_BLOCK_NAME_IS_LINK_DETAIL"],
			"ARCORP_USE_OWL"				=> $arParams["ARCORP_USE_OWL_DETAIL"],
			"ARCORP_OWL_CHANGE_SPEED"		=> $arParams["ARCORP_OWL_CHANGE_SPEED_DETAIL"],
			"ARCORP_OWL_CHANGE_DELAY"		=> $arParams["ARCORP_OWL_CHANGE_DELAY_DETAIL"],
			"ARCORP_OWL_PHONE"				=> $arParams["ARCORP_OWL_PHONE_DETAIL"],
			"ARCORP_OWL_TABLET"				=> $arParams["ARCORP_OWL_TABLET_DETAIL"],
			"ARCORP_OWL_PC"					=> $arParams["ARCORP_OWL_PC_DETAIL"],
			"ARCORP_COLS_IN_ROW"			=> $arParams["ARCORP_COLS_IN_ROW_DETAIL"],
			"ARCORP_PROP_PUBLISHER_NAME"	=> $arParams["ARCORP_PROP_PUBLISHER_NAME_DETAIL"],
			"ARCORP_PROP_PUBLISHER_BLANK"	=> $arParams["ARCORP_PROP_PUBLISHER_BLANK_DETAIL"],
			"ARCORP_PROP_PUBLISHER_DESCR"	=> $arParams["ARCORP_PROP_PUBLISHER_DESCR_DETAIL"],
			"ARCORP_PROP_MARKER_TEXT"		=> $arParams["ARCORP_PROP_MARKER_TEXT_DETAIL"],
			"ARCORP_PROP_MARKER_COLOR"		=> $arParams["ARCORP_PROP_MARKER_COLOR_DETAIL"],
			"ARCORP_PROP_ACTION_DATE"		=> $arParams["ARCORP_PROP_ACTION_DATE_DETAIL"],
			"ARCORP_PROP_FILE"				=> $arParams["ARCORP_PROP_FILE_DETAIL"],
			"ARCORP_LINK"					=> $arParams["ARCORP_LINK_DETAIL"],
			"ARCORP_BLANK"					=> $arParams["ARCORP_BLANK_DETAIL"],
			"ARCORP_SHOW_DATE"				=> $arParams["ARCORP_SHOW_DATE_DETAIL"],
			"ARCORP_AUTHOR_NAME"			=> $arParams["ARCORP_AUTHOR_NAME_DETAIL"],
			"ARCORP_AUTHOR_JOB"				=> $arParams["ARCORP_AUTHOR_JOB_DETAIL"],
			"ARCORP_SHOW_BUTTON"			=> $arParams["ARCORP_SHOW_BUTTON_DETAIL"],
			"ARCORP_BUTTON_CAPTION"			=> $arParams["ARCORP_BUTTON_CAPTION_DETAIL"],
			"ARCORP_PROP_VACANCY_TYPE"		=> $arParams["ARCORP_PROP_VACANCY_TYPE_DETAIL"],
			"ARCORP_PROP_SIGNATURE"			=> $arParams["ARCORP_PROP_SIGNATURE_DETAIL"],
		),
		$component
	);
}*/