<?php

require '../classes/autoload.php';

use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageProducto;
use izv\tools\Reader;
use izv\tools\Util;

$db = new Database();
$manager = new ManageProducto($db);
$usuario = Reader::readObject('izv\data\Usuarios');
if (isset($_POST['activo'])) {
    $usuario->setActivo(1);
}
echo Util::varDump($usuario);
$resultado = $manager->add($usuario);
$db->close();
$url = 'index.php?op=insertusuarios&resultado=' . $resultado;
header('Location: ' . $url);