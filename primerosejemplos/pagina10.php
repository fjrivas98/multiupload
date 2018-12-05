<?php



require('classes/Multiupload.php');
$archivo = new Multiupload('archivos0');
$r = $archivo->upload();
echo '<pre>' . var_export($r, true) . '</pre>';