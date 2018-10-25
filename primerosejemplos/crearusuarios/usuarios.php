<?php
require('Upload.php');
require('Reader.php');
$val= false;
$nombre = Reader::post('nombre');
$file = new Upload('archivo');
$destino = '/home/ubuntu/privado/';

$file->setTarget($destino.$nombre.'/');
echo $file->getTarget();
    echo($nombre!==null);
    if($nombre!==null){
        if(!file_exists($destino.$nombre)){
            mkdir($destino.$nombre, 0700);
            $file->upload();
           $val=true; 
        }
        
    }
    
$url = 'Respuesta.php?op=' . $val;
header('Location: ' . $url);
