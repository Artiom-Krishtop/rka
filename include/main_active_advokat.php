<?
$arr=[];
$arr[1]='января';
$arr[2]='февраля';
$arr[3]='марта';
$arr[4]='апреля';
$arr[5]='мая';
$arr[6]='июня';
$arr[7]='июля';
$arr[8]='августа';
$arr[9]='сентября';
$arr[10]='октября';
$arr[11]='ноября';
$arr[12]='декабря';

$data = $arr[date('n', strtotime("last month"))].' '.date('Y', strtotime("last month"));
?>

Самые активные адвокаты РБ по итогам <?=$data;?> года