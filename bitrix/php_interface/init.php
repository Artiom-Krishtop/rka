<?
/*AddEventHandler('main', 'OnEpilog', '_Check404Error', 1);
function _Check404Error(){
    if (defined('ERROR_404') && ERROR_404 == 'Y') {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/header.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/404.php';
        include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/footer.php';
    }
}*/
/*function getMaxAdvokat()
{
    CModule::IncludeModule("iblock");
    $arFilterd = array(
        "IBLOCK_ID" => 21,
    );
    $restd = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM" => 'DESC'), $arFilterd, false, array(), Array("ID"));
    while ($obd = $restd->GetNextElement()) {
        $arFieldsd = $obd->GetFields(); // поля элемента
        $ID_OT[] = $arFieldsd["ID"];
    }

    foreach ($ID_OT as $it) {
        $arFilter = array(
            "IBLOCK_ID" => 17,
            "PROPERTY_SFERA_DET" => $it
        );
        $rest = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM" => 'DESC'), $arFilter, false, array(), Array("DATE_ACTIVE_FROM", "PROPERTY_USER", "PROPERTY_SFERA_DET", "ID", "IBLOCK_ID"));
        while ($ob = $rest->GetNextElement()) {
            $arFields = $ob->GetFields(); // поля элемента
            $ID_AD[$arFields["ID"]] = $arFields["PROPERTY_USER_VALUE"];
        }
    }

    foreach ($ID_AD as $key => $id) {
        $resElemCnt = CIBlockElement::GetList(
            false,      // сортировка
            array('IBLOCK_ID' => 16, "PROPERTY_USER" => $id, "ACTIVE" => "Y"),   // фильтрация
            false,      // параметры группировки полей
            false,      // параметры навигации
            array("ID") // поля для выборки
        );
        global $count;
        $count = $resElemCnt->SelectedRowsCount();
        $ID_SORT[$key] = $count;
        arsort($ID_SORT);
    }
    $ID_SORT = array_keys ($ID_SORT);
    return $ID_SORT;
}*/
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

function my_onAfterResultAddUpdate($WEB_FORM_ID, $RESULT_ID)
{
  if ($WEB_FORM_ID == 3) 
  {
       $arAnswer = CFormResult::GetDataByID(
            $RESULT_ID,
           array("SIMPLE_QUESTION_643"),
            $arResult2,
            $arAnswer2);
       $text = "<div class='webform-confirmation chekw'><p>Спасибо, обращение отправлено.</p></div><div class='links'><a href='/electronic-appeal/'>Вернуться к форме</a></div><style>.field-item.even{display:none;}</style>";
       $_SESSION['answer_text']= $text;
  }
    if ($WEB_FORM_ID == 4)
    {
        $arAnswer = CFormResult::GetDataByID(
            $RESULT_ID,
            array("SIMPLE_QUESTION_529","SIMPLE_QUESTION_668","SIMPLE_QUESTION_814"),
            $arResult2,
            $arAnswer2);
        $text = "<div class='webform-confirmation chekw'><p style='color:green;'>Ваш вопрос отправлен.</p></div><style>.field-item.even{display:none;}</style>";
        $_SESSION['answer_text']= $text;

        $kolleg=$arAnswer['SIMPLE_QUESTION_529'][0]['ANSWER_ID'];
        if($kolleg==39){$val=64;}
        elseif($kolleg==40){$val=70;}
        elseif($kolleg==41){$val=69;}
        elseif($kolleg==42){$val=68;}
        elseif($kolleg==43){$val=67;}
        elseif($kolleg==44){$val=65;}
        elseif($kolleg==45){$val=71;}
        elseif($kolleg==46){$val=66;}
        else{$val="";}
        $NAME = mb_substr($_POST['form_textarea_36'],0,100);
        $PREV = $_POST['form_textarea_36'];
        $CODE =  translit($NAME);
        $CODE = mb_substr($CODE,0,50);
        $PROPSERVICE['F_EMAIL'] = $_POST['form_email_37'];
        $PROPSERVICE['F_NAME'] = $_POST['form_text_47'];
        $PROPSERVICE['F_COLLEG'] = $val;
        $PROPSERVICE['F_PHONE'] = $_POST['form_text_48'];
		CModule::IncludeModule("iblock");
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
        $email=$arAnswer['SIMPLE_QUESTION_814'][0]['USER_TEXT'];
        $str = $arAnswer['SIMPLE_QUESTION_668'][0]['USER_TEXT'];
        $colstr=strlen($str);
        $emails=["1"=>"showdance.by@yandex.ru","2"=>"ShowDance.by@yandex.ru","3"=>"leshhenko.1988@mail.ru"];
        if($colstr>2000 && in_array($email, $emails)){

        }else{
            $ID=$el->Add($arLoadProductSERVICE);

            $ele = new CIBlockElement;
            $arL = Array(
                "IBLOCK_ID"      => 16,
                "CODE" => $CODE."-".$ID,
            );
            $res = $ele->Update($ID, $arL);
        }


        CFormResult::Delete($RESULT_ID);
        //file_put_contents($_SERVER["DOCUMENT_ROOT"]."/add_message.log", date("d-m-Y")."; ".print_r($kolleg,1).";\n", FILE_APPEND);
    }
}

AddEventHandler('form', 'onAfterResultAdd', 'my_onAfterResultAddUpdate');
// регистрируем последнюю активность пользователя, если модуль соцсетей не установлен
if(!IsModuleInstalled('socialnetwork')) {
   AddEventHandler('main', 'OnBeforeProlog', 'CustomSetLastActivityDate');
   function CustomSetLastActivityDate() {
      if($GLOBALS['USER']->IsAuthorized()) {
         CUser::SetLastActivityDate($GLOBALS['USER']->GetID());
      }
   }
}

function getActiveAdvokat() {
    CModule::IncludeModule("iblock");
    $DATE1 = date("01.m.Y 00:00:00", strtotime("-1 month"));
    $DATE2 = date("t.m.Y 23:59:59", strtotime("-1 month"));
     /*$DATE1 = "01.06.2018 00:00:00"; $DATE2 = "30.06.2018 23:59:59";*/
    $arFilter = array(
    "IBLOCK_ID"=>16,
         ">=DATE_ACTIVE_FROM" => $DATE1,
        "<=DATE_ACTIVE_FROM" => $DATE2,   
    );				 
                        $rest = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, array(), Array("DATE_ACTIVE_FROM","PROPERTY_PUBLIC_DATE","PROPERTY_USER", "ID", "IBLOCK_ID"));
                        $navCount = $rest->SelectedRowsCount(); 	      
                        while ($ob = $rest->GetNextElement()){
                            $arFields = $ob->GetFields(); // поля элемента
                            if(!empty($arFields["PROPERTY_USER_VALUE"])) {
                                $arResult["counter"][$arFields["PROPERTY_USER_VALUE"]]++;
                            }
                        }
    arsort($arResult["counter"]);  
    $arResult["counter"]=array_slice($arResult["counter"],0,7,TRUE);
                          
   // $arrKeys = array_keys($arResult["counter"]);   
    return $arResult["counter"];    
}
function getAdvokat() {
    CModule::IncludeModule("iblock");
        //date_default_timezone_set('UTC'); //should be set in your script or in your php.ini
       // $date = new DateTime('FIRST DAY OF PREVIOUS MONTH');
        //$DATE1 = $date->format('d.m.Y');
       // $date2 = new DateTime('LAST DAY OF PREVIOUS MONTH');
        //$DATE2 =$date2->format('d.m.Y');
     $DATE1 = "01.06.2018 00:00:00"; $DATE2 = "30.06.2018 23:59:59";
    $arFilter = array(
    "IBLOCK_ID"=>16,
         ">=DATE_ACTIVE_FROM" => $DATE1,
        "<=DATE_ACTIVE_FROM" => $DATE2,   
    );				 
                        $rest = CIBlockElement::GetList(Array('SORT' => 'ASC', 'ID' => 'DESC'),$arFilter, false, array(), Array("DATE_ACTIVE_FROM","PROPERTY_PUBLIC_DATE","PROPERTY_USER", "ID", "IBLOCK_ID"));
                        $navCount = $rest->SelectedRowsCount(); 	      
                        while ($ob = $rest->GetNextElement()){
                            $arFields = $ob->GetFields(); // поля элемента
                            $arResult["counter"][$arFields["PROPERTY_USER_VALUE"]]++;								
                        }
    arsort($arResult["counter"]);  
    $arResult["counter"]=array_slice($arResult["counter"],0,7,TRUE);
    return $arResult["counter"];    
}


AddEventHandler("main", "OnAfterUserUpdate", Array("EventHandlerClass", "OnAfterUserUpdateHandler"));
class EventHandlerClass
{
    function OnAfterUserUpdateHandler(&$arFields)
    {

        global $USER;
        // условие атоподписки, если пользователь подтверждает регистрацию или если admin редактирует пользователя
        if(
            ($arFields['RESULT'] && $_GET['confirm_user_id'] > 0 && $_GET['confirm_code'] && $_GET['confirm_user_id'] == $arFields['ID']) ||
            $USER->IsAdmin()
        ){
            // поиск польщователя
            $filter = Array(
                "ID" => $arFields['ID'],
            );

            // выбираем EMAIL и свойство UF_SUBSCR
            $rsUsers = CUser::GetList(
                ($by="id"),
                ($order="desc"),
                $filter,
                array(
                    'FIELDS' => array('ID', 'EMAIL'),
                    'SELECT' => array('UF_SUBSCR')
                )
            );
            if($usParam = $rsUsers->Fetch()){

                CModule::IncludeModule("subscribe");
                $subscr = new CSubscription;

                // если свойство заполнено то полписываем
                if($usParam['UF_SUBSCR']){

                    // поиск подписчика по mail
                    $subscription = CSubscription::GetByEmail($usParam['EMAIL']);

                    if($arSub = $subscription->Fetch()){
                        // если майл есть в подписчиках, то активируем подписку
                        $res = $subscr->Update($arSub['ID'], array(
                                "ACTIVE"        => "Y",
                                "USER_ID"        => $usParam['ID'],
                                "RUB_ID"        => array(G_SUBSCRIPTION),// id подписки
                            )
                        );

                    }else{
                        // если нет подписки, то добавляем его
                        $arFieldFiltr = Array(
                            "RUB_ID"        => array(G_SUBSCRIPTION),// id подписки
                            "USER_ID"        => $usParam['ID'],
                            "FORMAT"        => "text",
                            "EMAIL"            => $usParam['EMAIL'],
                            "ACTIVE"        => "Y",
                            "SEND_CONFIRM"    => 'N'
                        );
                        $ID = $subscr->Add($arFieldFiltr);
                        // поиск подписчика по mail, что бы получить код потверждения
                        $subscription = CSubscription::GetByEmail($usParam['EMAIL']);
                        if($arSub = $subscription->Fetch()){
                            $arResult['DATA_SUB_USSER']    = $arSub;
                        }

                        // подтверждаем подписку
                        $res = $subscr->Update($ID,
                            array(
                                "CONFIRMED"        => "Y",
                                "CONFIRM_CODE"    => $arResult['DATA_SUB_USSER']["CONFIRM_CODE"]
                            )
                        );
                        unset($arResult);
                    }
                }else{
                    // если при обновлении пользователя свойство пустое, то деактивируем подписчика
                    $subscription = CSubscription::GetByEmail($usParam['EMAIL']);
                    if($arSub = $subscription->Fetch()){
                        // активируем подписку
                        $res = $subscr->Update($arSub['ID'], array(
                                "ACTIVE"        => "N",
                            )
                        );
                    }
                }
            }
        }
    }
}


AddEventHandler("main", "OnAfterUserUpdate", Array("MyClassUp", "OnAfterUserUpdateHandler"));

class MyClassUp
{
    // создаем обработчик события "OnAfterUserUpdate"
    function OnAfterUserUpdateHandler(&$arFields)
    {
        if($arFields["RESULT"] && (in_array(10, CUser::GetUserGroup($arFields["ID"])) || in_array(1, CUser::GetUserGroup($arFields["ID"]))))
            {
                CModule::IncludeModule("iblock");
                $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
                $arFilter = Array("IBLOCK_ID"=>17, "PROPERTY_USER"=>$arFields["ID"]);
                $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                $count = $res->SelectedRowsCount();
                if ($count>0) {
                $ob = $res->GetNextElement();
                $arFieldsElement = $ob->GetFields();
                if ($arFieldsElement['ID']>0) {
                    $el = new CIBlockElement;
                    $logo='';
                    if ($arFields['PERSONAL_PHOTO']>0) $logo = CFile::GetFileArray($arFields['PERSONAL_PHOTO']);
                     $arLoadProductArray = Array(
                      "IBLOCK_ID"      => 17,
                      "NAME"           => $arFields['LAST_NAME'].' '.$arFields['NAME'].' '.$arFields['SECOND_NAME'],
                      "DETAIL_PICTURE"  => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$logo["SRC"]),
                      "PREVIEW_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$logo["SRC"]),
                    );
                    
                    $el->Update($arFieldsElement['ID'], $arLoadProductArray);
                }
                }
                
            }
    }
}

AddEventHandler("forum", "onAfterMessageUpdate", "onAfterMessageUpdateHandler");

function onAfterMessageUpdateHandler($id, &$arField){

    $filter = array("ID"=>$id,"APPROVED"=>"Y");
    $rs = CForumMessage::GetList(array("SORT"=>"ASC"),$filter);
    while($topic = $rs->fetch()) {$arResult["TOPICS"] = $topic;}
    preg_match_all('/<a.*?>(.*?)<\/a>/i', $arResult["TOPICS"]["POST_MESSAGE_HTML"], $matches);
    $name = $matches[1][0];
    if($arResult["TOPICS"]["APPROVED"] =="Y"){
        CModule::IncludeModule("iblock");
        $arSelectMes = Array("ID", "NAME", "PROPERTY_BLAGOD");
        $arFilterMes = Array("IBLOCK_ID"=>17, "NAME"=>$name);
        $resMes = CIBlockElement::GetList(Array(), $arFilterMes, false, false, $arSelectMes);
        if ($obMes = $resMes->GetNextElement()) {
            $arFieldMes = $obMes->GetFields();
            $val = $arFieldMes["PROPERTY_BLAGOD_VALUE"]+1;
            CIBlockElement::SetPropertyValuesEx($arFieldMes['ID'], 17, array("BLAGOD" => $val));
        }
        /*file_put_contents($_SERVER["DOCUMENT_ROOT"]."/add_message.log", date("d-m-Y")."; ID=".print_r($id,1)."; ".print_r($val,1).";\n", FILE_APPEND);*/
    }
}

?>