<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
 <?
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
//file_put_contents('log.txt', print_r($_POST, 1), FILE_APPEND);

    $PROPSERVICE['USER'] = $_POST['advo_id'];
    $PROPSERVICE['OTR_PRAVO'] = $_POST['PRAVO'];
    $DET = $_POST['detail'];
  
     $el = new CIBlockElement;
         $arLoadProductSERVICE = Array(
              "IBLOCK_ID"      => 16,
              "DETAIL_TEXT"    => $DET,
              "PROPERTY_VALUES"=> $PROPSERVICE,
              "ACTIVE"         => "Y",
              //"ACTIVE_FROM"=>date('d.m.Y'),
          );
    $PRODUCT_ID = $_POST['elem_id'];  // изменяем элемент с кодом (ID) 2
    //$res = $el->Update($PRODUCT_ID, $arLoadProductSERVICE);
    // $el->Add($arLoadProductSERVICE);
     



    print "<pre>";
    print_r($arLoadProductSERVICE);
    print_r($PRODUCT_ID );
    print "</pre>";

                        
                     
    ?>
  