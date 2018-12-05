<?php

require 'classes/Autoload.php';

$alumno = Reader::readReadableObject(new Alumno());

echo '<pre>' . var_export($alumno, true) . '</pre>';

$alumno = Reader::readObject('Alumno');

echo '<pre>' . var_export($alumno, true) . '</pre>';

$alumno = Reader::readObject('Alumno', 'get', 'set');

echo '<pre>' . var_export($alumno, true) . '</pre>';