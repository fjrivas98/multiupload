<?php

use izv\data\Producto;
use izv\database\Database;
use izv\managedata\ManageProducto;
use izv\tools\Reader;
use izv\tools\Util;
use izv\tools\App;

require '../classes/autoload.php';
$session = new Session(App::SESSION_NAME);
if(!$session->isLogged()){
    header('Location: ...');
    exit();
}

$db = new Database();
$manager = new ManageProducto($db);
$producto = Reader::readObject('izv\data\Producto');
$resultado = $manager->add($producto);
$db->close();
$url = Util::url() . 'index.php?op=insertproducto&resultado=' . $resultado;
header('Location: ' . $url);