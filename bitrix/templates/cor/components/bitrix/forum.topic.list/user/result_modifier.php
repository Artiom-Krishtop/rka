<?

foreach ($arParams["USERS_ID"] as $grade=>$val) {
    //$arResult["TID"][] = $val;
    foreach ($arResult["TOPICS"] as $res) {
        if ($res["ID"] == $val) {
            $arResult["NEWITEMS"][] = $res;

        }else{
            $res="";
           // $arResult["TOPICS"] ="";
        }
    }
}
$arResult["TOPICS"] = $arResult["NEWITEMS"];
$arResult["Topics"] = $arResult["NEWITEMS"];


foreach ($arResult["TOPICS"] as $key=> &$res){

    $id_blog = str_replace('IBLOCK_','',$res["XML_ID"]);
    $arFilter = Array("IBLOCK_ID"=>14, "ID"=>$id_blog,"PROPERTY_USER"=>$USER->GetID());
    $rest = CIBlockElement::GetList(Array(), $arFilter);
    while ($ob = $rest->GetNextElement()){;
        $arFields = $ob->GetFields(); // поля элемента
        $arProps = $ob->GetProperties(); // свойства элемента
        $res["LINKS"]=$arFields["DETAIL_PAGE_URL"];
        $res["NAME_ADVO"]=$arFields["NAME"];
    }


}
/*foreach($arResult["ITEMS"] as &$arItem){
    $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arItem['DISPLAY_PROPERTIES']['USER']['VALUE']);
    $res = CIBlockElement::GetList(Array(),$arFilter, false, Array(), Array());
    while ($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields(); // поля элемента
        $arItem["LINKS"]=$arFields["DETAIL_PAGE_URL"];
        $arItem["NAME_ADVO"]=$arFields["NAME"];
    }
}
?>
/*echo "<pre>";
print_r($arResult["TOPICS"]);
echo "</pre>";*/
/*$id_blog = str_replace('IBLOCK_','',$topic["XML_ID"]);
$arFilter = Array("IBLOCK_ID"=>14, "ID"=>$id_blog,"PROPERTY_USER"=>13665);
$res = CIBlockElement::GetList(Array(), $arFilter);
if ($ob = $res->GetNextElement()){;
    $arFields = $ob->GetFields(); // поля элемента
    $arProps = $ob->GetProperties(); // свойства элемента
    if ($arFields["ID"] == ''){continue;}

    $db_res = CForumMessage::GetListEx(array("ID"=>"DESC"), array("TOPIC_ID"=>$topic["ID"]));
    while ($ar_res = $db_res->Fetch())
    {
        $arMessage = CForumMessage::GetByID($ar_res["ID"]);

        if (empty($arMessage['AUTHOR_ID'])){

            $str = preg_replace("/\[[^\]]*\]/", '', $arMessage['POST_MESSAGE']);


            $arFields['POST_MASSAGE'] = htmlspecialchars($arMessage['POST_MESSAGE_HTML']);
        }}

}*/
?> 