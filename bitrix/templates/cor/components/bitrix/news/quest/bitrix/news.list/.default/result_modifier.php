<?
foreach($arResult["ITEMS"] as &$arItem){
    $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arItem['PROPERTIES']['USER']['VALUE']);
    $res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());
    while ($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields(); // поля элемента
        $arItem["LINKS"]=$arFields["DETAIL_PAGE_URL"];
        if($arFields["ID"]==105502){
            $arItem["NAME_ADVO"]="Таборко Наталья Викторовна";
        }elseif($arFields["ID"]==105951){
            $arItem["NAME_ADVO"]="Сущенок Галина Вячеславовна";
        }else{
            $arItem["NAME_ADVO"]=$arFields["NAME"];
        }
    }
}

/*foreach($arResult["ITEMS"] as &$arItem){
    foreach($arItem['PROPERTIES']['OTR_PRAVO']["VALUE"] as $arPravo){
        $resfera = CIBlockElement::GetByID($arPravo);
        if($ar_resfera = $resfera->GetNext()){
            $arItem["OTR_LINKS"]=$ar_resfera["DETAIL_PAGE_URL"];
            $arItem["OTR_NAME"]=$ar_resfera["NAME"];
        }
    }

    print "<pre>";
    print_r($arItem["OTR_LINKS"]);
    print "</pre>";
}*/
?> 