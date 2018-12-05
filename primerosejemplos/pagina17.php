<?php

$clave = 'perrochico';
$opciones = [
    'cost' => 12,
    ];
$enc1 = sha1($clave);
$enc2 = md5($clave);
//PASSWORD_BCRYPT
$enc3 = password_hash($clave, PASSWORD_DEFAULT,$opciones);

echo $enc1 . '<br>' . $enc2 . '<br>' . $enc3 . '<br>';

$enc1 = sha1($clave);
$enc2 = md5($clave);
$enc4 = password_hash($clave, PASSWORD_DEFAULT,$opciones);

echo $enc1 . '<br>' . $enc2 . '<br>' . $enc4 . '<br>';

if(password_verify($clave,$enc4) && password_verify($clave,$enc3)){
    echo 'las claves coinciden';
}else{
    echo 'no coinciden';
}