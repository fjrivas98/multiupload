<?php

/**
 * Interfaz Readable
 *
 * @version 1.01
 * @author izv
 * @license http:// la del mit
 * @copyright izv by dwes
 * Interfaz para la transformación de objetos en arrays y viceversa.
 */
interface Readable {
    
    /**
    * Obtiene el array asociativo que es 'copia' de un objeto.
    * @access public
    * @return Devuelve un array asociativo cuyos índices son los atributos y los
    * valores son los valores de los atributos.
    */
    function get();
    
    /**
    * Reconstruye un objeto a partir de un array asociativo
    * @access public
    * @param array $array Array asociativo que contiene la 'estructura'
    * del objeto.
    * @return Devuelve la instancia del objeto reconstruido.
    */
    function set(array $array);
}