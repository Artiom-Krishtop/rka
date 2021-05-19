<?  


foreach($arResult["ITEMS"] as &$arItem){
	
$resr = CUser::GetByID($arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
		if($ar_res = $resr->GetNext())	

		$arItem["US_ID"]=$ar_res;
		
				 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
					//$res = CIBlockElement::GetList(Array(), $arFilter);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
	if($arProps["USER"]["VALUE"]==$ar_res['ID']){							
						$arItem["LINKS"]=$arFields["DETAIL_PAGE_URL"];
						
					}
					}
		
}

/*$filter = Array
(
      "ID"=>$arItem['DISPLAY_PROPERTIES']['USER']['VALUE']
);
$res = CUser::GetList(
   ($by = 'ID'),
   ($order = 'desc'),
   array('GROUPS_ID' => array(10)),
    $filter 
);
$is_filtered = $rsUsers->is_filtered; // отфильтрована ли выборка ?
while ($arUser = $res->GetNext())
{	
}
*/
/*$arResult["MORE_PHOTO"] = array();   
   if(isset($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"]) && is_array($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"]))   
   {   
      foreach($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"] as $FILE)   
      {   
         $FILE = CFile::GetFileArray($FILE);   
         if(is_array($FILE))   
            $arResult["MORE_PHOTO"][]=$FILE;   
      }   
   }  */ 
?> 