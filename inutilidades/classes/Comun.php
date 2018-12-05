<?php

trait Comun {

    function __toString(){
        $string = '';
        foreach($this as $atributo => $valor) {
            $string .= $atributo. '='.$valor. '<br>';
        }
        return $array; 
        
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

    function metodoPhp($p1, array $p2, Alumno $p3, Punto $p4, string $p5_PHP7) {
        
    }
    
    function set(array $array) {
        foreach($this as $atributo => $valor) {
            if(isset($array[$atributo])) {
                $this->$atributo = $array[$atributo];
            }
        }
        return $this;
    }
    
    function merge(array $array) {
        foreach($array as $atributo => $valor) {
            if(property_exists($this, $atributo)) {
                $this->$atributo = $valor;
            }
        }
        return $this;
    }
    
    //metodoGet -> array asociativo cuyos indices son los atributos del objeto -> fetch//get
    //metodoSet(array) -> asignar los valores del array asociativo al objeto   -> merge//set
    
    
}