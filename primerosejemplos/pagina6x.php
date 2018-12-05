<?php

require 'classes/Alumno.php';

$clase = 'Alumno';

$alumno = new $clase();

if(class_exists($clase)) {
    $alumno = new $clase();
    echo '<pre>' . var_export($alumno, true) . '</pre>';
}

$metodo = 'setTelefono';

if(method_exists($clase, $metodo)) {
    $alumno->$metodo('958112233');
    echo '<pre>' . var_export($alumno, true) . '</pre>';
}

if(method_exists($alumno, $metodo)) {
    $alumno->$metodo('958223344');
    echo '<pre>' . var_export($alumno, true) . '</pre>';
}