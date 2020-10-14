<?
foreach($arResult["ITEMS"] as &$arItem){
    $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
    $res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());
    while ($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields(); // поля элемента
        $arItem["LINKS"]=$arFields["DETAIL_PAGE_URL"];
        $arItem["NAME_ADVO"]=$arFields["NAME"];
        $arItem["PICTURE_ADVO"]=$arFields["PREVIEW_PICTURE"];
    }
}
?> 