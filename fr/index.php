<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Belarusian National Bar Association");
?>

<section class="asidenews">
	<div class="region region-intro">
		<div id="block-block-4" class="block block-block contextual-links-region first odd">
			<h2 class="block-title">French</h2>
			<p></p>
            <p>En République du Bélarus, le barreau est une institution juridique ayant pour but d’effectuer l’activité professionnelle de défense des droits de l’homme, de prêter une aide juridique qualifiée aux citoyens et aux personnes civiles, à tous qui en ont besoin. Les avocats participent à l’explication de la législation et à l’éducation juridique de la population. Par toute son activité, le barreau sert aux principes de la légitimité, de la justice et de l’humanisme.</p>
            <p>Une des acquisitions constitutionnelles des dernières années au Bélarus comme à d’autres pays d’orientation démocratique, c’est la fixation dans la Loi fondamentale de la disposition suivante&nbsp;: «&nbsp;Chaque personne a le droit à l’aide juridique pour la réalisation et la protection de ses droits et libertés, dont le droit de se servir, à tout moment, de l’aide des avocats et de ses autres représentants devant le tribunal, d’autres organismes publics, les collectivités territoriales, les entreprises, les institutions, les organisations, les unions publiques et dans les relations avec les fonctionnaires et les citoyens. Dans les cas prévus par la loi, l’aide juridique est prêtée aux frais des fonds publics. En République du Bélarus, il est interdit de résister à la prestation de l’aide juridique&nbsp;» (art. 62).</p>
            <p>Par ailleurs, le barreau, qui est une institution de la société civile, a le caractère de droit public. La protection criminelle et la représentation civile, qu’elle réalise professionnellement, sont des composants du système judiciaire. C’est pourquoi le développement du barreau biélorusse est étroitement lié à l’histoire du système judiciaire et de la procédure judiciaire, à tout le système de droit et d’État, au processus social en général.</p>
            <p>Les avocats du Barreau républicain biélorusse prêtent une aide juridique professionnelle aux citoyens de la République du Bélarus comme aux citoyens des autres États sur le territoire de la République du Bélarus. Nous proposons à l’attention des citoyens étrangers le registre des avocats parlant la langue française.</p>
        </div><!-- /.block -->
	</div><!-- /.region -->

<div class="region region-online">
    <div id="block-views-month-active-block" class="block block-views contextual-links-region first last odd">
<?global $arrFilters;

$arrFilters = array("PROPERTY_LANG" => '%French%');
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