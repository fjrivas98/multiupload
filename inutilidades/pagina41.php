<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo 'var_dump:<br>';
var_dump($_GET);
echo '<hr>';
echo 'pretty var_dump:';
//echo '<pre>' . var_export($_GET, true) . '</pre>';
//echo '<pre>' . var_export($_SERVER, true) . '</pre>';
//echo '<pre>' . var_export($_SERVER['QUERY_STRING'], true) . '</pre>';
$url = $_SERVER['QUERY_STRING'];
$parametros = explode('&', $url);
echo '<pre>' . var_export($parametros, true) . '</pre>';
foreach ($parametros as $parametro) {
    $nombreValor = explode('=', $parametro);
    echo $nombreValor[0] . ' = ' . $nombreValor[1] . '<br>';
}

echo '<hr>';

if(isset($_GET['fumador'])) {
    echo 'es fumador';
} else {
    echo 'no es fumador';
}

if(isset($_GET['extra'])) {
    $extra = $_GET['extra'];
    if(is_array($extra)) {
        foreach($extra as $indice => $valor) {
            echo '<br>el valor de extra en la posición ' . $indice . ' es: ' . $valor;
        }
    } else {
        echo '<br>extra: ' . $extra;
    }
}