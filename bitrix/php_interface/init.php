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

/* Перезапись данных форм в инфоблок */
AddEventHandler('form', 'onAfterResultAdd', 'my_onAfterResultAddUpdate');
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

        $userText = $arAnswer["SIMPLE_QUESTION_668"][0]["USER_TEXT"];
        if( min( mb_strlen($userText, "UTF-8"), strlen($userText) ) > 2000)
        {
            $text = "<p style='color:red;'>Внимание! Длинна вопроса превышает допустимые 2 000 символов. И он не может быть отправлен.</p>";
        }
        else
        {
            $numberInText = false;
            preg_match_all('/\b\d[- \/\d]*\d\b/', $_POST['form_textarea_36'], $arPhoneTest);
            foreach ($arPhoneTest[0] as $phoneTest)
            {
                $phoneTest = preg_replace('/\D+/', '', $phoneTest);
                if (stripos($phoneTest, "447496838") !== false)
                    $numberInText = true;
            }

            $email = $arAnswer["SIMPLE_QUESTION_814"][0]["USER_TEXT"];
            $banListEmails = Array(
                "showdance.by@yandex.ru",
                "ShowDance.by@yandex.ru",
                "leshhenko.1988@mail.ru",
                "air@mail.com",
                "tv@gmail.com",
                "tv11@mail.com"
            );

            if ($numberInText == false && !in_array($email, $banListEmails))
            {
                switch ($arAnswer["SIMPLE_QUESTION_529"][0]["ANSWER_ID"])
                {
                    case 39: $kolleg = 64; break;
                    case 40: $kolleg = 70; break;
                    case 41: $kolleg = 69; break;
                    case 42: $kolleg = 68; break;
                    case 43: $kolleg = 67; break;
                    case 44: $kolleg = 65; break;
                    case 45: $kolleg = 71; break;
                    case 46: $kolleg = 66; break;
                    default: $kolleg = "";
                }
                $NAME = customNameForFAQ($_POST['form_textarea_36']);
                $PREV = $_POST['form_textarea_36'];
                $CODE = translit($NAME);
                $CODE = mb_substr($CODE,0,50);
                $PROPSERVICE['F_EMAIL'] = $_POST['form_email_37'];
                $PROPSERVICE['F_NAME'] = $_POST['form_text_47'];
                $PROPSERVICE['F_COLLEG'] = $kolleg;
                $PROPSERVICE['F_PHONE'] = $_POST['form_text_48'];

                CModule::IncludeModule("iblock");
                $el = new CIBlockElement;
                $arLoadProductSERVICE = Array(
                    "IBLOCK_ID"         => 16,
                    "NAME"              => $NAME,
                    "PREVIEW_TEXT"      => $PREV,
                    "CODE"              => $CODE,
                    "PROPERTY_VALUES"   => $PROPSERVICE,
                    "ACTIVE"            => "N",
                    "ACTIVE_FROM"       => date('d.m.Y'),
                );
                $ID = $el->Add($arLoadProductSERVICE);

                if($ID)
                {
                    $ele = new CIBlockElement;
                    $arL = Array(
                        "IBLOCK_ID" => 16,
                        "CODE"      => $CODE."-".$ID,
                    );
                    $res = $ele->Update($ID, $arL);

                    if($res)
                    {
                        if(isset($arLoadProductSERVICE["PROPERTY_VALUES"]["F_EMAIL"]) && !empty($arLoadProductSERVICE["PROPERTY_VALUES"]["F_EMAIL"]))
                        {
                            $arKolleg = CIBlockSection::GetByID($arLoadProductSERVICE["PROPERTY_VALUES"]["F_COLLEG"])->GetNext();

                            \Bitrix\Main\Mail\Event::sendImmediate(
                                array(
                                    "EVENT_NAME" => "FORM_FILLING_SIMPLE_FORM_4_ANSVER",
                                    "LID" => "s1",
                                    "C_FIELDS" => array(
                                        "NAME" => $arLoadProductSERVICE["PROPERTY_VALUES"]["F_NAME"],
                                        "PHONE" => $arLoadProductSERVICE["PROPERTY_VALUES"]["F_PHONE"],
                                        "EMAIL" => $arLoadProductSERVICE["PROPERTY_VALUES"]["F_EMAIL"],
                                        "KOLLEGIA" => $arKolleg["NAME"],
                                        "QUESTION" => $arLoadProductSERVICE["PREVIEW_TEXT"],
                                        "URL" => 'https://'.$_SERVER["SERVER_NAME"].'/question/'.$arL["CODE"].'/',
                                        "DATE" => $arLoadProductSERVICE["ACTIVE_FROM"]
                                    ),
                                ));
                        }
                        $text = "<p style='color:green;'>Ваш вопрос отправлен.</p>";
                    }
                    else
                        $text = "<p style='color:red;'>Возникла ошибка! Попробуйте отправить вопрос еще раз.</p>";
                }
                else
                    $text = "<p style='color:red;'>Возникла ошибка! Попробуйте отправить вопрос еще раз.</p>";


            }
            else
                $text = "<p style='color:red;'>Возникла ошибка! Ваш вопрос не может быть отправлен.</p>";
        }

        $row = "<div class='webform-confirmation chekw'>".$text."</div><style>.field-item.even{display:none;}</style>";
        $_SESSION['answer_text']= $row;

        CFormResult::Delete($RESULT_ID, "N");
    }
}

function customNameForFAQ($name)
{
    $arReplace = array("здравствуйте", "здраствуйте", "добрый", "доброго", "доброе", "додень", "времени суток", "день", "дня", "вечер", "вечера", "утро", "утра", "господа", "уважаемые", "уважаемая", "коллегия", "юристы и адвокаты", "адвокаты и юристы", "адвокаты", "юристы", "адвокатов", "юристов", "пожалуйста", "скажите", "подскажите", "ответьте", "помогите", "поясните", "проконсультируйте", "пожалуйста", "на вопросы", "на вопрос", "хочу уточнить", "хочу задать", "у меня такой", "вопрос", "вопросы", "у меня вопрос", "такой вопрос", "вопрос такой", "ответ", "я хочю уточнить", "я хочу уточнить", "хочу уточнить", "у вас один вопрос", "один вопрос", "вопрос", "к вам", "у вас", "от вас", "разобраться");
    $trimmed = ltrim($name," \n\r\t\v\0\.\,\:\;\!\"\'\#\&\*\(\)\{\}\[\]\/\-\+");
    $trimmed = preg_replace('/\s{2,}/', ' ', $trimmed);
    foreach ($arReplace as $repl) {
        $trimmed = preg_replace('/^'.$repl.'/iu', '', $trimmed);
        $trimmed = ltrim($trimmed," \n\r\t\v\0\.\,\:\;\!\"\'\#\&\*\(\)\{\}\[\]\/\-\+");
    }
    $trimmed = mb_substr($trimmed,0,100);

    return $trimmed;
}

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
    if(!CModule::IncludeModule("iblock"))
        return;

    $arResult = array();

    //$DATE1 = date("01.m.Y 00:00:00", strtotime("-1 month"));
    //$DATE2 = date("t.m.Y 23:59:59", strtotime("-1 month"));
    /*$arFilter = array(
        "IBLOCK_ID"=>16,
        ">=DATE_ACTIVE_FROM" => $DATE1,
        "<=DATE_ACTIVE_FROM" => $DATE2,
    );*/

    $date = Bitrix\Main\Type\Date::createFromTimestamp(strtotime("first day of previous month"));
    $dateTime = new Bitrix\Main\UI\Filter\DateTime($date->getTimestamp());
    $DATE_FROM = $dateTime->toString();
    $DATE_TO = $dateTime->offset("1 month - 1 second");

    $arFilter = Array
    (
        "IBLOCK_ID" => 16,
        ">=DATE_ACTIVE_FROM" => $DATE_FROM,
        "<=DATE_ACTIVE_FROM" => $DATE_TO,
        "ACTIVE" => "Y",
    );
    $rest = CIBlockElement::GetList(
        Array('SORT' => 'ASC', 'ID' => 'DESC'),
        $arFilter,
        false,
        array(),
        Array("DATE_ACTIVE_FROM","PROPERTY_PUBLIC_DATE","PROPERTY_USER", "ID", "IBLOCK_ID")
    );

    $navCount = $rest->SelectedRowsCount();

    while ($ob = $rest->GetNextElement()){
        $arFields = $ob->GetFields(); // поля элемента
        if(!empty($arFields["PROPERTY_USER_VALUE"])) {
            $arResult["counter"][$arFields["PROPERTY_USER_VALUE"]]++;
        }
    }

    arsort($arResult["counter"]);

    $arResult["counter"] = array_slice($arResult["counter"],0,7,TRUE);

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

/*
 * Вспомогательная функция. Распечатывает переменные и массивы во время отладки.
 * Результат виден только администратору.
 * */
function p( $_mixVar=null, $_intExit=null )
{
    global $USER;
    if ($USER->IsAdmin())
    {
        echo "<div align='left' style='background-color:#FFFFFF;color:#000000;width:100%;'><hr><pre>";
        if ( 2==$_intExit||3==$_intExit )
            var_dump( $_mixVar );
        elseif ( is_array( $_mixVar )||is_object( $_mixVar ) )
            print_r( $_mixVar );
        else
            echo $_mixVar;
        echo '</pre><hr></div>';
        if ( 1==$_intExit||3==$_intExit)
            exit;
    }
}

/* Список адвокатов для ЮНИСЕФ. Данные сохраняются как файл /upload/lawyers.csv */
function listLawyersCSV()
{
    if(CModule::IncludeModule("iblock"))
    {
        global $APPLICATION;
        $expUsersFile = 'lawyers.csv';
        $strDlmtr = ';';
        $lineDlmtr = "\n";
        $arUsers = array('#;ФИО;Номер лицензии;Дата выдачи лицензии;Коллегия;Место работы;Основной номер телефона;Дополнительные номера телефонов;Мессенджеры;Электронная почта;Адрес: Область;Адрес: Район;Адрес: Населенный пункт;Адрес: Улица;Адрес: Номер дома;Адрес: корпус;Адрес: Номер помещения;График работы;Основные отрасли права;Ссылка на фото;gps-координаты');
        $i = 1;

        $rsResCat = CIBlockElement::GetList(Array(), Array("IBLOCK_ID" => 17, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y"), false, false, Array("ID", "IBLOCK_ID"));
        while($arItemCat = $rsResCat->GetNextElement())
        {
            $arFields = $arItemCat->GetFields();
            $arProps = $arItemCat->GetProperties();

            $userParams = array(
                "SELECT" => array("UF_COLLEGIA", "UF_CONSULT", "UF_BURO", "UF_IND_US"),
                "FIELDS" => array("ID", "NAME", "LAST_NAME", "SECOND_NAME", "EMAIL", "PERSONAL_PHONE", "PERSONAL_PHOTO")
            );

            $db = CUser::GetList($a, $b, array("ID" => $arProps["USER"]["VALUE"]), $userParams);
            while ($u = $db->Fetch())
            {
                $fio = '';
                if(strlen(trim($u["LAST_NAME"])))
                    $fio .= trim($u["LAST_NAME"]);
                if(strlen(trim($u["NAME"])))
                    $fio .= ' '.trim($u["NAME"]);
                if(strlen(trim($u["SECOND_NAME"])))
                    $fio .= ' '.trim($u["SECOND_NAME"]);

                if (strlen(trim($arProps["KOLLEG"]["VALUE"])))
                    $collegia = trim($arProps["KOLLEG"]["VALUE"]);
                elseif(strlen(trim($u["UF_COLLEGIA"])))
                    $collegia = trim($u["UF_COLLEGIA"]);
                else
                    $collegia = '';

                $map = '';
                $a_state = '';
                $a_district = '';
                $a_city = '';
                $a_street = '';
                $a_house = '';
                $a_building = '';
                $a_room = '';

                if((isset($arProps["IND_DEYAT"]["VALUE"]) && !empty($arProps["IND_DEYAT"]["VALUE"])) or (isset($u["UF_IND_US"]) && !empty($u["UF_IND_US"])))
                {
                    $work = 'Осуществляет адвокатскую деятельность индивидуально';

                    if($arProps["MAP"]["VALUE"])
                        $map = $arProps["MAP"]["VALUE"];

                    if (strlen(trim($arProps["IND_STATE"]["VALUE"])))
                        $a_state = trim($arProps["IND_STATE"]["VALUE"]);

                    if (strlen(trim($arProps["IND_DISTRICT"]["VALUE"])))
                        $a_district = trim($arProps["IND_DISTRICT"]["VALUE"]);

                    if (strlen(trim($arProps["IND_CITY"]["VALUE"])))
                        $a_city = trim($arProps["IND_CITY"]["VALUE"]);

                    if (strlen(trim($arProps["IND_STREET"]["VALUE"])))
                        $a_street = trim($arProps["IND_STREET"]["VALUE"]);

                    if (strlen(trim($arProps["IND_HOUSE"]["VALUE"])))
                        $a_house = trim($arProps["IND_HOUSE"]["VALUE"]);

                    if (strlen(trim($arProps["IND_BUILDING"]["VALUE"])))
                        $a_building = trim($arProps["IND_BUILDING"]["VALUE"]);

                    if (strlen(trim($arProps["IND_ROOM"]["VALUE"])))
                        $a_room = trim($arProps["IND_ROOM"]["VALUE"]);
                }
                else
                {
                    $resWork = CIBlockElement::GetList(Array(), Array("IBLOCK_ID" => 15, "ACTIVE" => "Y", "PROPERTY_ADVOKATS" => $u["ID"]), false, false, Array("IBLOCK_ID", "ID", "NAME", "PREVIEW_TEXT"));
                    while($arWork = $resWork->GetNextElement())
                    {
                        $fieldsWork = $arWork->GetFields();
                        $propsWork = $arWork->GetProperties();

                        if(strlen(trim($fieldsWork["NAME"])))
                            $work = trim($fieldsWork["NAME"]);
                        else
                            $work = trim($u["UF_CONSULT"]);

                        if($propsWork["MAP"]["VALUE"])
                            $map = $propsWork["MAP"]["VALUE"];

                        if (strlen(trim($propsWork["COL_STATE"]["VALUE"])))
                            $a_state = trim($propsWork["COL_STATE"]["VALUE"]);

                        if (strlen(trim($propsWork["COL_DISTRICT"]["VALUE"])))
                            $a_district = trim($propsWork["COL_DISTRICT"]["VALUE"]);

                        if (strlen(trim($propsWork["COL_CITY"]["VALUE"])))
                            $a_city = trim($propsWork["COL_CITY"]["VALUE"]);

                        if (strlen(trim($propsWork["COL_STREET"]["VALUE"])))
                            $a_street = trim($propsWork["COL_STREET"]["VALUE"]);

                        if (strlen(trim($propsWork["COL_HOUSE"]["VALUE"])))
                            $a_house = trim($propsWork["COL_HOUSE"]["VALUE"]);

                        if (strlen(trim($propsWork["COL_BUILDING"]["VALUE"])))
                            $a_building = trim($propsWork["COL_BUILDING"]["VALUE"]);

                        if (strlen(trim($propsWork["COL_ROOM"]["VALUE"])))
                            $a_room = trim($propsWork["COL_ROOM"]["VALUE"]);
                    }
                    unset($resWork, $arWork, $fieldsWork, $propsWork);
                }

                if (strlen(trim($arProps["PHONE"]["VALUE"])))
                {
                    preg_match(
                        '/^[0-9-+()\s]+/',
                        preg_replace(
                            "/^(.*?)([0-9])(.*?)$/",
                            '\\2\\3',
                            str_replace(
                                ' ',
                                '',
                                preg_replace(
                                    '/[^0-9-+()\s,;._:]/',
                                    ',',
                                    $arProps["PHONE"]["VALUE"]
                                )
                            )
                        ),
                        $phone_array
                    );
                    $phone = preg_replace( '/[^0-9]/', '', $phone_array[0] );
                    unset($phone_array);
                }
                //elseif(strlen(trim($u["PERSONAL_PHONE"])))
                    //$phone = trim($u["PERSONAL_PHONE"]);
                else
                    $phone = '';

                $phone_phone = '';
                if (strlen(trim($arProps["PHONE_DOP"]["VALUE"])))
                    $phone_phone = preg_replace( '/[^0-9\,]', '', $arProps["PHONE_DOP"]["VALUE"] );

                $skype = '';
                if (strlen(trim($arProps["SKYPE"]["VALUE"])))
                    $skype = 'SKYPE: '.trim($arProps["SKYPE"]["VALUE"]);


                if (strlen(trim($arProps["ISQ"]["VALUE"])))
                {
                    if(strlen($skype))
                        $skype .= ', ISQ: ';
                    $skype .= trim($arProps["ISQ"]["VALUE"]);
                }

                if (strlen(trim($arProps["MESSENGERS"]["VALUE"])))
                {
                    if(strlen($skype))
                        $skype .= ', ';
                    $skype .= trim($arProps["MESSENGERS"]["VALUE"]);
                }

                if (strlen(trim($arProps["EMAIL"]["VALUE"])))
                    $email = trim($arProps["EMAIL"]["VALUE"]);
                //elseif(strlen(trim($u["EMAIL"])))
                    //$email = trim($u["EMAIL"]);
                else
                    $email = '';

                $schedule = '';
                if (strlen(trim($arProps["SCHEDULE"]["VALUE"])))
                    $schedule = trim($arProps["SCHEDULE"]["VALUE"]);

                $photo = '';
                if(isset($u["PERSONAL_PHOTO"]) && !empty($u["PERSONAL_PHOTO"]))
                    $photo = ((\Bitrix\Main\Context::getCurrent()->getRequest()->isHttps()) ? 'https://rka.by' : 'http://rka.by').CFile::GetPath($u["PERSONAL_PHOTO"]);

                $sferaPrava = '';
                if(is_array($arProps["SFERA_DET"]["VALUE"]))
                {
                    $si = 0;
                    foreach ($arProps["SFERA_DET"]["VALUE"] as $v)
                    {
                        $resSfera = CIBlockElement::GetList(Array(), Array("IBLOCK_ID" => 21, "ID" => $v), false, false, Array("ID", "NAME"));
                        while($arSfera = $resSfera->GetNext())
                        {
                            if($si >= 1)
                                $sferaPrava .= ', ';
                            $sferaPrava .= $arSfera["NAME"];
                            $si ++;
                        }
                        unset($resSfera, $arSfera);
                    }
                    unset($v, $si);
                }

                /*
                    #
                    ФИО
                    Номер лицензии
                    Дата выдачи лицензии
                    Коллегия
                    Место работы
                    Основной номер телефона
                    Дополнительные номера телефонов
                    Мессенджеры
                    Электронная почта
                    Адрес: Область
                    Адрес: Район
                    Адрес: Населенный пункт
                    Адрес: Улица
                    Адрес: Номер дома
                    Адрес: корпус
                    Адрес: Номер помещения
                    График работы
                    Основные отрасли права
                    Ссылка на фото
                    gps-координаты
                */
                $pattern = '/[\;]/u';
                $replacement = ',';
                $tmp = array(
                    $i++,
                    $fio,
                    preg_replace($pattern, $replacement, trim($arProps["NOM_LIC"]["VALUE"])),
                    preg_replace($pattern, $replacement, trim($arProps["DATA_LIC"]["VALUE"])),
                    preg_replace($pattern, $replacement, $collegia),
                    preg_replace($pattern, $replacement, $work),
                    preg_replace($pattern, $replacement, $phone),
                    preg_replace($pattern, $replacement, $phone_phone),
                    preg_replace($pattern, $replacement, $skype),
                    preg_replace($pattern, $replacement, $email),
                    preg_replace($pattern, $replacement, $a_state),
                    preg_replace($pattern, $replacement, $a_district),
                    preg_replace($pattern, $replacement, $a_city),
                    preg_replace($pattern, $replacement, $a_street),
                    preg_replace($pattern, $replacement, $a_house),
                    preg_replace($pattern, $replacement, $a_building),
                    preg_replace($pattern, $replacement, $a_room),
                    preg_replace($pattern, $replacement, $schedule),
                    $sferaPrava,
                    $photo,
                    preg_replace($pattern, $replacement, $map)
                );
                //if($arFields["ID"] === '104985')
                //    p($arFields["ID"]);

                $arUsers[] = implode($strDlmtr, $tmp).';';

                unset($tmp, $fio, $collegia, $phone, $phone_phone, $skype, $email, $work, $map, $photo, $sferaPrava, $a_state, $a_district, $a_city, $a_street, $a_house, $a_building, $a_room, $schedule);
            }
            unset($db, $u, $arFields, $arProps);

        }
        unset($rsResCat, $arItemCat);

        $strUsers = implode($lineDlmtr, $arUsers);
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/'.$expUsersFile, $strUsers, LOCK_EX);
    }

    return "listLawyersCSV();";
}

/* Удаление по расписанию сообщений форума "Вопрос-ответ", в течении последних трех месяцев не прошедших модерацию и неопубликованных по каким либо причинам.  */
function deleteNotActiveMessages()
{
    global $USER, $DB;

    $date = Bitrix\Main\Type\Date::createFromTimestamp(strtotime("- 3 month"));
    $dateTime = new Bitrix\Main\UI\Filter\DateTime($date->getTimestamp());
    $DATE_TO = $dateTime->offset("- 1 second");

    // выберем все неопубликованные сообщения
    if(CModule::IncludeModule("forum"))
    {
        $db_res = CForumMessage::GetList(array("ID" => "ASC"), array( "FORUM_ID" => 13, "<=POST_DATE" => $DATE_TO ));
        while ($ar_res = $db_res->Fetch())
        {
            // Проверяем, имеет ли текущий пользователь право удалять сообщения и удаляем, если имеет
            if (CForumMessage::CanUserDeleteMessage($ar_res["ID"], $USER->GetUserGroupArray(), $USER->GetID(), true))
            {
                // Проверка существования темы форума, к которой привязаны сообщения.
                if (CForumTopic::GetByID($ar_res["TOPIC_ID"]))
                {
                    // Удаляем лишь те, которые не активированы
                    if ($ar_res["APPROVED"] == "N" && $ar_res["NEW_TOPIC"] == "N" && $ar_res["USE_SMILES"] == "N")
                        CForumMessage::Delete($ar_res["ID"]);
                }
                else
                {
                    // Если темы форума нет, то удаляем "не привязанные" сообщения
                    $DB->Query("DELETE FROM b_forum_message WHERE ID=".$ar_res["ID"]);
                }
            }
        }
    }
    return "deleteNotActiveMessages();";
}

/* Удаление по расписанию элементов инфоблока "Вопрос-ответ", в течении последнего месяца не прошедших модерацию и неопубликованных по каким либо причинам.  */
function deleteNotActiveFAQ()
{
    global $USER, $DB;

    $date = Bitrix\Main\Type\Date::createFromTimestamp(strtotime("- 1 month"));
    $dateTime = new Bitrix\Main\UI\Filter\DateTime($date->getTimestamp());
    $DATE_TO = $dateTime->offset("- 1 second");

    // выберем все неопубликованные сообщения
    if(CModule::IncludeModule("iblock"))
    {
        $arFilter = Array( "IBLOCK_ID" => 16, "<=DATE_MODIFY_TO" => $DATE_TO, "ACTIVE" => "N" );
        $rest = CIBlockElement::GetList(
            Array('SORT' => 'ASC', 'ID' => 'DESC'),
            $arFilter,
            false,
            array(),
            Array("PROPERTY_FORUM_TOPIC_ID", "ID", "IBLOCK_ID")
        );
        while ($ob = $rest->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $topicID = $arFields["PROPERTY_FORUM_TOPIC_ID_VALUE"];
            if(!empty($topicID))
            {
                if (CForumTopic::GetByID($topicID))
                {
                    $db_res = CForumMessage::GetList( array("ID" => "ASC"), array( "FORUM_ID" => 13, "TOPIC_ID" => $topicID ) );
                    while ($ar_res = $db_res->Fetch())
                    {
                        if (CForumMessage::CanUserDeleteMessage($ar_res["ID"], $USER->GetUserGroupArray(), $USER->GetID()))
                            CForumMessage::Delete($ar_res["ID"]);
                    }

                    if (CForumTopic::CanUserDeleteTopic($topicID, $USER->GetUserGroupArray(), $USER->GetID()))
                        CForumTopic::Delete($topicID);
                }
            }
            if(CIBlock::GetPermission($arFields["IBLOCK_ID"])>='W')
            {
                $DB->StartTransaction();
                if(!CIBlockElement::Delete($arFields["ID"]))
                    $DB->Rollback();
                else
                    $DB->Commit();
            }
        }
    }
    return "deleteNotActiveFAQ();";
}

/* Удаление по расписанию элементов инфоблока "Вопрос-ответ" старше года.  */
function deleteOldFAQ()
{
    global $USER, $DB;

    $date = Bitrix\Main\Type\Date::createFromTimestamp(strtotime("- 1 year"));
    $dateTime = new Bitrix\Main\UI\Filter\DateTime($date->getTimestamp());
    $DATE_TO = $dateTime->offset("- 1 second");

    if (CModule::IncludeModule("iblock"))
    {
        //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', date("Y.m.d").PHP_EOL, FILE_APPEND);

        $rest = CIBlockElement::GetList(
            Array( 'SORT' => 'ASC', 'ID' => 'DESC' ),
            Array( "IBLOCK_ID" => 16, "<=DATE_MODIFY_TO" => $DATE_TO ),
            false,
            Array("nTopCount" => 1000),
            Array( "PROPERTY_FORUM_TOPIC_ID", "ID", "IBLOCK_ID" )
        );
        while ($ob = $rest->GetNextElement())
        {
            $arFields = $ob->GetFields();

            //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', 'Элемент: '.$arFields["ID"], FILE_APPEND);

            $topicID = intval($arFields["PROPERTY_FORUM_TOPIC_ID_VALUE"]);
            if(!empty($topicID))
            {
                if (CModule::IncludeModule("forum"))
                {
                    $arTopic = CForumTopic::GetByID($topicID);
                    //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', ". Тема ".$topicID." существует: '".(!empty($arTopic) ? 'Да' : 'Нет')."'", FILE_APPEND);

                    $db_res = CForumMessage::GetList( array("ID" => "ASC"), array( "FORUM_ID" => 13, "TOPIC_ID" => $topicID ) );
                    while ($ar_res = $db_res->Fetch())
                    {
                        if (CForumMessage::CanUserDeleteMessage($ar_res["ID"], $USER->GetUserGroupArray(), $USER->GetID(), true))
                        {
                            if (!empty($arTopic)) {
                                CForumMessage::Delete($ar_res["ID"]);
                                //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', '. Удалено сообщение: '.$ar_res["ID"], FILE_APPEND);
                            }
                            else {
                                $DB->Query("DELETE FROM b_forum_message WHERE ID=" . $ar_res["ID"]);
                                //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', '. Удалено сообщение (HARD): '.$ar_res["ID"], FILE_APPEND);
                            }
                        }
                    }

                    if (!empty($arTopic))
                    {
                        if (CForumTopic::CanUserDeleteTopic($topicID, $USER->GetUserGroupArray(), $USER->GetID(), true)) {
                            CForumTopic::Delete($topicID);
                            //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', '. Удалена тема: '.$topicID, FILE_APPEND);
                        }
                    }
                }
            }

            $DB->StartTransaction();
            if(!CIBlockElement::Delete($arFields["ID"])) {
                $DB->Rollback();
                //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', '. Ошибка: '.$arFields["ID"], FILE_APPEND);
            }
            else {
                $DB->Commit();
                //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', '. Удален элемент: '.$arFields["ID"], FILE_APPEND);
            }
            //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', PHP_EOL.'--------------------'.PHP_EOL, FILE_APPEND);
        }
        //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', PHP_EOL, FILE_APPEND);
    }

    /*if(CModule::IncludeModule("search"))
    {
        $NS = false;
        $NS = CSearch::ReIndexAll(false, 60, $NS);
        while(is_array($NS)) {
            $NS = CSearch::ReIndexAll(false, 60, $NS);
        }
        //file_put_contents($_SERVER['DOCUMENT_ROOT'].'/upload/faq-debug-log.txt', PHP_EOL.'--- Reindex Search Completely ---'.PHP_EOL, FILE_APPEND);
    }*/
    return "deleteOldFAQ();";
}

?>