<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Belarusian National Bar Association");
?>

<section class="asidenews">
	<div class="region region-intro">
		<div id="block-block-4" class="block block-block contextual-links-region first odd">
			<h2 class="block-title">Belarusian National Bar Association</h2>
			<p></p>
            <p>Advocacy considered to be a legal institution made up to actualize professional right activity, provide qualified legal support to private persons and legal entities, each and every one, who is in need of this. Attorneys take part in elucidation the law and legal education of the population. With all its activity advocacy serves as principles of legality, concept of justice and humanism.</p>
            <p>One of the constitutional achievements of the recent years in Belarus, as in other democratically oriented countries, is such changes in the Constitutional law as consolidation of following statute: “Everyone shall have the right to legal assistance to exercise and protect his rights and freedoms, including the right to make use, at any time, of assistance of lawyers and his other representatives in court, other state bodies, bodies of local government, enterprises, institutions, organizations and public associations, and also in relations with officials and citizens. In the instances specified by law, legal assistance shall be rendered at the expense of state funding” (art. 62).</p>
            <p>Advocacy as the institution of civic society also has the public-official status. Professional criminal defense and civil-law proxyship are the component parts of the justice system, implemented by the advocacy. That is why the development of the Belarussian advocacy is closely connected with the history of judicial system, state-legal system and social processes on the whole.</p>
            <p>The Belarussian Republican attorneys’ bar association provides qualified juridical support to both citizens of the Republic of Belarus and citizens of other foreign countries, who are situated in the territory of the Republic of Belarus. To foreign citizens’ attention we provide the register of attorneys, who able to speak foreign languages.</p>
		</div><!-- /.block -->
	</div><!-- /.region -->

<div class="region region-online">
    <div id="block-views-month-active-block" class="block block-views contextual-links-region first last odd">
<?global $arrFilters;

$arrFilters = array("PROPERTY_LANG" => '%English%');
?> 	     
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"active_advo", 
	array(
    //"USERS_ID"=>$ussersid,
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
		"FIELD_CODE" => array(
			0 => "PREVIEW_TEXT",
			1 => "DETAIL_PICTURE",
			2 => "DATE_ACTIVE_FROM",
			3 => "",
		),
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
		"PROPERTY_CODE" => array(
			0 => "USER",
			1 => "PUBLIC_DATE",
			2 => "LINK",
			3 => "",
		),
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
		"TITLE_BLOCK" => "Самые активные адвокаты РБ по итогам июня 2019 года",
		"STRICT_SECTION_CHECK" => "N"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => $MSPartners
	)
);?>       
    </div>
</div>
	<div class="region region-main-page-second">
    <div id="block-block-6" class="block block-block contextual-links-region first odd">
			<?$APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("include_areas/ob_advokat.php"),
						Array(),
						Array("MODE"=>"html")
			);?>	    
	</div><!-- /.block -->
<div id="block-views-banners-block" class="block block-views contextual-links-region last even">

      
  <div class="view view-banners view-id-banners view-display-id-block slider-container view-dom-id-825ff0814b651951bf656ed4992115f3">
        
  
  
      <div class="view-content">
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"partners", 
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
		"COMPONENT_TEMPLATE" => "partners",
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
		"PROPERTY_CODE" => array(
			0 => "LINK",
			1 => "",
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
		"STRICT_SECTION_CHECK" => "N"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => $MSPartners
	)
);?>
	  
	  </div>
  
  
  
  
  
  
	</div>
	</div><!-- /.block -->
  </div><!-- /.region -->
  
				  
				  				  				

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>