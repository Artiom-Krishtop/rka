<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<?
CModule::IncludeModule("iblock");
CModule::IncludeModule("form");


$RESULT_ID = 29634; // ID результата

$arAnswer = CFormResult::GetDataByID(
    $RESULT_ID,
    array("SIMPLE_QUESTION_529","SIMPLE_QUESTION_668","SIMPLE_QUESTION_814"),  // вопрос "Какие области знаний вас интересуют?"
    $arResult,
    $arAnswer2);

// выведем поля результата
//echo "<pre>"; print_r($arResult); echo "</pre>";

// выведем значения ответов
//echo "<pre>"; print_r($arAnswer); echo "</pre>";

// выведем значения ответов в несколько ином формате
//echo "<pre>"; print_r($arAnswer2); echo "</pre>";

$email=$arAnswer['SIMPLE_QUESTION_814'][0]['USER_TEXT'];
$str = $arAnswer['SIMPLE_QUESTION_668'][0]['USER_TEXT'];
$colstr=strlen($str);
$emails=["1"=>"showdance.by@yandex.ru","2"=>"ShowDance.by@yandex.ru","3"=>"leshhenko.1988@mail.ru"];
if($colstr>2000 && in_array("voskobovich555@gmail.com", $emails)){
    echo "Да";
}else{
    echo "Нет";
}
echo "<pre>"; print_r($email); echo "</pre>";

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>