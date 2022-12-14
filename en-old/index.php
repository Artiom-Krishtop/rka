<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Belarusian National Bar Association");
?><section class="asidenews" style="width: 100%; height: auto;">
<div class="region region-intro">
	<h2 class="block-title"><br>
 </h2>
 <span style="font-family: &quot;Times New Roman&quot;, Times;"><span style="font-size: 16pt;">"Everyone has the right to legal assistance for the exercise and protection of rights and freedoms, including the right to use at any time the assistance of advocates&nbsp;and their other representatives in court, other state bodies, local government bodies, at enterprises, institutions, organizations, public associations and in relations with officials and citizens. Opposition to the provision of legal assistance in the Republic of Belarus is prohibited"&nbsp;(Article 62 of the Constitution of the Republic of Belarus).<br>
 </span></span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times;"><span style="font-size: 16pt;">Advocates&nbsp;of the Republic of Belarus provide qualified legal assistance to citizens and legal entities of the Republic of Belarus and other states. <br>
 </span></span><br>
 <span style="font-family: &quot;Times New Roman&quot;, Times;"><span style="font-size: 16pt;">For foreign citizens and legal entities, we offer a register of advocates&nbsp;who speak foreign languages.</span><b><span style="font-size: 16pt;"> </span></b>
	<p>
	</p>
 </span>
</div>
 </section> <section class="main page-content">
<div class="region region-online">
	<div id="block-views-month-active-block" class="block block-views contextual-links-region first last odd">
		 <?
                global $arrFilters;
                $arrFilters = array("PROPERTY_LANG" => '%English%');
                ?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"active_advo_lng",
	Array(
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
		"COMPONENT_TEMPLATE" => "active_advo",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"PREVIEW_TEXT",1=>"DETAIL_PICTURE",2=>"DATE_ACTIVE_FROM",3=>"",),
		"FILTER_NAME" => "arrFilters",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "17",
		"IBLOCK_TYPE" => "company",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "1500",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "??????????????",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"USER",1=>"PUBLIC_DATE",2=>"LINK",3=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "",
		"SORT_ORDER2" => "",
		"STRICT_SECTION_CHECK" => "N",
		"TITLE_BLOCK" => "?????????? ???????????????? ???????????????? ???? ???? ???????????? ???????? 2019 ????????"
	),
false,
Array(
	'ACTIVE_COMPONENT' => '={$MSPartners}'
)
);?>
	</div>
</div>
 </section> <section class="main"> <section class="page-content" style="min-height: auto; padding: 0 2rem;">
<div class="region region-main-page-second">
	<div id="block-block-6" class="block block-block contextual-links-region first odd">
		 <?$APPLICATION->IncludeFile(
                        $APPLICATION->GetTemplatePath("include_areas/ob_advokat.php"),
                        Array(),
                        Array("MODE"=>"html")
                    );?>
	</div>
	<div id="block-views-banners-block" class="block block-views contextual-links-region last even">
		<div class="view view-banners view-id-banners view-display-id-block slider-container view-dom-id-825ff0814b651951bf656ed4992115f3">
			<div class="view-content">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"partners",
	Array(
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
		"COMPONENT_TEMPLATE" => "partners",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "25",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "??????????????",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"LINK",1=>"",),
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
		"STRICT_SECTION_CHECK" => "N"
	),
false,
Array(
	'ACTIVE_COMPONENT' => '={$MSPartners}'
)
);?>
			</div>
		</div>
	</div>
</div>
 </section> </section> <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>