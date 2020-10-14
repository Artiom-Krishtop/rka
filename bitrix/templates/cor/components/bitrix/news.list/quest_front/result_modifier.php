<?
foreach($arResult["ITEMS"] as &$arItem){
    			 $arSelect = Array("ID", "NAME","DETAIL_PAGE_URL");
				 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), $arSelect);
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
?> 