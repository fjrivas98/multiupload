<?php

require 'classes/Autoload.php';

$alumno = Reader::readObject(new Alumno());

echo '<pre>' . var_export($alumno, true) . '</pre>';