<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
CModule::IncludeModule("iblock");


$props_info = array();
$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>14));
while ($prop_fields = $properties->GetNext())
{
    $props_info[$prop_fields['CODE']]  = $prop_fields;
    if ($prop_fields['PROPERTY_TYPE']=='L') {
        $cheboxes_ru = array();
        $property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$prop_fields['IBLOCK_ID'], "CODE"=>$prop_fields['CODE']));
        while($enum_fields = $property_enums->GetNext())
        {
            $cheboxes_ru[] = array("ID"=>$enum_fields["ID"], "NAME" => $enum_fields["VALUE"], "XML_ID" => $enum_fields["XML_ID"]);
        }
        $props_info[$prop_fields['CODE']]['VALUES'] = $cheboxes_ru;
    }

}
//file_put_contents('log.txt', print_r($_POST, 1), FILE_APPEND);

$PROPSERVICE['USER'] = $_POST['advo_id'];
$PROPSERVICE['OTR_PRAVO'] = $_POST['PRAVO'];
$PROPSERVICE['FORUM_TOPIC_ID'] = $_POST['topic_id'];
$PROPSERVICE['FORUM_MESSAGE_CNT'] = $_POST['mess_count'];
$NAME = $_POST['blog_title'];
$PREV = $_POST['blog_anons'];
$DET = $_POST['otvet_detail'];
$DET = str_replace("span","p", $DET);
//$parser = new CTextParser;
//$detailText = $parser->convertText($DET);

$ACT = $_POST['no_active'];
if(!empty($ACT)){
    $val ="N";
}else{
    $val="Y";
}
/*if($ACT =="Y"){
    $val ="N";
}elseif($ACT =="N"){
    $val ="Y";
}else{
    $val="";
}*/

$el = new CIBlockElement;
$arLoadProductSERVICE = Array(
    "IBLOCK_ID"      => 14,
    "NAME"           => $NAME,
    "PREVIEW_TEXT"   => $PREV,
    "DETAIL_TEXT"    => $DET,
    'PREVIEW_TEXT_TYPE' => 'html',
    'DETAIL_TEXT_TYPE' => 'html',
    "PROPERTY_VALUES"=> $PROPSERVICE,
    "ACTIVE"         => $val,
    //"ACTIVE_FROM"=>date('d.m.Y'),
);
$PRODUCT_ID = $_POST['elem_id'];  // изменяем элемент с кодом (ID) 2
/*$arFilter = Array("IBLOCK_ID"=>16, "ID"=>$PRODUCT_ID);
$res = CIBlockElement::GetList(Array(), $arFilter);
if ($ob = $res->GetNextElement()){;
    $arFields = $ob->GetFields(); // поля элемента
    $arProps = $ob->GetProperties(); // свойства элемента
    $Detail = $arFields["DETAIL_TEXT"];
    $Advokat = $arProps["USER"];
}*/

//if($val=="N" && !empty($DET)){
    $res = $el->Update($PRODUCT_ID, $arLoadProductSERVICE);
    echo json_encode(0);
    exit();
//}else{

//    echo json_encode(0);
//    exit();
//}
//if(empty($Detail)){
    //$res = $el->Update($PRODUCT_ID, $arLoadProductSERVICE);
    //echo json_encode(0);
   // exit();
/*}else{
    echo json_encode(1);
    exit();
}/
// $el->Add($arLoadProductSERVICE);*/




/*print "<pre>";
print_r($arLoadProductSERVICE);
print "</pre>";*/



?>
