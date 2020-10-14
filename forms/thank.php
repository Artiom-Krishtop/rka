<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
 <?
    
    function search($array, $key, $value)
        {
            $results = array();
        
            if (is_array($array))
            {
                if (isset($array[$key]) && $array[$key] == $value)
                    $results[] = $array;
        
                foreach ($array as $subarray)
                    $results = array_merge($results, search($subarray, $key, $value));
            }
            
            return $results;
        }
        
        function GetTimebyCode($rates, $code) {
            $nedeed = search($rates,'CODE',$code);
            return $nedeed[0]['MINUTES'];
        }
        
        function GetNamebyCode($rates, $code) {
            $nedeed = search($rates,'CODE',$code);
            return $nedeed[0]['NAME'];
        }
        
    CModule::IncludeModule("iblock");
    CModule::IncludeModule("forum");
    
     /*$props_info = array();
                    $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>22));
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
                             
                          }*/

        $ID_ADVO = preg_match_all("/\[(.*?)\]/", $_POST['ADVOKAT'], $matches);
        $ID_ADVO = $matches[1][0];
        $IP = $_POST['ip'];
        $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL","PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
        $arFilter = Array("IBLOCK_ID"=>17, "ACTIVE"=>"Y","PROPERTY_USER"=>$ID_ADVO);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        if($ar_res = $res->GetNext())
        $link = 'href="'.$ar_res['DETAIL_PAGE_URL'].'"';
        $name = $ar_res['NAME'];
        $data_id = 'data-id="'.$ID_ADVO.'"' ;
        $data_ip = 'data-id="'.$IP.'"' ;
        $NAME_ADVO = preg_replace("/\[[^\]]*\]/", '', $_POST['ADVOKAT']);
        $message = "<p>Спасибо за помощь адвокату <a  ".$data_ip." ".$data_id." ".$link." target=\"_blank\" rel=\"nofollow\">".$name."</a></p>";
        if(!empty($_POST['MESSAGE'])) {
            $message = $message . "<p>" . $_POST['MESSAGE'] . "</p>";
        }
        $date = date("d.m.Y H:i:s");
        if(!empty($_POST['user_id'])){
            $user_id = $_POST['user_id'];
        }else{
            $user_id = "";
        }

        $arFields = Array(
            "NEW_TOPIC" => "N",
            "TOPIC_ID" => "1168",
            "LAST_POSTER_NAME" => $_POST['NAME'],
            "LAST_POST_DATE" => $date,
            "LAST_MESSAGE_ID" => $xID++,
            "POST_MESSAGE" => $message,
            "USE_SMILES" => "N",
            "APPROVED" => "N",
            "AUTHOR_NAME" =>  $_POST['NAME'],
            "AUTHOR_ID" => $user_id,
            "FORUM_ID" => "14",
            "POST_DATE" => $date,
            //"PARAM1" => $ID_ADVO,
            "AUTHOR_IP" => $IP
        );
/*print "<pre>";
print_r($arFields);
print "</pre>";*/
        $ID = CForumMessage::Add($arFields);
  /*   $el = new CIBlockElement;
         $arLoadProductSERVICE = Array(
              "IBLOCK_ID"      => 22,
              "NAME"           => $NAME,
              "PROPERTY_VALUES"=> array(
			   "BLAG_NAME" =>$PROPSERVICE['NAME'],		   
			   "BLAG_ADVO" =>$PROPSERVICE['ADVOKAT'],
			   "BLAG_VOPRO" =>$PROPSERVICE['VOPROS'],
			   "BLAG_TEXT" =>$PROPSERVICE['MESSAGE'],			   
			   ),              
              "ACTIVE"         => "N",
             
              "ACTIVE_FROM"=>date('d.m.Y'),
              
          );
     $el->Add($arLoadProductSERVICE);*/
     
     
	 /*$arFilters = Array("IBLOCK_ID"=>22,"PROPERTY_BLAG_ADVO"=>$ID_ADVO);
					$ress = CIBlockElement::GetList(Array(), $arFilters);
					while ($obs = $ress->GetNextElement()){;
						$arField = $obs->GetFields(); // поля элемента
						$arProp = $obs->GetProperties(); // свойства элемента
                        $arResult["counter"][$arField['ID']]++;
                        $count = count($arResult["counter"]);  
					   }     
$countInt = ($count+1) - $count;   */ 
/*	 $arFilter = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$ID_ADVO);
					$res = CIBlockElement::GetList(Array(), $arFilter);
					if ($ob = $res->GetNextElement()){;
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента
					   }*/
//$chislo = $arProps['BLAGOD']["VALUE"] + 1;
//CIBlockElement::SetPropertyValuesEx($arFields['ID'], 17, array("BLAGOD" => $chislo));


                        
                     
    ?>
  