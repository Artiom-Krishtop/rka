<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?><?
global $arFilter;
//$arFilter = array("PROPERTY_ARCHIVE"=>false);
$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"template1", 
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ARCORP_BLOCK_NAME_IS_LINK_DETAIL" => "N",
		"ARCORP_BLOCK_NAME_IS_LINK_LIST" => "N",
		"ARCORP_COLS_IN_ROW_LIST" => "6",
		"ARCORP_DETAIL_LIST_TEMPLATES" => "news",
		"ARCORP_DETAIL_SUBSCRIBE_NOTE" => "",
		"ARCORP_DETAIL_SUBSCRIBE_PAGE" => "",
		"ARCORP_DETAIL_TEMPLATES" => "imageleft",
		"ARCORP_DETAIL_USE_SUBSCRIBE" => "Y",
		"ARCORP_LIST_TEMPLATES" => "news",
		"ARCORP_LIST_TEMPLATES_DETAIL" => "newslistcol",
		"ARCORP_LIST_TEMPLATES_DETAIL_USE" => "Y",
		"ARCORP_LIST_TEMPLATES_LIST" => "news",
		"ARCORP_OWL_CHANGE_DELAY_DETAIL" => "8000",
		"ARCORP_OWL_CHANGE_SPEED_DETAIL" => "2000",
		"ARCORP_OWL_PC_DETAIL" => "10",
		"ARCORP_OWL_PHONE_DETAIL" => "1",
		"ARCORP_OWL_TABLET_DETAIL" => "2",
		"ARCORP_PROP_PUBLISHER_BLANK_DETAIL" => "Y",
		"ARCORP_PROP_PUBLISHER_BLANK_LIST" => "Y",
		"ARCORP_PROP_PUBLISHER_DESCR_DETAIL" => "PUBLISHER_DESCR",
		"ARCORP_PROP_PUBLISHER_DESCR_LIST" => "PUBLISHER_DESCR",
		"ARCORP_PROP_PUBLISHER_LINK_DETAIL" => "PUBLISHER_LINK",
		"ARCORP_PROP_PUBLISHER_LINK_LIST" => "PUBLISHER_LINK",
		"ARCORP_PROP_PUBLISHER_NAME_DETAIL" => "PUBLISHER_NAME",
		"ARCORP_PROP_PUBLISHER_NAME_LIST" => "PUBLISHER_NAME",
		"ARCORP_SHOW_BLOCK_NAME_DETAIL" => "N",
		"ARCORP_SHOW_BLOCK_NAME_LIST" => "N",
		"ARCORP_SHOW_DATE_DETAIL" => "Y",
		"ARCORP_USE_OWL_DETAIL" => "Y",
		"ARCORP_USE_OWL_LIST" => "N",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "CREATED_BY",
			1 => "название",
			2 => "дата создания",
			3 => "кем создан (ID)",
            4 => "CREATED_USER_NAME",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "AUTHOR",
			1 => "LANG",
			2 => "ISTOCH",
			3 => "PUBLIC_DATE",
			4 => "DOP_PHOTO",
			5 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "23",
		"IBLOCK_TYPE" => "company",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "",
		"LIST_FIELD_CODE" => array(
			0 => "CREATED_USER_NAME",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "AUTHOR",
			1 => "LANG",
			2 => "PUBLIC_DATE",
			3 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/be/news/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"FILTER_NAME" => "arFilter",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "Y",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "Y",
		"COMPONENT_TEMPLATE" => "template1",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"STRICT_SECTION_CHECK" => "N",
		"TEMPLATE_THEME" => "blue",
		"MEDIA_PROPERTY" => "",
		"SLIDER_PROPERTY" => "",
		"TAGS_CLOUD_ELEMENTS" => "150",
		"PERIOD_NEW_TAGS" => "",
		"DISPLAY_AS_RATING" => "rating",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "3E74E6",
		"COLOR_OLD" => "C0C0C0",
		"TAGS_CLOUD_WIDTH" => "100%",
		"MESSAGES_PER_PAGE" => "10",
		"USE_CAPTCHA" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "10",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "N",
		"SHARE_HIDE" => "N",
		"SHARE_TEMPLATE" => "",
		"SHARE_HANDLERS" => array(
			0 => "mailru",
			1 => "twitter",
			2 => "vk",
			3 => "delicious",
			4 => "lj",
			5 => "facebook",
		),
		"SHARE_SHORTEN_URL_LOGIN" => "",
		"SHARE_SHORTEN_URL_KEY" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>