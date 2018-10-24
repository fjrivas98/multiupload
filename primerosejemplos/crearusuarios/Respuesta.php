<?php
require('Reader.php');
$respuesta = Reader::get('op');
if($respuesta!==null){
    if($respuesta == true){
        echo 'olé tu!';
    }else{
        echo 'Contacta con el sensual admin 657328857';
    }
}



