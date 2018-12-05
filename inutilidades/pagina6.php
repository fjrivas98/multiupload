<?php
require 'classses/Comun.php';
require 'classses/Alumno.php';
require 'classses/Punto.php';




$p = new Punto(3,4);
$p->introspeccion();
$a = new Alumno('51182144', 'justin', 'bili' , 1234 , 2000-04-05, 'v' ,  '945123432');
$a->introspeccion();


exit;

$alumno = new Alumno();
$alumno2 = new Alumno('12345678H','juanito');
$alumno3 = new Alumno('12345678H','maria','lopez');
$alumno->setNombre('pepe');

echo $alumno.'<br>';
echo $alumno2.'<br>';
echo $alumno3.'<br>';

$p = new Punto();
$p->setX(1);
$P-setY(2);

$p->setX(1)->setY(2);

$miclase = 'Punto';
$p = new $miclase();

$mimetodo = 'getX'; //echo $p->getX();;
$p->$mimetodo();

if(class_exits($miclase)){
    $p= new $miclase;
}

if(method_exits($p, $mimetodo)){
    echo $p->$mimetodo;
}

if(method_exits($miclase, $mimetodo)){
    echo $p->$mimetodo;
}