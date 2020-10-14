<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetTitle("Авторское право");
?>
	 <?global $Element;
$Element=$APPLICATION->IncludeComponent(
	"bitrix:news.detail", 
	"otrasly", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => "106936",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"IBLOCK_ID" => "21",
		"IBLOCK_TYPE" => "company",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "otrasly"
	),
	false
);?>
</section>
<h2 class="smaller">Адвокаты, оказывающие правовую помощь в отрасли Авторское право</h2>
<div id="block-views-banners-block" class="block block-views contextual-links-region last even">
	<div class="view view-banners view-id-banners view-display-id-block slider-container view-dom-id-825ff0814b651951bf656ed4992115f3">
		<div class="view-content">
            <?
            function getMaxAdvokat($Element)
            {
                $ID_SORT = $ID_AD= $ID_ADOVO = array();
                CModule::IncludeModule("iblock");

                $arFilter = array(
                    "IBLOCK_ID" => 17,
                    "PROPERTY_SFERA_DET" => $Element,
                    "ACTIVE"=>"Y"
                );
                $rest = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM" => 'DESC'), $arFilter, false, array(), Array("DATE_ACTIVE_FROM", "PROPERTY_USER", "PROPERTY_SFERA_DET", "ID", "IBLOCK_ID"));
                while ($ob = $rest->GetNextElement()) {
                    $arFields = $ob->GetFields(); // поля элемента
                    $ID_AD[$arFields["ID"]] = $arFields["PROPERTY_USER_VALUE"];
                    $ID_ADOVO[$arFields["PROPERTY_USER_VALUE"]] = $arFields["ID"];
                    $ID_SORT[$arFields["ID"]] = 0;
                }
                $reste = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),array('IBLOCK_ID'=>16, "PROPERTY_USER"=>$ID_AD), false, array(), Array("PROPERTY_USER", "ID", "IBLOCK_ID"));
                $navCount = $reste->SelectedRowsCount();
                while ($obe = $reste->GetNextElement()){
                    $arFieldse = $obe->GetFields(); // поля элемента
                    $ID_SORT[$ID_ADOVO[$arFieldse["PROPERTY_USER_VALUE"]]]++;
                }
                arsort($ID_SORT);
                $ID_SORT = array_keys ($ID_SORT);
                return $ID_SORT;
            }
            $ID_SORT = getMaxAdvokat($Element);
$arrSfera = array("PROPERTY_SFERA_DET"=>106936);?>
			 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"otrasl-advo", 
	array(
		"ACTIVE_DATE_FORMAT" => "",
		"ADD_SECTIONS_CHAIN" => "N",
        "USER_ID" => $ID_SORT,
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ARCORP_BLOCK_NAME_IS_LINK" => "N",
		"ARCORP_CHANGE_DELAY" => "80000",
		"ARCORP_CHANGE_SPEED" => "2000",
		"ARCORP_COLS_IN_ROW" => "3",
		"ARCORP_OWL_CHANGE_DELAY" => "80000",
		"ARCORP_OWL_CHANGE_SPEED" => "500",
		"ARCORP_OWL_PC" => "5",
		"ARCORP_OWL_PHONE" => "2",
		"ARCORP_OWL_TABLET" => "4",
		"ARCORP_SHOW_BLOCK_NAME" => "N",
		"ARCORP_USE_OWL" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrSfera",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "17",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "500",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "USER",
			1 => "LINK",
			2 => "SFERA_DET",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "otrasl-advo"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => $MSPartners
	)
);?>
		</div>
	</div>
</div>
 <!-- /.block --> 
<div class="container">
 <section class="main">
 <section class="page-content">
<?/* <div class="attachment attachment-before">
        <h2 class="smaller">Статьи адвокатов по теме Авторское право</h2>
<?$arrPravo = array("PROPERTY_OTR_PRAVO"=>106936);?>         
			 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"blog", 
	array(
		"ACTIVE_DATE_FORMAT" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ARCORP_BLOCK_NAME_IS_LINK" => "N",
		"ARCORP_CHANGE_DELAY" => "80000",
		"ARCORP_CHANGE_SPEED" => "2000",
		"ARCORP_COLS_IN_ROW" => "3",
		"ARCORP_OWL_CHANGE_DELAY" => "80000",
		"ARCORP_OWL_CHANGE_SPEED" => "500",
		"ARCORP_OWL_PC" => "5",
		"ARCORP_OWL_PHONE" => "2",
		"ARCORP_OWL_TABLET" => "4",
		"ARCORP_SHOW_BLOCK_NAME" => "N",
		"ARCORP_USE_OWL" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrPravo",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Статьи",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "USER",
			1 => "LINK",
			2 => "OTR_PRAVO",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "otrasl-advo"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "N", 
	)
);?>        
</div>*/?>
<div class="attachment attachment-before" style="margin-top:20px;">
        <h2 class="smaller">Ответы адвокатов на вопросы граждан в отрасли Авторское право</h2>
<?$arrPravor = array("PROPERTY_OTR_PRAVO"=>106936);?>         
			 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"voprosy", 
	array(
		"ACTIVE_DATE_FORMAT" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ARCORP_BLOCK_NAME_IS_LINK" => "N",
		"ARCORP_CHANGE_DELAY" => "80000",
		"ARCORP_CHANGE_SPEED" => "2000",
		"ARCORP_COLS_IN_ROW" => "3",
		"ARCORP_OWL_CHANGE_DELAY" => "80000",
		"ARCORP_OWL_CHANGE_SPEED" => "500",
		"ARCORP_OWL_PC" => "5",
		"ARCORP_OWL_PHONE" => "2",
		"ARCORP_OWL_TABLET" => "4",
		"ARCORP_SHOW_BLOCK_NAME" => "N",
		"ARCORP_USE_OWL" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrPravor",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "16",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Статьи",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "USER",
			1 => "LINK",
			2 => "OTR_PRAVO",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "otrasl-advo"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => $MSPartners
	)
);?>        
</div> 
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>