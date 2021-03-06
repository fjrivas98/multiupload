<?php

class Reader {

    private function __construct() {
    }

    static function count($method = null) {
        if(strtolower($method) === 'get') {
            $count = count($_GET);
        } else if(strtolower($method) === 'post') {
            $count = count($_POST);
        } else {
            $count = count($_GET) + count($_POST);
        }
        return $count;
    }

    static function get($name) {
        return self::_read($name, $_GET);
    }

    static function post($name) {
        return self::_read($name, $_POST);
    }

    static function read($name) {
        $result = self::get($name);
        if($result === null) {
            $result = self::post($name);
        }
        return $result;
        //return self::get($name) !== null ? self::get($name) : self::post($name);
    }

    private static function _read($name, array $array) {
        $result = null;
        if(isset($array[$name])) {
            $result = trim($array[$name]);
        }
        return $result;
        //return isset($array[$name]) ? $array[$name] : null;
    }

    static function readObject($class, $methodGet = 'get', $methodSet = 'set') {
        $object = null;
        if(class_exists($class)) {
            $object = new $class();
            if(method_exists($object, $methodGet)) {
                $array = $object->$methodGet();
                foreach($array as $atributo => $valor) {
                    $array[$atributo] = self::read($atributo);
                }
                if(method_exists($object, $methodSet)) {
                    $object->$methodSet($array);
                }
            }
        }
        return $object;
    }
    
    static function readArray($name){
        //si ha llegado $_GET O $_POST de name $_GET[$name] o $_POST[$name] es un array
        // para cada uno le hacemos un foreach 
        //guardamos el elemento
        //devolver resultado
        
    }
    
    

    static function readReadableObject(Readable $object) {
        $array = $object->readableGet();
        foreach($array as $atributo => $valor) {
            $array[$atributo] = self::read($atributo);
        }
        $object->readableSet($array);
        return $object;
    }

}