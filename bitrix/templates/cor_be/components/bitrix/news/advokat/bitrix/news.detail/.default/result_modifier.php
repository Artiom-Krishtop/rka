<?  
$arResult["MORE_PHOTO"] = array();   
   if(isset($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"]) && is_array($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"]))   
   {   
      foreach($arResult["PROPERTIES"]["DOP_PHOTO"]["VALUE"] as $FILE)   
      {   
         $FILE = CFile::GetFileArray($FILE);   
         if(is_array($FILE))   
            $arResult["MORE_PHOTO"][]=$FILE;   
      }   
   }   

$us = CUser::GetByID($arResult['PROPERTIES']['USER']['VALUE']);
$arUser = $us->Fetch();
$arResult['PERSONAL_PHONE']=$arUser["PERSONAL_PHONE"];
     
$res = CUser::GetByID($arResult['PROPERTIES']['USER']['VALUE']);
if($ar_res = $res->GetNext())
				 $arFilter = Array("IBLOCK_ID"=>16,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]);	
					$res = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, Array(), Array());				
					while ($ob = $res->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties();
						$arResult["COUNT"][] = $arFields["ID"];
                        /*print "<pre>";
                        print_r($arResult["COUNT_ACTIVE"]);
                        print "</pre>";*/
                        //$arResult['PERSONAL_PHONE'] = $ar_res['PERSONAL_PHONE'];     
					}
                   

$blog = CUser::GetByID($arResult['DISPLAY_PROPERTIES']['USER']['VALUE']);
if($ar_blog = $blog->GetNext())
				 $arFilterblog = Array("IBLOCK_ID"=>14,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]);	
					$blog = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilterblog, false, Array(), Array());				
					while ($obblog = $blog->GetNextElement()){
						$arFieldsblog = $obblog->GetFields(); // поля элемента
						$arPropsblog = $obblog->GetProperties();
						$arResult["COUNT_BLOG"][] = $arFieldsblog["ID"];
					}   
                    
$adv = CUser::GetByID($arResult['DISPLAY_PROPERTIES']['USER']['VALUE']);
if($ar_adv = $adv->GetNext())
				 $arFilteradv = Array("IBLOCK_ID"=>17,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]);	
					$adv = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilteradv, false, Array(), Array());				
					while ($obadv = $adv->GetNextElement()){
						$arFieldsadv = $obadv->GetFields(); // поля элемента
						$arPropsadv = $obadv->GetProperties();
						$arResult["COUNT_BLAGOD"] = $arPropsadv["BLAGOD"]["VALUE"];
					} 

			$resq = CUser::GetByID($arResult["PROPERTIES"]["USER"]["VALUE"]);
			if($ar_rest = $resq->GetNext())				
				 $arFilter = Array("IBLOCK_ID"=>16,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]);
					$rest = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, array(/*"nTopCount" => 40,*/"nPageSize" => 10), Array());
					$navStr = $rest->GetPageNavStringEx($navComponentObject, "Ответы:", ".default");	
                    $navCount = $rest->SelectedRowsCount(); 					
					while ($ob = $rest->GetNextElement()){
						$arFields = $ob->GetFields(); // поля элемента
						$arProps = $ob->GetProperties(); // свойства элемента									
						$arResult["QUESTION"][$arFields["ID"]]["Q_LINKS"]=$arFields["DETAIL_PAGE_URL"];
						$arResult["QUESTION"][$arFields["ID"]]["Q_NAMES"]=$arFields["NAME"];
						$arResult["QUESTION"][$arFields["ID"]]["Q_TEXT"]=$arFields["~DETAIL_TEXT"];
                        $arResult["QUESTION"][$arFields["ID"]]["Q_ACTIVE"]=$arFields["ACTIVE"];
                        $arResult["NAV_STR"] = $navStr;
                        if($arFields["ACTIVE"]=="Y"){
                            $arResult["NAV_COUNT"] = $navCount;
						}
                    }
                    
			$resb = CUser::GetByID($arResult["PROPERTIES"]["USER"]["VALUE"]);
			if($ar_restb = $resb->GetNext())				
				 $arFilter = Array("IBLOCK_ID"=>14,"PROPERTY_USER"=>$arResult["PROPERTIES"]["USER"]["VALUE"]);
					$restb = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, array(/*"nTopCount" => 40,*/"nPageSize" => 10), Array());
					$navStrb = $restb->GetPageNavStringEx($navComponentObject, "Ответы:", ".default");	
                    $navCountb = $restb->SelectedRowsCount(); 					
					while ($oblb = $restb->GetNextElement()){
						$arFieldsb = $oblb->GetFields(); // поля элемента
						$arPropsb = $oblb->GetProperties(); // свойства элемента									
						$arResult["BLOG"][$arFieldsb["ID"]]["Q_LINKS"]=$arFieldsb["DETAIL_PAGE_URL"];
						$arResult["BLOG"][$arFieldsb["ID"]]["Q_NAMES"]=$arFieldsb["NAME"];
						$arResult["BLOG"][$arFieldsb["ID"]]["Q_TEXT"]=$arFieldsb["~DETAIL_TEXT"];
                        $arResult["NAV_STRB"] = $navStrb;
                        $arResult["NAV_COUNTB"] = $navCountb;
                    }                         
/*print "<pre>";
print_r($arResult["QUESTION"]);
print "</pre>"; */                 
?> 