<?
$min_date = $_REQUEST['date_filter_min'];//date("d.m.Y")
$max_date = $_REQUEST['date_filter_max'];
$format = "YYYY-MM-DD";
$new_format1 = "DD.MM.YYYY 00:00:00";
$new_format2 = "DD.MM.YYYY 23:59:59";
$new_date_min = $DB->FormatDate($min_date, $format, $new_format1);
$new_date_max = $DB->FormatDate($max_date, $format, $new_format2);

//foreach($arResult["ITEMS"] as &$arItem){
				 $arFilter = Array("IBLOCK_ID"=>16,"PROPERTY_USER"=>$USER->GetID(), ">=DATE_ACTIVE_FROM"  => $new_date_min, "<=DATE_ACTIVE_FROM"  => $new_date_max);
					$res = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM"=>"DESC"),$arFilter, false, Array(), Array());
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
                        $arResult["PDF_ITEMS"][]=$arFields;
						//$arItem["LINKS"]=$arFields["DETAIL_PAGE_URL"];
                        //$arItem["NAME_ADVO"]=$arFields["NAME"];
					}
//}
?> 