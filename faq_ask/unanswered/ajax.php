<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?

if(!canAnswer()){
    echo json_encode(2);
    exit();
}

CModule::IncludeModule("iblock");


$props_info = array();
$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>16));

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

$PROPSERVICE['USER'] = $_POST['advo_id'];
$PROPSERVICE['OTR_PRAVO'] = $_POST['PRAVO'];
$PROPSERVICE['F_COLLEG'] = $_POST['colleg_id'];
$PROPSERVICE['F_EMAIL'] = $_POST['email_id'];
$PROPSERVICE['PUBLIC_DATE'] = $_POST['pub_id'];
$PROPSERVICE['F_NAME'] = $_POST['ORIG_NAME'];
$PROPSERVICE['F_PHONE'] = $_POST['ORIG_PHONE'];

$DET = $_POST['otvet_detail'];

$el = new CIBlockElement;
$arLoadProductSERVICE = Array(
    "IBLOCK_ID"      => 16,
    "DETAIL_TEXT"    => $DET,
    "PROPERTY_VALUES"=> $PROPSERVICE,
    "ACTIVE"         => "Y",
);
$PRODUCT_ID = $_POST['elem_id'];  // изменяем элемент с кодом (ID) 2
$arFilter = Array("IBLOCK_ID"=>16, "ID"=>$PRODUCT_ID);
$res = CIBlockElement::GetList(Array(), $arFilter);
if ($ob = $res->GetNextElement()){;
    $arFields = $ob->GetFields(); // поля элемента
    $arProps = $ob->GetProperties(); // свойства элемента
    $Detail = $arFields["DETAIL_TEXT"];
    $Advokat = $arProps["USER"];
}

if(empty($Detail)){
    $res = $el->Update($PRODUCT_ID, $arLoadProductSERVICE);
    if($res)
    {
        // Добавляем адвокату $PROPSERVICE['USER'] к количеству отвеченных вопросов.
        ListLawAnsw::addElement($PROPSERVICE['USER'], $PRODUCT_ID);

        if($PROPSERVICE["F_EMAIL"])
        {
            // И отправляем на адрес $PROPSERVICE['F_EMAIL'] уведомление и ссылку об ответе
            $arKolleg = CIBlockSection::GetByID($arProps["F_COLLEG"]["VALUE"])->GetNext();

            \Bitrix\Main\Mail\Event::sendImmediate(
                array(
                    "EVENT_NAME" => "LAWYER_RESPONSE_RECEIVED",
                    "LID" => "s1",
                    "C_FIELDS" => array(
                        "NAME" => $PROPSERVICE["F_NAME"],
                        "PHONE" => $PROPSERVICE["F_PHONE"],
                        "EMAIL" => $PROPSERVICE["F_EMAIL"],
                        "KOLLEGIA" => $arKolleg["NAME"],
                        "QUESTION" => $arFields["PREVIEW_TEXT"],
                        "URL" => 'https://'.$_SERVER["SERVER_NAME"].$arFields["DETAIL_PAGE_URL"],
                        "DATE" => $arFields["DATE_ACTIVE_FROM"]
                    ),
                ));
        }

        sumCounterAnswer();
    }
    echo json_encode(0);
    exit();
}else{
    echo json_encode(1);
    exit();
}?>
