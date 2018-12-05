<?php
header('Content-Type: text/html; charset=utf-8');
$file = '';
$page = '1';
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    if(file_exists('../pages/' . $page)) {
        $file = '../pages/' . $page;
    }
}
if($file === '') {
    echo '<h1>Page ' . $page . ' not available!</h1>';
} else {
    readfile($file);
}