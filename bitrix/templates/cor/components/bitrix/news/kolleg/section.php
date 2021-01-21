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
global $ShopSectionID;
$arPageParams = $arSection = $section = array();
$db_list = CIBlockSection::GetList(
    array(),
    array(
        //'GLOBAL_ACTIVE' => 'Y',
        "CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"]
    ),
    true,
    array("ID", "SECTION_ID", "NAME", "DESCRIPTION", "CODE", $arParams["SECTION_DISPLAY_PROPERTY"], $arParams["LIST_BROWSER_TITLE"], $arParams["LIST_META_KEYWORDS"], $arParams["LIST_META_DESCRIPTION"], $arParams["SECTION_PREVIEW_PROPERTY"], "IBLOCK_SECTION_ID", "UF_S_OLD_ID", "UF_S_WEBSITE", "UF_S_PHONE", "UF_S_ADRES", "UF_S_EMAIL", "UF_S_PREDS", "UF_S_ZAMPREDS", "UF_S_REKV", "UF_IB_US", "UF_IND_US")
);
if (!$section = $db_list->GetNext())
{
    CHTTP::SetStatus("404 Not Found");
    @define("ERROR_404","Y");

}
else {

//if ($USER->IsAdmin()){
    $APPLICATION->SetTitle($section["NAME"]);

    global $arrFilterP;
    global $arrFilterZ;
    if($section['ID'] == 70){
        $arFilterP = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>10, "PROPERTY_PREDS" => 13);
        $arFilterZ = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>10, "PROPERTY_ZAM_PREDS" => 14);
    }elseif($section['ID'] == 66){
        $arFilterP = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>6, "PROPERTY_PREDS" => 13);
        $arFilterZ = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>6, "PROPERTY_ZAM_PREDS" => 14);
    }elseif($section['ID'] == 65){
        $arFilterP = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>4, "PROPERTY_PREDS" => 13);
        $arFilterZ = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>4, "PROPERTY_ZAM_PREDS" => 14);
    }elseif($section['ID'] == 71){
        $arFilterP = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>5, "PROPERTY_PREDS" => 13);
        $arFilterZ = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>5, "PROPERTY_ZAM_PREDS" => 14);
    }elseif($section['ID'] == 67){
        $arFilterP = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>7, "PROPERTY_PREDS" => 13);
        $arFilterZ = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>7, "PROPERTY_ZAM_PREDS" => 14);
    }elseif($section['ID'] == 68){
        $arFilterP = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>8, "PROPERTY_PREDS" => 13);
        $arFilterZ = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>8, "PROPERTY_ZAM_PREDS" => 14);
    }elseif($section['ID'] == 69){
        $arFilterP = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>9, "PROPERTY_PREDS" => 13);
        $arFilterZ = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>9, "PROPERTY_ZAM_PREDS" => 14);
    }elseif($section['ID'] == 64){
        $arFilterP = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>3, "PROPERTY_PREDS" => 13);
        $arFilterZ = Array("IBLOCK_ID"=>17,"PROPERTY_KOLLEG"=>3, "PROPERTY_ZAM_PREDS" => 14);
    }
    $resP = CIBlockElement::GetList(Array(),$arFilterP, false, Array(), Array());
    while ($obP = $resP->GetNextElement()){
        $arFields = $obP->GetFields(); // поля элемента
        //$arProps = $obP->GetProperties(); // свойства элемента
        $arP["DETAIL_PAGE_URL"]=$arFields["DETAIL_PAGE_URL"];
        $arP["PREVIEW_PICTURE"]=$arFields["PREVIEW_PICTURE"];
        $arP["NAME"]=$arFields["NAME"];
    }
    $resZ = CIBlockElement::GetList(Array(),$arFilterZ, false, Array(), Array());
    while ($obZ = $resZ->GetNextElement()){
        $arFieldsZ = $obZ->GetFields(); // поля элемента
        $arPropsZ = $obZ->GetProperties(); // свойства элемента
        $arZ["DETAIL_PAGE_URL"]=$arFieldsZ["DETAIL_PAGE_URL"];
        $arZ["PREVIEW_PICTURE"]=$arFieldsZ["PREVIEW_PICTURE"];
        $arZ["NAME"]=$arFieldsZ["NAME"];
    }
    ?>
    <div id="rukovodstvo" class="field">
        <div class="field-label">Председатель: </div>
        <div class="view view-rukovodstvo view-id-rukovodstvo view-display-id-block_2 view-dom-id-3af6d5b71aea40c05c0fef182b92fd9c">
            <div class="view-content">
                <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
            <span class="user-picture">
               <a href="<?=$arP["DETAIL_PAGE_URL"]?>" title="Информация о пользователе.">
                   <img typeof="foaf:Image" src="<?=CFile::GetPath($arP["PREVIEW_PICTURE"])?>" alt="Аватар пользователя <?=$arP["NAME"]?>" title="Аватар пользователя <?=$arP["NAME"]?>">
               </a>
            </span>
                    <a href="<?=$arP["DETAIL_PAGE_URL"]?>"><?=$arP["NAME"]?></a><br>
                </div>
            </div>
        </div>
        <div class="field-label">Заместитель председателя: </div>
        <div class="view view-rukovodstvo view-id-rukovodstvo view-display-id-block_1 view-dom-id-50a2758add6edd3d730182a1808ba7c2">
            <div class="view-content">
                <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
            <span class="user-picture">
               <a href="<?=$arZ["DETAIL_PAGE_URL"]?>" title="Информация о пользователе.">
                   <img typeof="foaf:Image" src="<?=CFile::GetPath($arZ["PREVIEW_PICTURE"])?>" alt="Аватар пользователя <?=$arZ["NAME"]?>" title="Аватар пользователя <?=$arZ["NAME"]?>">
               </a>
            </span>
                    <a href="<?=$arZ["DETAIL_PAGE_URL"]?>"><?=$arZ["NAME"]?></a><br>
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
                    <div class="field-item even" property="schema:telephone"><?=htmlspecialcharsBack($section['UF_S_PHONE']);?></div>
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
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.872940559053106;s:10:\"yandex_lon\";d:27.555736739931444;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:27.555736739931444;s:3:\"LAT\";d:53.87294055905658;s:4:\"TEXT\";s:69:\"Минская областная коллегия адвокатов\";}}}",
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
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.68785088279097;s:10:\"yandex_lon\";d:23.845200857412195;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:23.84532423902688;s:3:\"LAT\";d:53.687803915364135;s:4:\"TEXT\";s:77:\"Гродненская областная коллегия адвокатов\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
		),
		"API_KEY" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
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
    <?


    $APPLICATION->IncludeComponent(
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
            "STRICT_SECTION_CHECK" => "Y",

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
                "STRICT_SECTION_CHECK" => "Y",

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
                    <?
                    global $arSort;
                    $arSort = array(
                        "name" => "asc",
                        "left_margin"=>"asc",
                    );
                    global $arrFilt;
                    if($section['ID'] == 70){
                        $arrFilt = array("PROPERTY_KOLLEG" => 10, "PROPERTY_IND_DEYAT" => 11);
                    }elseif($section['ID'] == 66){
                        $arrFilt = array("PROPERTY_KOLLEG" => 6, "PROPERTY_IND_DEYAT" => 11);
                    }elseif($section['ID'] == 65){
                        $arrFilt = array("PROPERTY_KOLLEG" => 4, "PROPERTY_IND_DEYAT" => 11);
                    }elseif($section['ID'] == 71){
                        $arrFilt = array("PROPERTY_KOLLEG" => 5, "PROPERTY_IND_DEYAT" => 11);
                    }elseif($section['ID'] == 67){
                        $arrFilt = array("PROPERTY_KOLLEG" => 7, "PROPERTY_IND_DEYAT" => 11);
                    }elseif($section['ID'] == 68){
                        $arrFilt = array("PROPERTY_KOLLEG" => 8, "PROPERTY_IND_DEYAT" => 11);
                    }elseif($section['ID'] == 69){
                        $arrFilt = array("PROPERTY_KOLLEG" => 9, "PROPERTY_IND_DEYAT" => 11);
                    }
                    $APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "ind-predp",
                        Array(
                            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                            "IBLOCK_ID" => 17,
                            "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                            "SORT_BY1" => "NAME",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "NAME",
                            "SORT_ORDER2" => "ASC",
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
                            "FILTER_NAME" => "arrFilt",
                            "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                            "CHECK_DATES" => $arParams["CHECK_DATES"],
                        ),
                        $component
                    );?>
                </div>
            </div>
        </div>
    <?}
//}
}?>
