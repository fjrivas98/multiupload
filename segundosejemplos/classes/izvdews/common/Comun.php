<?php

namespace izvdwes\common;

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

    function introspeccion() {
        foreach($this as $atributo => $valor) {
            echo $atributo . ': ' . $valor . '<br>';
        }
    }
    
    function merge(array $array) {
        foreach($array as $atributo => $valor) {
            if(property_exists($this, $atributo)) {
                $this->$atributo = $valor;
            }
        }
        return $this;
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