<?php
require 'classes/Alumno.php';
require 'classes/Reader.php';

$alumno = Reader::readObject('Alumno');

echo '<pre>' . var_export($alumno, true) . '</pre>';