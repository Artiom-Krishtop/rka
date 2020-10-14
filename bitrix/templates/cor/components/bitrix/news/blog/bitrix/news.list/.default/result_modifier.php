<?
foreach($arResult["ITEMS"] as &$arItem){
				 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
					$res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
						$arItem["LINKS"]=$arFields["DETAIL_PAGE_URL"];
                        $arItem["FOTO"]=$arFields["PREVIEW_PICTURE"];
                        $arItem["NAME_ADVO"]=$arFields["NAME"];
					}
}
?> 