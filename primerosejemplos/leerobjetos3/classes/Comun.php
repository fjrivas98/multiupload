<?php

trait Comun {

    function __toString() {
        $string = get_class() . ': ';
        foreach($this as $atributo => $valor) {
            $string .= $atributo . ' = ' . $valor . '<br>';
        }
        return $string;
    }

    function get() {
        $array = array();
        foreach($this as $atributo => $valor) {
            $array[$atributo] = $valor;
        }
        return $array;
    }
    
    function set(array $array) {
        foreach($this as $atributo => $valor) {
            if(isset($array[$atributo])) {
                $this->$atributo = $array[$atributo];
            }
        }
        return $this;
    }

}