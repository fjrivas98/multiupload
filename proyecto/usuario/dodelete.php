<?php

use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Reader;
use izv\tools\Alert;
use izv\tools\Util;
use izv\tools\Session;
use izv\tools\Render;
use izv\app\App;

require '../classes/autoload.php';

$db = new Database();
$manager = new ManageUsuario($db);
$sesion = new Session(App::SESSION_NAME);
if(!$sesion->isLogged()) {
    header('Location: ../index.php');
    exit();
}
$usuariosesion = $sesion->getLogin();
if($usuariosesion->getAdmin()==0){
    header('Location: ../index.php');
    exit();
}
$id = Reader::read('id');
$ids = Reader::readArray('ids');
$resultado = 0;
 echo '<pre> verificacion' . var_export($id, true) . '</pre>';
if($id !== null) {
    if(!is_numeric($id) ||  $id <= 0) {
        header('Location: index.php');
        exit();
    }
    $resultado = $manager->remove($id);
    echo '<pre> verificacion' . var_export($resultado, true) . '</pre>';
} else {
    $db->getConnection()->beginTransaction();
    $error = false;
    foreach($ids as $id) {
        $resultadoParcial = $manager->remove($id);
        if($resultadoParcial === 0) {
            $error = true;
        } else {
            $resultado += $resultadoParcial;
        }
    }
    if($error) {
        $db->getConnection()->rollback();
    } else {
        $db->getConnection()->commit();
    }
}
$db->close();
$url = Util::url() . 'index.php?op=deleteproducto&resultado=' . $resultado;
header('Location: ' . $url);