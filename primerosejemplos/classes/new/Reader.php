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

    static function readObject($className, $getProperties = 'properties', $setProperties = 'set') {
        $object = null;
        if(class_exists($className)) {
            $object = new $className();
            if(method_exists($className, $getProperties) &&
               method_exists($className, $setProperties)) {
                $properties = $object->$getProperties();
                foreach ($properties as $property => $value) {
                    $properties[$property] = self::read($property);
                }
                $object->$setProperties($properties);
            }
        }
        return $object;
    }

    private static function _read($name, array $array) {
        $result = null;
        if(isset($array[$name])) {
            $result = $array[$name];
        }
        return $result;
        //return isset($array[$name]) ? $array[$name] : null;
    }

}