<?php
echo 'hola'; 

//voy a leer los parametros

//problema= GET y POST se leen de forma diferente
$nombre = 'no llega na';
if(!empty($_GET['esteesta'])){ //coge el parametro nombre gget
    echo 'este si ';
    
}else{
    echo 'nota';
}

if(isset($_POST['nombre'])){ //lo mismo pero en post
    $nombre = $_POST['nombre'];
}

echo 'el nombre es:' .$nombre ;