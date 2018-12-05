<?php

use izv\app\App;
use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Reader;
use izv\tools\Session;
use izv\tools\Util;

require '../classes/autoload.php';

$clave = Reader::read('clave');
$correo = Reader::read('correo');

 echo '<pre> la clave' . var_export($clave, true) . '</pre>';
echo '<pre> el correo' . var_export($usuario, true) . '</pre>';

$db = new Database();
$manager = new ManageUsuario($db);
$result = $manager->login($correo, $clave);
echo '<pre> el correo' . var_export($result, true) . '</pre>';
$resultado = 0;
$sesion = new Session(App::SESSION_NAME);
if($result) {
    $sesion->login($result);
    $resultado = 1;
} else {
    $sesion->logout();
}
//$url = Util::url() . '../index.php?op=login&resultado=' . $resultado;
//header('Location: ' . $url);