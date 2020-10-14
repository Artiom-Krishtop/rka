<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if ($_POST['send_message']=='Y' && !empty($_POST['send_message']) && $_POST['mid']!='' && CModule::IncludeModule("iblock")) {
    $arParams = array("replace_space"=>"-","replace_other"=>"-");
    $NAME = mb_substr($_POST['message'],0,100);
    $PREV = $_POST['message'];
    $CODE = Cutil::translit($NAME,"ru",$arParams);
    $CODE = mb_substr($CODE,0,50);
    $PROPSERVICE['F_EMAIL'] = $_POST['email'];
    $PROPSERVICE['F_NAME'] = $_POST['name'];
    $PROPSERVICE['MESSAGE_ID'] = $_POST['mid'];
    $PROPSERVICE['EMAIL_HEADER'][0] = Array("VALUE" => Array("TEXT" => $_POST['header'], "TYPE" => "text"));

    $el = new CIBlockElement;
    $arLoadProductSERVICE = Array(
        "IBLOCK_ID"      => 16,
        "NAME"           => $NAME,
        "PREVIEW_TEXT"   => $PREV,
        "CODE" => $CODE,
        "PROPERTY_VALUES"=> $PROPSERVICE,
        "ACTIVE"         => "N",
        "ACTIVE_FROM"=>date('d.m.Y'),
    );
    $el->Add($arLoadProductSERVICE);
    
}