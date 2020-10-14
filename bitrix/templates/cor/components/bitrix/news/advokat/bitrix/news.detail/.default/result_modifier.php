<?  

$resElemCnt = CIBlockElement::GetList(
    false,      // сортировка
    array('IBLOCK_ID' => 16,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]),   // фильтрация
    false,      // параметры группировки полей
    false,      // параметры навигации
    array("ID") // поля для выборки
);
$count_otvet = $resElemCnt -> SelectedRowsCount();
$arResult["COUNT_OTVET"] = $count_otvet;

$resElemBl = CIBlockElement::GetList(
    false,      // сортировка
    array('IBLOCK_ID' => 14,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]),   // фильтрация
    false,      // параметры группировки полей
    false,      // параметры навигации
    array("ID") // поля для выборки
);
$count_blog = $resElemBl -> SelectedRowsCount();
$arResult["COUNT_BLOG"] = $count_blog;

$arFilterd = Array("IBLOCK_ID"=>15,"NAME"=>$arResult["PROPERTIES"]["KOLLEG"]["VALUE"]);
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
    $arPropss = $obs->GetProperties(); // свойства элемента
    $arResult["UR_NAME"]=$arFieldss["NAME"];
    $arResult["UR_LINK"]=$arFieldss["DETAIL_PAGE_URL"];
    $arResult["UR_ADRESS"]=$arFieldss["~PREVIEW_TEXT"];
    $arResult["UR_PHONE"]=$arPropss["PHONE"]["VALUE"];
    $arResult["UR_MAP"]=$arPropss["MAP"]["VALUE"];
    $arResult["UR_WEBSITE"]=$arPropss["WEBSITE"]["VALUE"];
}

CModule::IncludeModule("forum");
$arm_Top = CForumMessage::GetList(array("ID" => "ASC"), array("AUTHOR_ID" => $arResult['PROPERTIES']['USER']['VALUE']));
$cont = 0;
while ($arMes = $arm_Top->Fetch()) {
    $cont++;
}
$arResult["COUNT_COMMENT"] = $cont;

?>