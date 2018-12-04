<?php

use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Mail;
use izv\tools\Reader;
use izv\tools\Util;
use izv\app\App;
use izv\tools\Session;

require '../classes/autoload.php';
require '../classes/vendor/autoload.php';

$sesion = new Session(App::SESSION_NAME);

if(!$sesion->isLogged()) {
    header('Location: ..');
    exit();
}

$usuarios = $sesion->getLogin();







$db = new Database();
$manager = new ManageUsuario($db);
$usuario = Reader::readObject('izv\data\Usuario');

if($usuario->getCorreo()!== $usuarios->getCorreo()){
    $usuario->setActivo(0);
    $resultado=Mail::sendActivation($usuario);
}
if($usuario->getClave()==='') {
    $resultado = $manager->edit($usuario);
    $sesion->logout();
} else {
    $usuario->setClave(Util::encriptar($usuario->getClave()));
    $resultado = $manager->editWithPassword($usuario);
   // $sesion->logout();
}

$db->close();
$url = Util::url() . 'index.php?op=edit&resultado=' . $resultado;
header('Location: ' . $url);