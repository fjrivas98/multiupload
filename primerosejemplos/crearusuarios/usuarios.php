<?php
echo '<pre>' . var_export($_FILES, true) . '</pre>';

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
        echo 'holiiiii';
        if(!file_exists($destino.$nombre)){
            echo 'voy a crear';
            
            mkdir($destino.$nombre, 0700);
            $file->upload();
            echo '<pre>' . var_export($file, true) . '</pre>';
           $val=true; 
        }
        
    }
    
$url = 'Respuesta.php?op=' . $val;
header('Location: ' . $url);
