<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!CModule::IncludeModule('iblock'))
	return;

$arResult['FILTER'] = array();
if( $arParams['ARCORP_PROP_VACANCY_TYPE']!='' ) {
	$arResult['FILTER']['VALUES'] = array();
	$propertyEnums = CIBlockPropertyEnum::GetList(array(),array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "CODE"=>$arParams['ARCORP_PROP_VACANCY_TYPE']));
	while($arFields = $propertyEnums->GetNext()) {
		$arResult['FILTER']['VALUES'][] = array(
			'ID' => $arFields['ID'],
			'VALUE' => $arFields['VALUE'],
			'XML_ID' => $arFields['XML_ID'],
		);
	}
}

// получаем разделы
$dbResSect = CIBlockSection::GetList(
   Array("SORT"=>"ASC"),
   Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'])
);
//Получаем разделы и собираем в массив
while($sectRes = $dbResSect->GetNext())
{
 $arSections[] = $sectRes;
}
//Собираем  массив из Разделов и элементов
foreach($arSections as $arSection){   
 foreach($arResult["ITEMS"] as $key=>$arItem){  
   if($arItem['IBLOCK_SECTION_ID'] == $arSection['ID']){
   $arSection['ELEMENTS'][] =  $arItem;
   }
 } 
 $arElementGroups[] = $arSection; 
}
$arResult["ITEMS"] = $arElementGroups;