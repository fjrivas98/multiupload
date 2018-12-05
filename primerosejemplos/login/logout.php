<?php

require('../classes/Autoload.php');

$sesion = new Session('DWES_SESSION');
$sesion->logout();
//$sesion->destroy();

/*session_name('DWES_SESSION');
session_start();
session_destroy();*/

header('Location: index.php');