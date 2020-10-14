<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?> 

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
    // pdf
    //file_put_contents('log.txt', print_r($_POST, 1), FILE_APPEND);
    ?>
<?//echo substr($arItem["~PREVIEW_TEXT"],-500)
//mb_substr($ar_res['SECOND_NAME'],0,1)
/*function translit($s) {
  $s = (string) $s; // преобразуем в строковое значение
  $s = strip_tags($s); // убираем HTML-теги
  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
  if ($s{strlen($str)-1} == '-') {
		$s = substr($str,0,-1);
	}
  return $s; // возвращаем результат
}*/
?>
    <?
    //$NAME = 'Результат расчета от '.date('d.m.Y H:i');
	//$NAME = mb_substr($_POST['blog_title'],0,100);
    $NAME = $_POST['blog_title'];
	$PREV = $_POST['blog_anons'];
	$DET = $_POST['blog_detail'];
	$CODE =  translit($NAME);
	//$CODE = mb_substr($CODE,0,50);
    $PROPSERVICE['USER'] = $_POST['user_id'];
    $PROPSERVICE['OTR_PRAVO'] = $_POST['PRAVO'];

     $el = new CIBlockElement;
         $arLoadProductSERVICE = Array(
              "IBLOCK_ID"      => 14,
              "NAME"           => $NAME,
              "PREVIEW_TEXT"   => $PREV,
             'PREVIEW_TEXT_TYPE' => 'html',
              "DETAIL_TEXT"   => $DET,
             'DETAIL_TEXT_TYPE' => 'html',
              "CODE" => $CODE,			  
              "PROPERTY_VALUES"=> $PROPSERVICE,
              "ACTIVE"         => "Y",
              "ACTIVE_FROM"=>date('d.m.Y'),
              
          );
      $el->Add($arLoadProductSERVICE);

   /* print "<pre>";
    print_r($arLoadProductSERVICE);
    print "</pre>";*/

    
    $test=0;
    echo json_encode($test);
    exit();

 ?>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>