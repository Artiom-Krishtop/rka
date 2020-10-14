<?  
$arResult["MORE_PHOTO"] = array();
   if(isset($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"]) && is_array($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"]))   
   {   
      foreach($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"] as $FILE)   
      {   
         $FILE = CFile::GetFileArray($FILE);   
         if(is_array($FILE))   
            $arResult["MORE_PHOTO"][]=$FILE;   
      }   
   }   

$arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arResult['PROPERTIES']['USER']['VALUE']);
$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());
while ($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields(); // поля элемента
    $arProps = $ob->GetProperties(); // свойства элемента
    $arResult["LINKS"]=$arFields["DETAIL_PAGE_URL"];
    $arResult["FOTO"]=$arFields["PREVIEW_PICTURE"];
    $arResult["NAME_ADVO"]=$arFields["NAME"];
    $arResult["PHONE"]=$arProps["PHONE"]["VALUE"];
    $arResult["SKYPE"]=$arProps["SKYPE"]["VALUE"];
    $arResult["ISQ"]=$arProps["ISQ"]["VALUE"];
    $arResult["KOLLEG"]=$arProps["KOLLEG"]["VALUE"];
}
$arFilterd = Array("IBLOCK_ID"=>15,"NAME"=>$arResult["KOLLEG"]);
$resd = CIBlockSection::GetList(Array(),$arFilterd, false, Array(), Array());
while ($obd = $resd->GetNextElement()){
    $arFieldsd = $obd->GetFields(); // поля элемента
    //$arPropsd = $obd->GetProperties(); // свойства элемента
    $arResult["KOLLEG_NAME"]=$arFieldsd["NAME"];
    $arResult["KOLLEG_LINK"]=$arFieldsd["SECTION_PAGE_URL"];
}

$arFilters = Array("IBLOCK_ID"=>15,"PROPERTY_ADVOKATS"=>$arResult['PROPERTIES']['USER']['VALUE']);
$ress = CIBlockElement::GetList(Array(),$arFilters, false, Array(), Array());
while ($obs = $ress->GetNextElement()){
    $arFieldss = $obs->GetFields(); // поля элемента
    //$arPropss = $obs->GetProperties(); // свойства элемента
    $arResult["UR_NAME"]=$arFieldss["NAME"];
    $arResult["UR_LINK"]=$arFieldss["DETAIL_PAGE_URL"];
}
?> 