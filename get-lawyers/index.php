<?
// https://rka.by/get-lawyers/index.php?hash=2998a57c22387214d784204764aee9bc
//$hashUrl = md5(date('lF'));
$hash = $_GET['hash'];
if (strlen($hash) === 32 && md5(date('lF')) === $hash)
{
    $url = FALSE;

    $file = $_SERVER['DOCUMENT_ROOT'].'/upload/get-lawyers/get_url.txt';

    $arr = file($file);

    $fd = fopen($file,"c");
    if(!$fd)
    {
        exit("Не возможно открыть файл");
    }

    if(!flock($fd,LOCK_EX))
    {
        exit("Блокировка файла не удалась");
    }

    for ($i = 0; count($arr) > $i; $i++)
    {

        if($url = rtrim($arr[$i]))
        {
            header("Content-Description: File Transfer");
            header("Content-Type: text/csv");
            header("Content-Disposition: attachment; filename=".basename($url));
            header("Content-Transfer-Encoding:binary");

            header("Content-Length: ".filesize($_SERVER['DOCUMENT_ROOT'].$url));

            ob_clean();
            flush();

            readfile($_SERVER['DOCUMENT_ROOT'].$url);
            exit();

        }
        else
        {
            fwrite($fd,$arr[$i]);
        }
    }

    if(!flock($fd,LOCK_UN))
    {
        exit("Не возможно разблокировать файл");
    }
    fclose($fd);

}
else
{
    exit("Не правильная ссылка!!!");
}