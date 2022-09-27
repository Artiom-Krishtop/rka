<?php
$headers = getallheaders();
if (empty($headers['Authorization'])) {
    echo '';
    die();
}
$token = str_replace('Bearer ', '', $headers['Authorization']);
if ($token !== 'AALFGHGKDYGFBGBKFGKJYHJFDDGHFGVGBAAAAHIRLAAb') {
    echo '';
    die();
}

if (empty($_GET['list'])) {
    $file = 'herwfvhrfhre';
    $fileName = 'lawyers.csv';
} elseif ($_GET['list'] == 'collegium') {
    $file = 'krhtge4t6jlkhj';
    $fileName = 'collegium.csv';
} elseif ($_GET['list'] == 'consultation') {
    $file = 'lklngsfhlyd56dg';
    $fileName = 'lawConsultation.csv';
} else {
    echo '';
    die();
}

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
}
