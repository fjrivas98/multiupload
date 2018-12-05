<?php
require 'classes/Autoload.php';
//1º: comprobar si puedo hacerlo
$producto = Reader::readObject('Producto');
//2º: validar el id: que ha llegado (!null) y que es numérico entero positivo
$sql = 'update producto set nombre = :nombre, precio = :precio, observaciones = :observaciones where id = :id';
$db = new Database();
$resultado = 0;
if($db->connect()) {
    $conexion = $db->getConnection();
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue('id', $producto->getId());
    $sentencia->bindValue('nombre', $producto->getNombre());
    $sentencia->bindValue('precio', $producto->getPrecio());
    $sentencia->bindValue('observaciones', $producto->getObservaciones());
    if($sentencia->execute()) {
        $resultado += $sentencia->rowCount();
    }
}
$url = 'pagina12.php?op=updateproductov2&resultado=' . $resultado;
//header('Location: ' . $url);
?>
<a href="<?= $url ?>">seguir</a>