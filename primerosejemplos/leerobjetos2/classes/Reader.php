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
    }

    private static function _read($name, array $array) {
        $result = null;
        if(isset($array[$name])) {
            $result = $array[$name];
        }
        return trim($result);
    }

    static function readObject(Readable $object) {
        $array = $object->get();
        if(is_array($array)) {
            foreach($array as $atributo => $valor) {
                $array[$atributo] = self::read($atributo);
            }
            $object->set($array);
        }
        return $object;
    }

}