<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Комментарии к блогу");
?>
<?
global $USER;
function getTopicAdvokat() {
    global $USER;
    $user_id =$USER->GetID();
    CModule::IncludeModule("iblock");
    CModule::IncludeModule("forum");
    //CModule::IncludeModule("user");
    $arFilter = array(
        "IBLOCK_ID"=>14,
        "PROPERTY_USER" => $user_id,
        //"PROPERTY_USER" => 13665
    );
    $rest = CIBlockElement::GetList(Array("DATE_ACTIVE_FROM"=> 'DESC'),$arFilter, false, array(), Array("DATE_ACTIVE_FROM","PROPERTY_FORUM_TOPIC_ID", "ID", "IBLOCK_ID"));
    $navCount = $rest->SelectedRowsCount();
    while ($ob = $rest->GetNextElement()){
        $arFields = $ob->GetFields(); // поля элемента

        if(!empty($arFields["PROPERTY_FORUM_TOPIC_ID_VALUE"])) {
            $arResult["FOP"][]=$arFields["PROPERTY_FORUM_TOPIC_ID_VALUE"];
        }
    }
    foreach($arResult["FOP"] as $topic){
        $db_res = CForumTopic::GetList(array("SORT"=>"DESC", "ABS_LAST_POST_DATE"=>"DESC"), array("FORUM_ID"=>12,"ID"=>$topic));
        while ($ar_res = $db_res->Fetch())
        {
        	$date = FormatDate('Y-m-d H:i:s',MakeTimeStamp($ar_res["ABS_LAST_POST_DATE"]), time());
            $arResult["TOPICS"][$date]=$topic;
		}
	}
	krsort($arResult["TOPICS"]);
   /* echo "<pre>";
    print_r($arResult["TOPICS"]);
    echo "</pre>";*/
    return $arResult["TOPICS"];
}
$ussersid = getTopicAdvokat();
if ($USER->IsAuthorized()) {
    $APPLICATION->IncludeComponent(
        "bitrix:forum.topic.list",
        "user",
        array(
            "USERS_ID" => $ussersid,
            "CACHE_TIME" => "0",
            "CACHE_TYPE" => "A",
            "DATE_FORMAT" => "d.m.Y",
            "DATE_TIME_FORMAT" => "d.m.Y H:i:s",
            "FID" => "12",
            "MESSAGES_PER_PAGE" => "1000",
            "PAGEN" => "1",
            "FILTER_NAME" => "arrFilter",
            "PAGE_NAVIGATION_TEMPLATE" => "",
            "PAGE_NAVIGATION_WINDOW" => "11",
            "SEO_USER" => "N",
            "SET_NAVIGATION" => "N",
            "SET_TITLE" => "N",
            "SHOW_RSS" => "N",
            "TMPLT_SHOW_ADDITIONAL_MARKER" => "",
            "TOPICS_PER_PAGE" => "1000",
            "URL_TEMPLATES_FORUMS" => "forums.php?GID=#GID#",
            "URL_TEMPLATES_INDEX" => "index.php",
            "URL_TEMPLATES_LIST" => "list.php?FID=#FID#",
            "URL_TEMPLATES_MESSAGE" => "message.php?FID=#FID#&TID=#TID#&MID=#MID#",
            "URL_TEMPLATES_MESSAGE_APPR" => "message_appr.php?FID=#FID#",
            "URL_TEMPLATES_PROFILE_VIEW" => "profile_view.php?UID=#UID#",
            "URL_TEMPLATES_READ" => "read.php?FID=#FID#&TID=#TID#",
            "URL_TEMPLATES_RSS" => "rss.php?TYPE=#TYPE#&MODE=#MODE#&IID=#IID#",
            "URL_TEMPLATES_SUBSCR_LIST" => "subscr_list.php?FID=#FID#",
            "URL_TEMPLATES_TOPIC_MOVE" => "topic_move.php?FID=#FID#&TID=#TID#",
            "URL_TEMPLATES_TOPIC_NEW" => "topic_new.php?FID=#FID#",
            "USE_DESC_PAGE" => "Y",
            "WORD_LENGTH" => "50",
            "COMPONENT_TEMPLATE" => "user"
        ),
        false
    );
}else{
	echo "Доступ запрещен!";
}
/*CModule::IncludeModule("iblock");
$arFilter = Array("IBLOCK_ID"=>14, "PROPERTY_USER"=>13665, "!PROPERTY_FORUM_TOPIC_ID"=>false);
$res = CIBlockElement::GetList(Array(), $arFilter);
while ($ob = $res->GetNextElement()){;
    $arFields = $ob->GetFields(); // поля элемента
    $arProps = $ob->GetProperties(); // свойства элемента
    $ID = "IBLOCK_".$arFields["ID"];
    $arTOPIC[$ID]=$arProps["FORUM_TOPIC_ID"]["VALUE"];
    print "<pre>";
    print_r($arFields["DETAIL_PAGE_URL"]);
    print "<br>";
    print_r($arProps["FORUM_MESSAGE_CNT"]["VALUE"]);
    print "</pre>";
}

$APPLICATION->IncludeComponent("bitrix:forum.statistic", "template1", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"FID" => 12,	// ID форума
		"TID" => $arTOPIC[0],	// ID темы
		"TITLE_SEO" => $_REQUEST["TITLE_SEO"],	// SEO ID темы
		"PERIOD" => "600",	// Период для отображения статистики (мин.)
		"SHOW" => array(	// Отображать в статистике
			0 => "STATISTIC",
		),
		"SHOW_FORUM_ANOTHER_SITE" => "Y",	// Показывать администратору форумы других сайтов
		"FORUM_ID" => "12",	// Форумы
		"URL_TEMPLATES_PROFILE_VIEW" => "profile_view.php?UID=#UID#",	// Страница профиля пользователя
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "0",	// Время кеширования (сек.)
		"CACHE_TIME_USER_STAT" => "600",	// Время кеширования списка пользователей на форуме
		"WORD_LENGTH" => "50",	// Длина слова
		"SEO_USER" => "Y",	// Не индексировать ссылку на профиль
	),
	false
);*/


?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>