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

$arParams["ADD_SECTIONS_CHAIN"] = "Y";
		
CModule::IncludeModule("iblock");

// get current section ID
global $ShopSectionID;
$arPageParams = $arSection = $section = array();
if($arResult["VARIABLES"]["SECTION_ID"] > 0){
	$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "ID" => $arResult["VARIABLES"]["SECTION_ID"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]), true, array("ID", "SECTION_ID", "NAME", "DESCRIPTION", "CODE",  $arParams["SECTION_DISPLAY_PROPERTY"], $arParams["LIST_BROWSER_TITLE"], $arParams["LIST_META_KEYWORDS"], $arParams["LIST_META_DESCRIPTION"], $arParams["SECTION_PREVIEW_PROPERTY"], "IBLOCK_SECTION_ID", "UF_S_OLD_ID", "UF_S_WEBSITE", "UF_S_PHONE", "UF_S_ADRES", "UF_S_EMAIL", "UF_S_PREDS", "UF_S_ZAMPREDS", "UF_S_REKV", "UF_IB_US", "UF_IND_US"));
	$section = $db_list->GetNext();
}
elseif(strlen(trim($arResult["VARIABLES"]["SECTION_CODE"])) > 0){
	$db_list = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "=CODE" => $arResult["VARIABLES"]["SECTION_CODE"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]), true, array("ID", "SECTION_ID", "NAME", "DESCRIPTION", "CODE", $arParams["SECTION_DISPLAY_PROPERTY"], $arParams["LIST_BROWSER_TITLE"], $arParams["LIST_META_KEYWORDS"], $arParams["LIST_META_DESCRIPTION"], $arParams["SECTION_PREVIEW_PROPERTY"], "IBLOCK_SECTION_ID", "UF_S_OLD_ID", "UF_S_WEBSITE", "UF_S_PHONE", "UF_S_ADRES", "UF_S_EMAIL", "UF_S_PREDS", "UF_S_ZAMPREDS", "UF_S_REKV", "UF_IB_US", "UF_IND_US"));
	$section = $db_list->GetNext();
}

		$APPLICATION->SetTitle($section["NAME"]);
/*
print "<pre>";
print_r($section);
print "</pre>";*/
?>
<div id="rukovodstvo" class="field">
	<div class="field-label">Председатель: </div>
	<div class="view view-rukovodstvo view-id-rukovodstvo view-display-id-block_2 view-dom-id-3af6d5b71aea40c05c0fef182b92fd9c">
		  <div class="view-content">
			<div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
<?if(!empty($section['UF_S_PREDS'])){?>			
<?
$res = CUser::GetByID($section['UF_S_PREDS']);
if($ar_res = $res->GetNext())
				 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$section['UF_S_PREDS']);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
	if($arProps["USER"]["VALUE"]==$ar_res['ID']){							
						$ar_res["LINK_PRED"]=$arFields["DETAIL_PAGE_URL"];	
					}
					}	
?>	
<span class="user-picture">
			<a href="<?=$ar_res["LINK_PRED"]?>" title="Информация о пользователе."><img typeof="foaf:Image" src="<?=CFile::GetPath($ar_res['PERSONAL_PHOTO'])?>" alt="Аватар пользователя <?=$ar_res['LOGIN']?>" title="Аватар пользователя <?=$ar_res['LOGIN']?>"></a>
</span>
<a href="<?=$ar_res["LINK_PRED"]?>"><?=$ar_res['LOGIN']?></a><br>
			<?/*if($section['ID'] != 64){?>	
				<span style="margin-left: 70px;"><?=$ar_res['PERSONAL_PHONE']?></span>
			<?}*/?>					
<?}?>				
		   </div>
		</div>
	</div>   
	<div class="field-label">Заместитель председателя: </div>
	<div class="view view-rukovodstvo view-id-rukovodstvo view-display-id-block_1 view-dom-id-50a2758add6edd3d730182a1808ba7c2">
		<div class="view-content">
			<div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
<?if(!empty($section['UF_S_ZAMPREDS'])){?>					
<?$res = CUser::GetByID($section['UF_S_ZAMPREDS']);
if($ar_res = $res->GetNext())
				 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$section['UF_S_ZAMPREDS']);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
	if($arProps["USER"]["VALUE"]==$ar_res['ID']){							
						$ar_res["LINK_ZAM"]=$arFields["DETAIL_PAGE_URL"];	
					}
					}		
?>				
 <span class="user-picture">
					<a href="<?=$ar_res["LINK_ZAM"]?>" title="Информация о пользователе."><img typeof="foaf:Image" src="<?=CFile::GetPath($ar_res['PERSONAL_PHOTO'])?>" alt="Аватар пользователя <?=$ar_res['LOGIN']?>" title="Аватар пользователя <?=$ar_res['LOGIN']?>"></a>  
</span>
				<a href="<?=$ar_res["LINK_ZAM"]?>"><?=$ar_res['LAST_NAME']?> <?=$ar_res['NAME']?> <?=$ar_res['SECOND_NAME']?></a><br>  
			<?/*if($section['ID'] != 64){?>	
				<span style="margin-left: 70px;"><?=$ar_res['PERSONAL_PHONE']?></span>
			<?}*/?>				
<?}?>				
			</div>
		</div>
	</div>
</div>
<div class="kol-info-wrap">
<?if(!empty($section['UF_S_WEBSITE'])){?>
<div class="field field-name-field-link-site field-type-link-field field-label-inline clearfix">
 <div class="field-label">Веб сайт:&nbsp;</div>
 <div class="field-items">
	 <div class="field-item even" property="schema:telephone">
		<a href="<?=$section['UF_S_WEBSITE']?>" target="_blank" rel="nofollow"><?=$section['UF_S_WEBSITE']?></a>
	 </div>
 </div>
</div>
<?}?>
<?if(!empty($section['UF_S_PHONE'])){?>
<div class="field field-name-field-phone field-type-text field-label-inline clearfix">
 <div class="field-label">Телефон:&nbsp;</div>
 <div class="field-items">
	<div class="field-item even" property="schema:telephone"><?=$section['UF_S_PHONE']?></div>
 </div>
</div>
<?}?>
<?if(!empty($section['UF_S_ADRES'])){?>
<div class="field field-name-field-adress field-type-addressfield field-label-inline clearfix">
	<div class="field-label">Адрес:&nbsp;</div>
	<div class="field-items">
		<div class="field-item even" property="schema:address">
<?=$section['~UF_S_ADRES']?>
		</div>
	</div>
</div>
<?}?>
<?if(!empty($section['UF_S_EMAIL'])){?>
	<div class="field field-name-field-mail field-type-email field-label-inline clearfix">
	 <div class="field-label">E-mail:&nbsp;</div>
	 <div class="field-items">
		 <div class="field-item even" property="schema:email">
			<a href="mailto:<?=$section['UF_S_EMAIL']?>"><?=$section['UF_S_EMAIL']?></a>
		 </div>
	 </div>
	</div>
<?}?>

</div>
<div class="field field-name-field-maps field-type-field-yamaps field-label-hidden">
	<div class="field-items">
		<div class="field-item even">
<?if($section['ID'] == 70){?>		
		 <?$APPLICATION->IncludeComponent(
			"bitrix:map.yandex.view", 
			"brest", 
			array(
				"COMPONENT_TEMPLATE" => ".default",
				"CONTROLS" => array(
					0 => "ZOOM",
					1 => "TYPECONTROL",
					2 => "SCALELINE",
				),
				"INIT_MAP_TYPE" => "MAP",
				"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:52.08767162863938;s:10:\"yandex_lon\";d:23.693381249224206;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:23.6935920185244;s:3:\"LAT\";d:52.087464990302855;s:4:\"TEXT\";s:73:\"Брестская областная коллегия адвокатов\";}}}",
				"MAP_HEIGHT" => "300",
				"MAP_ID" => "",
				"MAP_WIDTH" => "100%",
				"OPTIONS" => array(
					0 => "ENABLE_DBLCLICK_ZOOM",
				)
			),
			false
		);?>
<?}else if ($section['ID'] == 64){?>	
		 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"resp", 
	array(
		"COMPONENT_TEMPLATE" => "resp",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
		),
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.901221760398855;s:10:\"yandex_lon\";d:27.541828555541958;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:27.541506690460043;s:3:\"LAT\";d:53.90127244827242;s:4:\"TEXT\";s:66:\"Республиканская коллегия адвокатов\";}}}"
	),
	false
);?>
<?}else if ($section['ID'] == 65){?>	
		 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"minsk-gor", 
	array(
		"COMPONENT_TEMPLATE" => "minsk-gor",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.90521320755281;s:10:\"yandex_lon\";d:27.57491938973494;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:27.579897569666567;s:3:\"LAT\";d:53.90214676740278;s:4:\"TEXT\";s:69:\"Минская городская коллегия адвокатов\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
		)
	),
	false
);?>
<?}else if ($section['ID'] == 71){?>	
		 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"minsk", 
	array(
		"COMPONENT_TEMPLATE" => "minsk",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.89044325352596;s:10:\"yandex_lon\";d:27.54307806517595;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:27.54591047789572;s:3:\"LAT\";d:53.889632028104245;s:4:\"TEXT\";s:69:\"Минская областная коллегия адвокатов\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
		)
	),
	false
);?>
<?}else if ($section['ID'] == 66){?>	
		 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"mogilev", 
	array(
		"COMPONENT_TEMPLATE" => "mogilev",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.92453767117823;s:10:\"yandex_lon\";d:30.34224069641545;s:12:\"yandex_scale\";i:13;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:30.3508237652631;s:3:\"LAT\";d:53.918964748783054;s:4:\"TEXT\";s:77:\"Могилевская областная коллегия адвокатов\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
		)
	),
	false
);?>
<?}else if ($section['ID'] == 67){?>	
		 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"grodno", 
	array(
		"COMPONENT_TEMPLATE" => "grodno",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.68168644605393;s:10:\"yandex_lon\";d:23.83292345536136;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:23.833171525131192;s:3:\"LAT\";d:53.68145486731326;s:4:\"TEXT\";s:77:\"Гродненская областная коллегия адвокатов\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
		)
	),
	false
);?>
<?}else if ($section['ID'] == 68){?>	
		 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"gomel", 
	array(
		"COMPONENT_TEMPLATE" => "gomel",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:52.425531321113596;s:10:\"yandex_lon\";d:31.008135626983595;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:31.00920851058943;s:3:\"LAT\";d:52.42494102921979;s:4:\"TEXT\";s:75:\"Гомельская областная коллегия адвокатов\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
		)
	),
	false
);?>
<?}else if ($section['ID'] == 69){?>	
		 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"", 
	array(
		"COMPONENT_TEMPLATE" => "",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:52.425531321113596;s:10:\"yandex_lon\";d:31.008135626983595;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:31.00920851058943;s:3:\"LAT\";d:52.42494102921979;s:4:\"TEXT\";s:75:\"Гомельская областная коллегия адвокатов\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
		)
	),
	false
);?>
<?}?>	
		</div>
	</div>
</div>
<h2>Информация о коллегии</h2>
<div class="field field-name-body field-type-text-with-summary field-label-hidden">
	<div class="field-items">
		<div class="field-item even" property="content:encoded">
			<?=$section['~DESCRIPTION']?>
		</div>
	</div>
</div>
<?if($section['ID'] != 64){?>
<div class="block block-views contextual-links-region first odd">
	<h2 class="block-title">Юридические консультации</h2>
</div>
<?}?>
<?if($arParams["USE_RSS"]=="Y"):?>
	<?
	$rss_url = CComponentEngine::makePathFromTemplate($arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss_section"], array_map("urlencode", $arResult["VARIABLES"]));
	if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$rss_url.'" href="'.$rss_url.'" />');
	?>
	<a href="<?=$rss_url?>" title="rss" target="_self"><img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>
<?endif?>

<?if($arParams["USE_SEARCH"]=="Y"):?>
<?=GetMessage("SEARCH_LABEL")?><?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	Array(
		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
	),
	$component
);?>
<br />
<?endif?>
<?if($arParams["USE_FILTER"]=="Y"):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.filter",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
	),
	$component
);
?>
<br />
<?endif?>
<?//if($section['ID'] < 80) {
/*
print "<pre>";
print_r($section);
print "</pre>";*/
/*$arPageParams = $arSection = $sections = array();
if($arResult["VARIABLES"]["SECTION_ID"] > 0){
	$db_listd = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME"));
	$sections = $db_list->GetNext();
}
elseif(strlen(trim($arResult["VARIABLES"]["SECTION_CODE"])) > 0){
	$db_listd = CIBlockSection::GetList(array(), array('GLOBAL_ACTIVE' => 'Y', "IBLOCK_ID" => 15), true, array("ID", "NAME"));
	$sections = $db_list->GetNext();
}

	//$sections = $db_list->GetNext();
while($sections = $db_listd->Fetch()) {

if($sections['ID'] > 79) {
	
print "<pre>";
print_r($sections);
print "</pre>";
	
}
	

}*/

	?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"list",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
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
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],

		"PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
		"PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
	),
	$component
);?>
<?//}?>
<?if($section['ID'] != 64){?>

<div class="block block-views contextual-links-region first odd">
	<h2 class="block-title">Адвокатские бюро</h2>
</div>
<?
$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"lister",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
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
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],

		"PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
		"PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
	),
	$component
);?>
<?}?>

<?if($section['ID'] != 64){?>

<div class="block block-views contextual-links-region first odd">
	<h2 class="block-title">Адвокаты, осуществляющие деятельность индивидуально</h2>
	<div class="view view-og-members view-id-og_members view-display-id-block_5">
		<div class="view-content adv-individs" style="overflow: hidden;">
		
<?	///Импорт ID пользователей
			$filter = Array(
				 "UF_COLLEGIA" => $section['NAME'],
				 "UF_IND_US" => 1 
			);
			$rsUsers = CUser::GetList(
				($by = "id"),
				($order = "desc"), 
				$filter,
				array('SELECT' => array('UF_COLLEGIA','UF_IND_US'))
			);
			while ($arUser = $rsUsers->NavNext(true, "f_")) :

			$dsd[] = $arUser["ID"];

			$bs = new CIBlockSection;
			$arFields = Array(
			  "ACTIVE" => "Y",
			  "IBLOCK_ID" => 15,
			  'UF_IB_US'   => $dsd		  
			  ); 
  
 //$bs->Add($arFields);
      // $bs->Update(65, $arFields); 
 			//print "<pre>";
			//print_r($arFields);
			//print "</pre>";
			//$PRODUCT_ID = 3902;  // изменяем элемент с кодом (ID) 2
			//$res = $el->Update($PRODUCT_ID, $arLoadProductSERVICE);
			/*if(!$res){
			  echo $el->LAST_ERROR;	  
			}*/
			endwhile;
			?>								
			<?foreach($section['UF_IB_US'] as $arAdvo):

			$res = CUser::GetByID($arAdvo);
			if($ar_res = $res->GetNext())
				
				 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arAdvo);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
	if($arProps["USER"]["VALUE"]==$ar_res['ID']){							
						$ar_res["LINKS"]=$arFields["DETAIL_PAGE_URL"];	
					}
					}			
			//print "<pre>";
			//print_r($ar_res);
			//print "</pre>";
				  $rImage = CFile::GetPath($ar_res["PERSONAL_PHOTO"]);
				  $renderImage = CFile::ResizeImageGet($ar_res["PERSONAL_PHOTO"], Array("width" => 60, "height" => 60), BX_RESIZE_IMAGE_EXACT, false); 
				  
				 // echo '<img alt="'.$arItem["NAME"].'" src="'.$renderImage['src'] .'" />'; 
			?>
									<div style="width:33.3%;float:left;margin-bottom: 20px;" id="<?=$ar_res["ID"]?>" class="individs-item">
										<span class="user-picture adv-pic">
										<a href="<?=$ar_res["LINKS"]?>" title="Информация о пользователе."><img typeof="foaf:Image" <?if(!empty($ar_res["PERSONAL_PHOTO"])){?>src="<?=$renderImage['src']?>"<?}else{?>src="/images/picture-default.jpg"<?}?> alt="Аватар пользователя <?=$ar_res['LOGIN']?>" title="Аватар пользователя <?=$ar_res['LOGIN']?>"></a>  </span>
										<div class="adv-dsc" style="display: inline-block;"><a class="d" href="<?=$ar_res["LINKS"]?>"><?if(!empty($ar_res['LAST_NAME'])){?> <?=$ar_res['LAST_NAME']?> <?}?><?if(!empty($ar_res['NAME'])){?> <?=$ar_res['NAME']?> <?}?><?if(!empty($ar_res['SECOND_NAME'])){?> <?=$ar_res['SECOND_NAME']?> <?}?></a><div style="width: 197px;"><?=$ar_res['PERSONAL_PHONE']?></div></div>
										<div class="clearfix"></div>
									
									</div>
			<?endforeach?>				
		</div>
	</div>
</div>

<?}?>