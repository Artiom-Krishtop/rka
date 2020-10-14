<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?> 
  
<?if ($_POST['query']=='advokat_edit' && $_POST['PROFILE_ID']>0 ) {
    
      CModule::IncludeModule("iblock");   
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["PHONE"] , "PHONE");
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["SITE_LINK"] , "SITE_LINK");
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["ISQ"] , "ISQ");
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["SKYPE"] , "SKYPE");
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["EMAIL_ADVO"] , "EMAIL");
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["NOM_MEDIAT"] , "NOM_MEDIAT");
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["NOM_LIC"] , "NOM_LIC");
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["DATA_LIC"] , "DATA_LIC");
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["REG_NOM"] , "REG_NOM");    
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["DATA_ADV"] , "DATA_ADV");    
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["DATA_YUR"] , "DATA_YUR");    
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["IND_DEYAT"] , "IND_DEYAT");    
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, $_POST["SFERA_DET"] , "SFERA_DET");    
      
      
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, array("VALUE"=>array("TEXT"=>$_POST['DOP_SFERA'], "TYPE"=>"html")) , "DOP_SFERA");
      CIBlockElement::SetPropertyValues($_POST['PROFILE_ID'], 17, array("VALUE"=>array("TEXT"=>$_POST['LANG'], "TYPE"=>"html")) , "LANG");
        $DETAIL_TEXT = $_POST['DETAIL_TEXT'];
        $arLoadProductSERVICE = Array(
              "IBLOCK_ID"      => 17,
              "DETAIL_TEXT" =>$DETAIL_TEXT,  
              "DETAIL_TEXT_TYPE"=>"html"
          );
       
         
         
         
         $el = new CIBlockElement;
         
           if($perfomer_id =  $el->Update($_POST['PROFILE_ID'], $arLoadProductSERVICE)) {
                
                $test=1;
                echo json_encode($test);
                exit();
            }
            else {
                echo $el->LAST_ERROR;
                exit();
            }
}
else {
                $test=0;
                echo json_encode($test);
                exit();
}
 ?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>