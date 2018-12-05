<?php

//require('classes/izvdwes/data/Producto.php');
require('classes/autoload.php');

use izvdwes\data\Alumno;
use izvdwes\data\Producto;

//$producto = new izvdwes\data\Producto();
$producto = new Producto();

echo '<pre>' . var_export($producto, true) . '</pre>';

$alumno = new Alumno();