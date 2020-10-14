<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>
<?include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
$cpt = new CCaptcha();
$captchaPass = COption::GetOptionString("main", "captcha_password", "");
if(strlen($captchaPass) <= 0) {
    $captchaPass = randString(10);
    COption::SetOptionString("main", "captcha_password", $captchaPass);
}
$cpt->SetCodeCrypt($captchaPass);
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
    // pdf
    //file_put_contents('log.txt', print_r($_POST, 1), FILE_APPEND);
    ?>
<?//echo substr($arItem["~PREVIEW_TEXT"],-500)
//mb_substr($ar_res['SECOND_NAME'],0,1)
function translit($s) {
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
}
?>
<?
//if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // access
    //$secretKey = '6LfysLwUAAAAAM_W6Gok0IoB27hYXYqrhvWuGJES';
   // $captcha = $_POST['g-recaptcha-response'];
   /* $url = 'https://www.google.com/recaptcha/api/siteverify?'.$postdata;
    $url = urlencode($url);
    $response = file_get_contents($url);
    $postdata = http_build_query(
        array(
            'secret'    =>  '6LfysLwUAAAAAM_W6Gok0IoB27hYXYqrhvWuGJES',
            'response' => $_POST['g-recaptcha-response'],
            'remoteip'  =>  $_SERVER['REMOTE_ADDR']
        )
    );
    $url = 'https://www.google.com/recaptcha/api/siteverify?'.$postdata;
    //$url = urlencode($url);
    $response = file_get_contents($url);
    $responses = json_decode($response, true);*/

   /* if($responses["success"] === TRUE){
        echo "true";
    }else{
        echo "false";
    }*/
   /*     $url = 'https://www.google.com/recaptcha/api/siteverify';

        $recaptcha = $_POST['g-recaptcha-response'];
        $secret = '6LfysLwUAAAAAM_W6Gok0IoB27hYXYqrhvWuGJES';
        $ip = $_SERVER['REMOTE_ADDR'];

        $url_data = $url.'?secret='.$secret.'&response='.$recaptcha.'&remoteip='. $ip;
        //$er = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptcha;
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url_data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $res = curl_exec($curl);
        curl_close($curl);

        $res = json_decode($res);*/


    /*if(!$captcha){
        global $eror;
        $eror= "Y";
        $_POST['eror']="Y";
        echo '<p class="alert alert-warning">Please check the captcha form.</p>';
        exit;
    }*/

   // $ip = $_SERVER['REMOTE_ADDR'];
   // $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
   // $responseKeys = json_decode($response,true);
    /*print "<pre>";
    print_r($response);
    print "</pre>";*/
   /* $post_data = http_build_query(
        array(
            'secret' => $secretKey,
            'response' => $_POST['g-recaptcha-response'],
            'remoteip' => $_SERVER['REMOTE_ADDR']
        )
    );
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $post_data
        )
    );
    $context  = stream_context_create($opts);
    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
    $result = json_decode($response);
    if (!$result->success) {
        throw new Exception('Gah! CAPTCHA verification failed. Please email me directly at: jstark at jonathanstark dot com', 1);
    }else{*/
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['g-recaptcha-response'])) {
            exit('Empty');
        }
    }
        $NAME = mb_substr($_POST['detailed_question'],0,100);
        $PREV = $_POST['detailed_question'];
        $CODE =  translit($NAME);
        $CODE = mb_substr($CODE,0,50);
        $PROPSERVICE['F_EMAIL'] = $_POST['faq_email'];
        $PROPSERVICE['F_NAME'] = $_POST['NAME'];
        $PROPSERVICE['F_COLLEG'] = $_POST['field_kollegia'];
        $PROPSERVICE['F_PHONE'] = $_POST['PHONE'];

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


        $test=0;
        echo json_encode($test);
        exit();
   // }

    //$ip = $_SERVER['REMOTE_ADDR'];
    //$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
   // $responseKeys = json_decode($response,true);
   /* print "<pre>";
    print_r($response);
    print "</pre>";
    if(intval($responseKeys["success"]) !== 1) {
        echo '<p class="alert alert-warning">Please check the the captcha form.</p>';
    } else {
        # Mail Content
        $NAME = mb_substr($_POST['detailed_question'],0,100);
        $PREV = $_POST['detailed_question'];
        $CODE =  translit($NAME);
        $CODE = mb_substr($CODE,0,50);
        $PROPSERVICE['F_EMAIL'] = $_POST['faq_email'];
        $PROPSERVICE['F_NAME'] = $_POST['NAME'];
        $PROPSERVICE['F_COLLEG'] = $_POST['field_kollegia'];
        $PROPSERVICE['F_PHONE'] = $_POST['PHONE'];

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


        $test=0;
        echo json_encode($test);
        exit();
*/

        # Send the email.
       /* $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo '<p class="alert alert-success">Thank You! Your message has been sent.</p>';
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo '<p class="alert alert-warning">Oops! Something went wrong, we couldnt send your message.</p>';
        }*/
   // }

//} else {
    # Not a POST request, set a 403 (forbidden) response code.
    //http_response_code(403);
    //echo '<p class="alert alert-warning">There was a problem with your submission, please try again.</p>';
//}
?>
    <?
    //$NAME = 'Результат расчета от '.date('d.m.Y H:i');
/*	$NAME = mb_substr($_POST['detailed_question'],0,100);
	$PREV = $_POST['detailed_question'];
	$CODE =  translit($NAME);
	$CODE = mb_substr($CODE,0,50);
    $PROPSERVICE['F_EMAIL'] = $_POST['faq_email'];
    $PROPSERVICE['F_NAME'] = $_POST['NAME'];
    $PROPSERVICE['F_COLLEG'] = $_POST['field_kollegia'];
	$PROPSERVICE['F_PHONE'] = $_POST['PHONE'];

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
    
    
    $test=0;
    echo json_encode($test);
    exit();*/

 ?>

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>