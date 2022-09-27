<?  

$arFilterd = Array("IBLOCK_ID"=>15,"NAME"=>$arResult["PROPERTIES"]["KOLLEG"]["VALUE"]);
$resd = CIBlockSection::GetList(Array(),$arFilterd, false, Array(), Array());

while ($obd = $resd->GetNextElement()){
    $arFieldsd = $obd->GetFields(); // поля элемента
    $arResult["KOLLEG_NAME"]=$arFieldsd["NAME"];
    $arResult["KOLLEG_LINK"]=$arFieldsd["SECTION_PAGE_URL"];
}

$arFilters = Array("IBLOCK_ID"=>15,"PROPERTY_ADVOKATS"=>$arResult['PROPERTIES']['USER']['VALUE']);
$ress = CIBlockElement::GetList(Array(),$arFilters, false, Array(), Array());

while ($obs = $ress->GetNextElement()){
    $arFieldss = $obs->GetFields(); // поля элемента
    $arPropss = $obs->GetProperties(); // свойства элемента
    $arResult["UR_NAME"]=$arFieldss["NAME"];
    $arResult["UR_LINK"]=$arFieldss["DETAIL_PAGE_URL"];
    $arResult["UR_ADRESS"]=$arFieldss["~PREVIEW_TEXT"];
    $arResult["UR_PHONE"]=$arPropss["PHONE"]["VALUE"];
    $arResult["UR_MAP"]=$arPropss["MAP"]["VALUE"];
    $arResult["UR_WEBSITE"]=$arPropss["WEBSITE"]["VALUE"];
}
?>