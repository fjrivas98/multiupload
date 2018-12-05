<?php

use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Mail;
use izv\tools\Reader;
use izv\tools\Util;
use izv\tools\App;

require '../classes/autoload.php';
require '../classes/vendor/autoload.php';

$db = new Database();
$manager = new ManageUsuario($db);
$usuario = Reader::readObject('izv\data\Usuario');
$clave2 = Reader::read('clave2');
echo '<pre>' . var_export($usuario, true) . '</pre>';
if($usuario->getClave() !== $clave2) {
    echo 'entroooooo'; 
    header('Location: index.php');
    exit();
}


echo '<pre>' . var_export($usuario, true) . '</pre>';
if($usuario->getClave()==='') {
    $resultado = $manager->edit($usuario);
} else {
    $resultado = $manager->editWithPassword($usuario);
}
$db->close();
//$url = Util::url() . 'index.php?op=edit&resultado=' . $resultado;
//header('Location: ' . $url);