<?php

use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Mail;
use izv\tools\Reader;
use izv\tools\Util;
use izv\tools\App;

require '../classes/autoload.php';

$db = new Database();
$manager = new ManageUsuario($db);
$usuario = Reader::readObject('izv\data\Usuario');
echo Util::varDump($usuario);

if($usuario->getClave()==='') {
    $resultado = $manager->edit($usuario);
} else {
    $usuario->setClave(Util::encriptar($usuario->getClave()));
    $resultado = $manager->editWithPassword($usuario);
}
$db->close();
echo Util::varDump($usuario);
$url = Util::url() . 'index.php?op=edit&resultado=' . $resultado;
header('Location: ' . $url);