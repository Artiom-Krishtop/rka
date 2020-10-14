<?  
/*foreach($arResult["ITEMS"] as $arItem){

$adv = CUser::GetByID($arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
if($ar_adv = $adv->GetNext())
				 $arFilteradv = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arItem["PROPERTIES"]["USER"]["VALUE"]);	
					$adv = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilteradv, false, Array(), Array());				
					while ($obadv = $adv->GetNextElement()){
						$arFieldsadv = $obadv->GetFields(); // поля элемента
						$arPropsadv = $obadv->GetProperties();
						//$arItem["NAME"] = $arFieldsadv["NAME"];
                       // $arItem["DETAIL_PAGE_URL"] = $arFieldsadv["DETAIL_PAGE_URL"];
                        //$arItem["PREVIEW_PICTURE"] = $arFieldsadv["PREVIEW_PICTURE"];
					} 
}*/
//global $arrFilters;
/*foreach($arResult["ITEMS"] as $arItem){
			$resq = CUser::GetByID($arItem["PROPERTIES"]["USER"]["VALUE"]);
			if($ar_rest = $resq->GetNext())				
				 $arFilter = Array("IBLOCK_ID"=>16,"PROPERTY_USER"=>$arItem["PROPERTIES"]["USER"]["VALUE"]);
					$rest = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, array("nPageSize" => 10), Array());
					//$navStr = $rest->GetPageNavStringEx($navComponentObject, "Ответы:", ".default");	
                    $navCount = $rest->SelectedRowsCount(); 					
					while ($ob = $rest->GetNextElement()){
                     if($navCount>0){   
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента									
						$arItem["QUESTION"][$arFields["ID"]]["Q_LINKS"]=$arFields["DETAIL_PAGE_URL"];
						$arItem["QUESTION"][$arFields["ID"]]["Q_NAMES"]=$arFields["NAME"];
						$arItem["QUESTION"][$arFields["ID"]]["Q_TEXT"]=$arFields["~DETAIL_TEXT"];
                        //$arItem["NAV_STR"] = $navStr;
                     }  
                    }
if($navCount > 0){                    
$arResult["COUNT"][$arItem["ID"]] = $navCount;

$arrFilters["ID"][] = $arItem["ID"];
}    */
    
	/*$arResult['NAV_NUM'] = $arResult['NAV_RESULT']->NavNum; 
	$arResult['NAV_PAGE_NOMER'] = $arResult['NAV_RESULT']->NavPageNomer; 
	$arResult['NAV_PAGE_COUNT'] = $arResult['NAV_RESULT']->NavPageCount; 
	$arResult['SECTION_CODE'] = $arParams["SECTION_CODE"];
	$this->__component->SetResultCacheKeys([
		'NAV_NUM',
		'NAV_PAGE_NOMER',
		'NAV_PAGE_COUNT',
		'SECTION_CODE',
	]); */   
/*print "<pre>";
print_r($arrFilters);
print "</pre>";   */              
//}                      
                 
?> 