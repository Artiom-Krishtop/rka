<?
$arFilter = Array("IBLOCK_ID"=>16, "ACTIVE"=>"N");
$restb = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, array(/*"nTopCount" => 40,"nPageSize" => 10*/), Array());
//$navStrb = $restb->GetPageNavStringEx($navCompsonentObject, "Ответы:", ".default");
$navCountb = $restb->SelectedRowsCount();
while ($oblb = $restb->GetNextElement()){
    $arFieldsb = $oblb->GetFields(); // поля элемента
    //$arPropsb = $oblb->GetProperties(); // свойства элемента
    //$arResult["NAV_STRB"] = $navStrb;
    $arResult["NAV_COUNTB"] = $navCountb;
    //if($arFieldsb['ACTIVE']=="N"){
        $arResult["NOT_NAV_COUNTB"][] = $arFieldsb['ID'];
    //}
    /*print "<pre>";
    print_r($arFieldsb['ID']);
    print "</pre>";*/

}

?> 