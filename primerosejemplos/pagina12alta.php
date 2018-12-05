<?php

require 'classes/Autoload.php';

//1º: comprobar si puedo hacerlo

$producto = Reader::readObject('Producto');

//2º: validar el producto

$sql = 'insert into producto values(null, :nombre, :precio, :observaciones)';
$db = new Database();
$resultado = 0;
if($db->connect()) {
    $conexion = $db->getConnection();
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue('nombre', $producto->getNombre());
    $sentencia->bindValue('precio', $producto->getPrecio());
    $sentencia->bindValue('observaciones', $producto->getObservaciones());
    if($sentencia->execute()) {
        $resultado = $conexion->lastInsertId();
    } //else {
        //echo Util::varDump($sentencia->errorInfo());
    //}
}
$url = 'pagina12.php?op=insertproducto&resultado=' . $resultado;
header('Location: ' . $url);
//
//<a href="<?= $url ?>">seguir</a>