<?php

require 'classes/Autoload.php';

$alumno = Reader::readObject('Alumno');

echo '<pre>' . var_export($alumno, true) . '</pre>';