<?php

require '../classes/autoload.php';

use izv\data\Usuarios;
use izv\database\Database;
use izv\managedata\ManageProducto;
use izv\tools\Reader;
use izv\tools\Util;

$db = new Database();
$manager = new ManageProducto($db);
$usuario = Reader::readObject('izv\data\Usuarios');
echo Util::varDump($usuario);
if (isset($_POST['activo'])) {
    $usuario->setActivo(1);
}else{
    $usuario->setActivo(0);
}
echo Util::varDump($usuario);
$resultado = $manager->edit($usuario);
$db->close();
$url = Util::url() . 'index.php?op=editusuarios&resultado=' . $resultado;
header('Location: ' . $url);