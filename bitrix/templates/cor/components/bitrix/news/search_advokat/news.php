<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
CModule::IncludeModule("iblock");
$kolleg=array();
$pravo=array();
$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "CODE"=>"KOLLEG"));
while($enum_fields = $property_enums->GetNext())
{
  $kolleg[$enum_fields["ID"]]=$enum_fields["VALUE"];
}
$arFilterw = Array("IBLOCK_ID"=>21);
$rw = CIBlockElement::GetList(Array(), $arFilterw);
	while ($obw = $rw->GetNextElement()){
		$arFieldw = $obw->GetFields(); // поля элемента
        $pravo[$arFieldw["ID"]]=$arFieldw["NAME"];                 
    }  
/*print "<pre>";
print_r($pravo);
print "</pre>";*/
?>
<div class="view-filters" style="margin-bottom: 20px;">
<form method="post" name="service_add" id="service_add"  action="" enctype="multipart/form-data" novalidate="novalidate">
<div>
<div class="views-exposed-form">
<div class="views-exposed-widgets clearfix">
    <input type="hidden" name="search" value="Y"/>
    <div class="row select-input">
        <div class="kass views-exposed-widget views-widget-filter-field_activity_tid law-field">
			<label for="edit-field-activity-tid"> Отрасль права</label>
            <div class="views-widget">
             <div class="form-item form-type-select form-item-field-activity-tid">
                <select  multiple="multiple" size="9" name="PRAVO[]" id="PRAVO"  class="form-select">
                    <?foreach ($pravo as $keys => $arPr) {?>
                       <option
                           <?if ($_REQUEST['search']=='Y' && !empty($_REQUEST["PRAVO"])):?>
                                <?foreach($_REQUEST["PRAVO"] as $val){?>
                                <?if($val ==$keys){?>
                                   selected=''
                                 <?}}?>
                           <?elseif($_REQUEST['search']=='' && !empty($_SESSION['PRAVO_FILT'])):?>
                               <?foreach($_SESSION['PRAVO_FILT'] as $val){?>
                                   <?if($val ==$keys){?>
                                       selected=''
                                   <?}}?>
                           <?endif;?>
                            value="<?=$keys?>"><?=$arPr?></option>
                    <?}?>					
                </select>
                </div>
             </div>
        </div>    
        <div class="krass views-exposed-widget views-widget-filter-gid choose-kollegy">
			<label>Коллегия</label>
			<select  name="KOLLEG" id="KOLLEG"  class="select">
                <option value="" >- Выберите коллегию-</option>
                <?foreach ($kolleg as $key => $arEnum) {?>
				   <option
                   <?if ($_REQUEST['search']=='Y' && $_REQUEST['KOLLEG']==$key):?>
                       selected=''
                   <?elseif($_REQUEST['search']=='' && $_SESSION['KOLLEG_FILT']==$key):?>
                       selected=''
                   <?endif;?>
                    value="<?=$key?>"><?=$arEnum?></option>
                <?}?>					
			</select>
        </div>
        <div class="views-exposed-widget views-widget-filter-gid choose-surname">
			<label>Фамилия</label>
			<input autocomplete="off" placeholder="" type="text" name="NAME" id="NAME"  value="<?=$_REQUEST["NAME"]?>" placeholder="">
            <div class="description">Введите полностью или частично фамилию адвоката</div>
		</div>
    </div>
	<div class="clearfix"></div>
    <div class="row sd">
        <div class="but-r">
			<button class="button" type="submit" name="save" id="buttonsubmit" value="Найти"><span>Применить</span></button>
			<div class="clearboth"></div>
		</div>
    </div>
</div>
</div>
</div>
</form>
</div>
<?
if ($_REQUEST['search']=='Y') {
   	       global $arrFilterNow;
           if ($_REQUEST['NAME']!='') {
                $arSpecUser=array();
                global $USER;
                $filter = Array("LAST_NAME" => '%'.$_REQUEST['NAME'].'%');
                $rsUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);
                while ($arUser = $rsUsers->Fetch()) {
                  $arSpecUser[] = $arUser['ID'];
                }
                if (!empty($arSpecUser)) {
                    $arrFilterNow['PROPERTY_USER'] = $arSpecUser;
                }else{
                    $arrFilterNow['PROPERTY_USER'] = "W";
                }
           } 
           if ($_REQUEST['KOLLEG']!=''){
               $arrFilterNow['PROPERTY_KOLLEG']=$_REQUEST['KOLLEG'];
               $_SESSION["KOLLEG_FILT"]=$_REQUEST['KOLLEG'];
           }else{
               $_SESSION["KOLLEG_FILT"]='';
           }
           if ($_REQUEST['PRAVO']!=''){
               $arrFilterNow['PROPERTY_SFERA_DET']=$_REQUEST['PRAVO'];
               $_SESSION["PRAVO_FILT"]=$_REQUEST['PRAVO'];
           }else{
               $_SESSION["PRAVO_FILT"]='';
           }
}elseif($_REQUEST['search']=='Y' && $_SESSION['KOLLEG_FILT']!=''){
    $arrFilterNow['PROPERTY_KOLLEG']=$_SESSION['KOLLEG_FILT'];
    $_REQUEST['KOLLEG']=$_SESSION['KOLLEG_FILT'];
}
elseif($_REQUEST['search']=='' && $_SESSION['KOLLEG_FILT']!=''){
    global $arrFilterNow;
    $_REQUEST['KOLLEG']=$_SESSION['KOLLEG_FILT'];
    $arrFilterNow['PROPERTY_KOLLEG']=$_REQUEST['KOLLEG'];
}elseif($_REQUEST['search']=='Y' && $_SESSION['PRAVO_FILT']!=''){
    $arrFilterNow['PROPERTY_KOLLEG']=$_SESSION['PRAVO_FILT'];
    $_REQUEST['PRAVO']=$_SESSION['PRAVO_FILT'];
} elseif($_REQUEST['search']=='' && $_SESSION['PRAVO_FILT']!=''){
    global $arrFilterNow;
    $_REQUEST['PRAVO']=$_SESSION['PRAVO_FILT'];
    $arrFilterNow['PROPERTY_SFERA_DET']=$_REQUEST['PRAVO'];
   /* print "<pre>";
    print_r($_SESSION["PRAVO_FILT"]);
    print "</pre>";
    print "<pre>";
    print_r($_REQUEST['PRAVO']);
    print "</pre>";*/
    //if ($_REQUEST['PRAVO']!='')  $arrFilterNow['PROPERTY_SFERA_DET']=$_REQUEST['PRAVO'];
}else{
    $arFilter = array(
        "IBLOCK_ID" => 17,
        "ACTIVE"=>"Y"
    );
    $rest = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM" => 'DESC'), $arFilter, false, array(), Array("DATE_ACTIVE_FROM", "PROPERTY_USER", "ID", "IBLOCK_ID"));
    while ($ob = $rest->GetNextElement()) {
        $arFields = $ob->GetFields(); // поля элемента
            $rsUser = CUser::GetByID($arFields["PROPERTY_USER_VALUE"]);
            $arUser = $rsUser->Fetch();
           // $ID_SORT[$arFields["ID"]] = $arFields["PROPERTY_USER_VALUE"];
            $ID_SORT[$arFields["ID"]] = $arUser["LAST_ACTIVITY_DATE"];
    }
    arsort($ID_SORT);
    $ID_SORT = array_keys ($ID_SORT);
    //$arrFilterNow["ID"]=$ID_SORT;
    $arrFilterNow = array('ID' => $ID_SORT);
    /*print "<pre>";
    print_r($ID_SORT);
    print "</pre>";*/
}
?>
<?if(($arrFilterNow['PROPERTY_KOLLEG']=="" || $arrFilterNow['PROPERTY_SFERA_DET']=="") && $arrFilterNow['PROPERTY_USER'] == "W"){?>
    <p>Адвокатов по заданным параметрам не найдено.</p>
<?}else{?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "USER_ID" => $ID_SORT,
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => "SHOW_COUNTER",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => 'arrFilterNow',
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
	),
	$component
);?>
<?}?>
