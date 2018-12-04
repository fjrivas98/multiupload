<?php

use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Reader;
use izv\tools\Util;
use izv\tools\Session;

require '../classes/autoload.php';

$db = new Database();
$manager = new ManageUsuario($db);
$usuario = Reader::readObject('izv\data\Usuario');
if (isset($_POST['activo'])) {
    $usuario->setActivo(1);
}
if (isset($_POST['admin'])) {
    $usuario->setAdmin(1);
}
if($usuario->getAlias() === '') {
    $usuario->setAlias(null);
}

echo Util::varDump($usuario);

$usuario->setClave(Util::encriptar($usuario->getClave()));

$resultado = $manager->add($usuario);

/*echo Util::varDump($db->getConnection()->errorInfo());
echo Util::varDump($db->getSentence()->errorInfo());*/

$db->close();
$url = Util::url() . 'index.php?op=insert&resultado=' . $resultado;
header('Location: ' . $url);