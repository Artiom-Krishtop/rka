<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetTitle("Ответы на вопросы");
//12072
if ($_REQUEST['search_date']=='Y') {
    $min_date = $_REQUEST['date_filter_min'];//date("d.m.Y")
    $max_date = $_REQUEST['date_filter_max'];
}else{
    $min_date = date("Y-m-d");//date("d.m.Y")
    $max_date = date("Y-m-d");
}
?>
<div style="overflow: hidden;">
    <div class="view-filters" style="display: inline-block;width: 70%;">
        <form action="/personal/answered/" method="get" id="views-exposed-form-user-page-page-1" accept-charset="UTF-8"><div><div class="views-exposed-form">
                    <input type="hidden" name="search_date" value="Y"/>
                    <div class="views-exposed-widgets clearfix">
                        <div id="edit-date-filter-wrapper" class="views-exposed-widget views-widget-filter-date_filter">
                            <div class="views-widget">
                                <div id="edit-date-filter-min-wrapper"><div id="edit-date-filter-min"><div class="container-inline-date"><div class="form-item form-type-date-popup form-item-date-filter-min">
                                                <label for="edit-date-filter-min">Дата начала </label>
                                                <div id="edit-date-filter-min" class="date-padding"><div class="form-item form-type-textfield form-item-date-filter-min-date">
                                                        <input type="date" id="edit-date-filter-min-datepicker-popup-0" name="date_filter_min" value="<?=$min_date?>"
                                                               <?/*if($_REQUEST['search_date']=='Y'){?>
                                                                   value="<?=$min_date?>"
                                                               <?}else{?>
                                                                   value="<?=date("Y-m-d")?>"
                                                               <?}*/?>
                                                        size="20" maxlength="30" class="form-text">
                                                        <div class="description"> Например, <? echo date("Y-m-01")?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></div></div><div id="edit-date-filter-max-wrapper"><div id="edit-date-filter-max"><div class="container-inline-date"><div class="form-item form-type-date-popup form-item-date-filter-max">
                                                <label for="edit-date-filter-max">Дата окончания </label>
                                                <div id="edit-date-filter-max" class="date-padding"><div class="form-item form-type-textfield form-item-date-filter-max-date">
                                                        <input type="date" id="edit-date-filter-max-datepicker-popup-0" name="date_filter_max" value="<?=$max_date?>"
                                                               <?/*if($_REQUEST['search_date']=='Y'){?>
                                                                   value="<?=$max_date?>"
                                                               <?}else{?>
                                                                   value="<?=date("Y-m-d")?>"
                                                               <?}*/?>
                                                         size="20" maxlength="30" class="form-text">
                                                        <div class="description"> Например, <? echo date("Y-m-d")?> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></div></div>        </div>
                        </div>
                        <div class="views-exposed-widget views-submit-button">
                            <input type="submit" id="edit-submit-user-page" name="" value="Применить" class="form-submit">
                        </div>

                    </div>
                </div>
            </div></form>
    </div>

</div>
<?
if ($_REQUEST['search_date']=='Y') {
    $min_date = $_REQUEST['date_filter_min'];//date("d.m.Y")
    $max_date = $_REQUEST['date_filter_max'];
    $format = "YYYY-MM-DD";
    $new_format1 = "DD.MM.YYYY 00:00:00";
    $new_format2 = "DD.MM.YYYY 23:59:59";
    $new_date_min = $DB->FormatDate($min_date, $format, $new_format1);
    $new_date_max = $DB->FormatDate($max_date, $format, $new_format2);
    global $arDate;
    $arDate  =  array  (
        ">=DATE_ACTIVE_FROM"  => $new_date_min,
        "<=DATE_ACTIVE_FROM"  => $new_date_max,
        "PROPERTY_USER" => $USER->GetID(),
    );
}else{
    global $arDate;
    $arDate  =  array  (
        "PROPERTY_USER" => $USER->GetID(),
    );
}


$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"answ_quest", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
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
		"DISPLAY_TOP_PAGER" => "Y",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arDate",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "16",
		"IBLOCK_TYPE" => "company",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Отображены вопросы",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "answ_quest"
	),
	false
);?>
<style>
    .views-exposed-form .form-item{margin: 10px 10px 10px 0;}
    .views-exposed-form .description {
        display: block;
        margin-bottom: 20px;
        font-size: 12px;
    }
    .view-filters input.form-text {width: 170px;}
    .views-submit-button{
        float: left;
        display: inline-block;
        margin-top: 39px;
    }
    input[type="date"]:focus::before {
        content: none
    }

    .non-empty-date input[type="date"]:disabled::before {
        content: none;
    }

    .empty-date input[type="date"]:disabled::before {
        content: attr(data-placeholder);
        width: 100%;
    }
</style>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>