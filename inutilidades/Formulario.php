<?php

$nombre= "introduce un texto";
$numero= 'introduce un numero';
$pw= 'introduce un numero';
$cbox= ' seleciona un checkbox';
$radio= 'No has selecionado ningun radio';
$file = 'No has selecionado ningun archivo';
$select= 'nada';
$txtarea = 'No hay txtarea';
$color ='nada ';
$bday = ' inserta un cumpleaños ';
$email = 'introudce un emal';
$rango = '';
$url ='';



if(isset ($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}

if(isset($_POST['numero'])){
    $numero = $_POST['numero'];
}


if(isset($_POST['pw'])){
    $pw = $_POST['pw'];
}



if(isset($_POST['car']) and isset($_POST['bike'])){
   $cbox =  ' SOLO UN CHECKBOX';
}else if(isset($_POST['car'])){
    $cbox = $_POST['car'];
    
}else if (isset($_POST['bike'])){
    $cbox = $_POST['bike'];
}

if(isset($_POST['radio'])){
   $radio = $_POST['radio'];
}



if (!empty ($_FILES['files'])){
    $file = 'Subido';


} else {    
    $file = 'no subido';     
}

if(isset($_POST['select'])) {
     $select = $_POST['select'];      
} 

if(isset($_POST['txtarea'])) {
     $txtarea = $_POST['txtarea'];      
} 

if(isset($_POST['color'])) {
     $color = $_POST['color'];      
} 

if(isset($_POST['bday'])) {
     $bday = $_POST['bday'];      
} 


if(isset($_POST['email'])) {
     $email = $_POST['email'];      
} 

if(isset($_POST['rango'])) {
     $rango = $_POST['rango'];      
} 

if(isset($_POST['url'])) {
     $url = $_POST['url'];      
} 





if(isset ($_GET['nombre'])){
    $nombre = $_GET['nombre'];
}

if(isset($_GET['numero'])){
    $numero = $_GET['numero'];
}


if(isset($_GET['pw'])){
    $pw = $_GET['pw'];
}



if(isset($_GET['car']) and isset($_GET['bike'])){
   $cbox =  ' SOLO UN CHECKBOX';
}else if(isset($_GET['car'])){
    $cbox = $_GET['car'];
    
}else if (isset($_GET['bike'])){
    $cbox = $_GET['bike'];
}

if(isset($_GET['radio'])){
   $radio = $_GET['radio'];
}



if (isset ($_FILES['files'])){
    $file = 'Subido';


} else {    
    $file = 'no subido';     
}

if(isset($_GET['select'])) {
     $select = $_GET['select'];      
} 

if(isset($_GET['txtarea'])) {
     $txtarea = $_GET['txtarea'];      
} 

if(isset($_GET['color'])) {
     $color = $_GET['color'];      
} 

if(isset($_GET['bday'])) {
     $bday = $_GET['bday'];      
} 


if(isset($_GET['email'])) {
     $email = $_GET['email'];      
} 

if(isset($_GET['rango'])) {
     $rango = $_GET['rango'];      
} 

if(isset($_GET['url'])) {
     $url = $_GET['url'];      
} 

















echo '  nombre : ' .$nombre.'<br>';
echo '   numero  /    ' .$numero.'<br>';
echo ' contraseña : ' .$pw.'<br>';
echo 'checkbox : '.$cbox.'<br>';
echo 'RaDi0 : '.$radio.'<br>';
echo $file.'<br>';
echo'textarea: ' .$txtarea.'<br>';
echo 'select selecionado : '.$select.'<br>';
echo 'color'.$color.'<br>';
echo 'cumpleaños :'.$bday.'<br>';
echo 'email :'.$email.'<br>';
echo 'rango : '.$rango.'<br>';
echo 'url : '.$url.'<br>';

