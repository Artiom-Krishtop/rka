<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetTitle("");
?>
<?
/*CModule::IncludeModule("form");
// ID веб-формы
$FORM_ID = 3;
//$rsResult = CFormResult::GetByID($FORM_ID);

$rsResult = CForm::GetResultAnswerArray($FORM_ID,
    $arrColumns,
    $arrAnswers,
    $arrAnswersVarname,
    array());

echo "<pre>";
//echo "arrAnswers:";
print_r($arrAnswers);
//echo "arrAnswersVarname:";
//print_r($arrAnswersVarname);
echo "</pre>";


//$arResult = $rsResult->Fetch();
foreach($arrAnswers as $ID_answer => $Result){?>
    <div><?=$Result?></div>
<?}*/?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>