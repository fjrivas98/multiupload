<?php

if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    echo 'ha llegado: ' . $nombre;
}