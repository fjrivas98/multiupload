<?php

echo 'aqui has llegado';

//voy a leer los parámetros

//problema: GET y POST se leen de forma diferente

$nombre = 'no llega NÁ';

if(isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
}

if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
}

echo 'el nombre es: ' . $nombre;