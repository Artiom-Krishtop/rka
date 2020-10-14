#!/usr/local/bin/php -q
<?php
$_SERVER["DOCUMENT_ROOT"] = "/home/bitrix/www";
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


function countMinutesBetweenDates($d1, $d2){
    $d1_ts = strtotime($d1);
    $d2_ts = strtotime($d2);
    $seconds = abs($d1_ts - $d2_ts);
    return floor($seconds / 60);
}

CModule::IncludeModule("iblock");
$arFiltertime = Array("IBLOCK_ID"=>16, "ACTIVE"=>"N", "!PROPERTY_USER"=>false, "!PROPERTY_TIME_ANSW"=>false, "DETAIL_TEXT"=>"");
$restime = CIBlockElement::GetList(Array(), $arFiltertime);
while ($obtime = $restime->GetNextElement()){;
    $arFieldstime = $obtime->GetFields(); // поля элемента
    $arPropstime = $obtime->GetProperties(); // свойства элемента
    $time_now =  date('Y-m-d H:i:s');
    $time_otv = date("Y-m-d H:i:s", strtotime($arPropstime["TIME_ANSW"]["VALUE"]));
    $hour=countMinutesBetweenDates($time_otv, $time_now);
    if(!empty($arPropstime["TIME_ANSW"]["VALUE"])){
        if($hour>30){
            CIBlockElement::SetPropertyValuesEx($arFieldstime['ID'], 16, array("USER" => ""));
            CIBlockElement::SetPropertyValuesEx($arFieldstime['ID'], 16, array("TIME_ANSW" => ""));
            //file_put_contents($_SERVER["DOCUMENT_ROOT"].'/finish_update.txt', print_r('finish',1), FILE_APPEND);
        }
    }
 /*   print "<pre>";
    print_r($arFieldstime['ID']);
    print "<br>";
    print_r($time_now);
    print "<br>";
    print_r($time_otv);
    print "<br>";
    print_r($hour);
    print "</pre>";*/
}

