<?  
/*$arResult["MORE_PHOTO"] = array();
   if(isset($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"]) && is_array($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"]))   
   {   
      foreach($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"] as $FILE)   
      {   
         $FILE = CFile::GetFileArray($FILE);   
         if(is_array($FILE))   
            $arResult["MORE_PHOTO"][]=$FILE;   
      }   
   }   */

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
        $arResult["BLAGOD"]=$arProps["BLAGOD"]["VALUE"];
        /*print "<pre>";
        print_r($arProps);
        print "</pre>";*/
    }
}

$arFilterd = Array("IBLOCK_ID"=>15,"ID"=>$arResult['PROPERTIES']['F_COLLEG']['VALUE']);
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
/*$resElemCnt = CIBlockElement::GetList(
    false,      // сортировка
    array('IBLOCK_ID' => 16,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]),   // фильтрация
    false,      // параметры группировки полей
    false,      // параметры навигации
    array("ID") // поля для выборки
);
$count_otvet = $resElemCnt -> SelectedRowsCount();
$arResult["COUNT_OTVET"] = $count_otvet;*/
$arResult["COUNT_OTVET"] = ListLawAnsw::getAnswerCout($arResult["PROPERTIES"]["USER"]["VALUE"]);

$resElemBl = CIBlockElement::GetList(
    false,      // сортировка
    array('IBLOCK_ID' => 14,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]),   // фильтрация
    false,      // параметры группировки полей
    false,      // параметры навигации
    array("ID") // поля для выборки
);
$count_blog = $resElemBl -> SelectedRowsCount();
$arResult["COUNT_BLOG"] = $count_blog;

CModule::IncludeModule("forum");
$arm_Top = CForumMessage::GetList(array("ID" => "ASC"), array("AUTHOR_ID" => $arResult['PROPERTIES']['USER']['VALUE']));
$cont = 0;
while ($arMes = $arm_Top->Fetch()) {
    $cont++;
}
$arResult["COUNT_COMMENT"] = $cont;

$cp = $this->__component; // объект компонента

if (is_object($cp))
{
    // добавим в arResult компонента поля
    $cp->arResult['OTR_PRAVO'] = $arResult['PROPERTIES']['OTR_PRAVO'];
    //$cp->arResult['SPECIAL_SLIDER_SRC'] = $arResult['DETAIL_PICTURE']['SRC'];
    //$cp->arResult['SPECIAL_DESCR'] = $arResult['PREVIEW_TEXT'];
    $cp->SetResultCacheKeys(array('OTR_PRAVO'));

    // сохраним их в копии arResult, с которой работает шаблон
   /* $arResult['SPECIAL_LOGO_SRC'] = $cp->arResult['SPECIAL_LOGO_SRC'];
    $arResult['SPECIAL_SLIDER_SRC'] = $cp->arResult['SPECIAL_SLIDER_SRC'];
    $arResult['SPECIAL_DESCR'] = $cp->arResult['SPECIAL_DESCR'];*/
}
?> 