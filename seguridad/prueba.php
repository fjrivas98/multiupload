<?php
header('X-XSS-Protection:0');
session_start();
if(isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    echo $valor;
} else {
    echo 'No existe valor.';
}