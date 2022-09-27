<?  

$arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arResult['PROPERTIES']['USER']['VALUE']);
$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());

while ($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields(); // поля элемента
    $arProps = $ob->GetProperties(); // свойства элемента
    if($arProps["USER"]["VALUE"]==$arResult['DISPLAY_PROPERTIES']['USER']['VALUE']){
        $arResult["LINKS"]=$arFields["DETAIL_PAGE_URL"];
        $arResult["FOTO"]=$arFields["PREVIEW_PICTURE"];
        $arResult["NAME_AVDO"]=$arFields["NAME"];
        $arResult["PHONE"]=$arProps["PHONE"]["VALUE"];
        $arResult["SKYPE"]=$arProps["SKYPE"]["VALUE"];
        $arResult["ISQ"]=$arProps["ISQ"]["VALUE"];
        $arResult["KOLLEG"]=$arProps["KOLLEG"]["VALUE"];
    }
}

$arFilterd = Array("IBLOCK_ID"=>15,"ID"=>$arResult['PROPERTIES']['F_COLLEG']['VALUE']);
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
    $arResult["UR_NAME"]=$arFieldss["NAME"];
    $arResult["UR_LINK"]=$arFieldss["DETAIL_PAGE_URL"];
}

$cp = $this->__component; // объект компонента

if (is_object($cp))
{
    // добавим в arResult компонента поля
    $cp->arResult['OTR_PRAVO'] = $arResult['PROPERTIES']['OTR_PRAVO'];
    $cp->SetResultCacheKeys(array('OTR_PRAVO'));
}
?>