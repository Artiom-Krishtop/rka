<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Пошук");?>

<?$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"template1", 
	array(
		"RESTART" => "N",
		"CHECK_DATES" => "Y",
		"arrWHERE" => array(
			0 => "forum",
			1 => "iblock_services",
			2 => "iblock_company",
		),
		"arrFILTER" => array(
			0 => "main",
			1 => "iblock_articles",
			2 => "iblock_services",
			3 => "iblock_company",
		),
		"SHOW_WHERE" => "N",
		"PAGE_RESULT_COUNT" => "10",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"TAGS_SORT" => "NAME",
		"TAGS_PAGE_ELEMENTS" => "20",
		"TAGS_PERIOD" => "",
		"TAGS_URL_SEARCH" => "",
		"TAGS_INHERIT" => "Y",
		"SHOW_RATING" => "",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "000000",
		"COLOR_OLD" => "C8C8C8",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "100%",
		"PATH_TO_USER_PROFILE" => "#SITE_DIR#people/user/#USER_ID#/",
		"COMPONENT_TEMPLATE" => "template1",
		"NO_WORD_LOGIC" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"arrFILTER_main" => array(
		),
		"arrFILTER_iblock_articles" => array(
		),
		"arrFILTER_iblock_services" => array(
		),
		"arrFILTER_iblock_company" => array(
		),
		"SHOW_WHEN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_LANGUAGE_GUESS" => "Y",
		"USE_SUGGEST" => "N",
		"RATING_TYPE" => "",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"arrFILTER_forum" => "",
		"arrFILTER_blog" => array(
			0 => "all",
		)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>