<?php

namespace izvdwes\data;

class Producto {

    private static $contador = 0;
    
    private $id, $nombre, $precio, $iva;
    
    function __construct($id = null, $nombre = null, $precio = null, $iva = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->iva = $iva;
        self::$contador++;
    }
    
    function __destruct() {
        self::$contador--;
    }

    static function getContador() {
        return self::$contador;
    }

}