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
?> 