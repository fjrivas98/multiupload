<?php

$arrayLiteral = array (
    'nombre' =>'Pepe Perez',
    'curso' =>'2daw',
    'grupo' =>'A',
    'modulos' => array(
                    'dwes' => 'Desarrollo web en entorno servidor',
                    'dewc' => 'Desarrollo web en entorno cliente',
                    'etc' => 'etcetera'
        ),
    'faltas' => array(
        '2018-09-24',
        '2018-10-03'
        )
    
    );

echo 'el numero de faltas es: ' .count(arrayLiteral['faltas']). '<br>';
echo 'la fecha de la segunda falta es: '.$arrayLiteral['faltas'][1]. '<br>';
echo 'la fecha de la ultima falta es: '.$arrayLiteral['faltas'][count($arrayLiteral['faltas']) - 1]. '<br>';

//array
$array1 = array();

$array2 = [];
$array2[] = 1;
$array2[] = 2;

$array1[] = 'hola';
$array1[] = 1;
$array1[] = 1.2;
$array1[6] = 2;
$array1[] = 2;
$array1[] = $array2;
$array2[] = 3;
$array1[8][6] = 3;
$array1['hola'] = 5;
//unset($array1[2]);
//unset($array1);
echo '<pre>' . var_export($array1, true) . '</pre>';
echo '<pre>' . var_export($array2, true) . '</pre>';
$indices = array_keys($array1);
echo '<pre>' . var_export($indices, true) . '</pre>';
$merge = array_merge($array1, $array2);
echo '<pre>' . var_export($merge, true) . '</pre>';
$valores = array_values($array1);
echo '<pre>' . var_export($valores, true) . '</pre>';

$cadena = 'asas;asasasasas;asasasas;asasrfdfdf;dfdfdf;sdsdsd';
$arrayExplode = explode(';', $cadena);
echo '<pre>' . var_export($arrayExplode, true) . '</pre>';
$textoImplode = implode('#', $arrayExplode);
echo '<pre>' . var_export($textoImplode, true) . '</pre>';