<?php

require 'classes/Comun.php';
require('classes/Readable.php');
require 'classes/Punto.php';

require('classes/Alumno.php');
require('classes/AlumnoReadable.php');
require 'classes/Reader.php';

$alumno = Reader::readObject('Punto');

$alumnoReadable = new Alumnoreadable();
$alumnoReadable = Reader::readReadableObject($alumnoReadable);

echo '<pre>' . var_export($alumno, true) . '</pre>';

echo $alumno;