<?php
require('Reader.php');
$respuesta = Reader::get('op');
if($respuesta!==null){
    if($respuesta == true){
        echo 'bien insertado';
    }else{
        echo 'Error , contacta con el admin';
    }
}



