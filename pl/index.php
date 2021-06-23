<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Belarusian National Bar Association");
?><section class="asidenews" style="width: 100%; height: auto;">
<div id="block-block-4" class="block block-block contextual-links-region first odd">
	<h2 class="block-title"><br>
 </h2>
</div>
<p>
</p>
<span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 16pt;">„Każdy ma prawo do pomocy prawnej w zakresie wykonywania i ochrony praw i wolności, w tym prawo do korzystania w każdym czasie z pomocy prawników i ich innych przedstawicieli w sądzie, innych organach państwowych, organach samorządu terytorialnego, w przedsiębiorstwach, instytucjach, organizacje, stowarzyszenia społeczne oraz w stosunkach z urzędnikami i obywatelami. Sprzeciw wobec świadczenia pomocy prawnej w Republice Białoruś jest zabroniony” (art. 62 Konstytucji Republiki Białoruś).</span><br>
<br>
<span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 16pt;">&nbsp;Prawnicy Republiki Białoruś świadczą wykwalifikowaną pomoc prawną obywatelom i osobom prawnym Republiki Białorusi i innych państw.&nbsp;</span><br>
<br>
<span style="font-family: &quot;Times New Roman&quot;, Times; font-size: 16pt;">Dla obcokrajowców i osób prawnych oferujemy rejestr prawników posługujących się językami obcymi.</span>
<p>
</p>
</section> <section class="main page-content">
<div class="region region-online">
	<div id="block-views-month-active-block" class="block block-views contextual-links-region first last odd">
		 <?
                global $arrFilters;
                $arrFilters = array("PROPERTY_LANG" => '%Polish%');
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
		"PAGER_TITLE" => "Новости",
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
		"TITLE_BLOCK" => "Самые активные адвокаты РБ по итогам июня 2019 года"
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
		"PAGER_TITLE" => "Новости",
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