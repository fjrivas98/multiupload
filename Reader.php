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

    static function readObject($class, $methodGet = 'get', $methodSet = 'set'){//clase,dado un objeto devuelve un array ,dado el array lo mete en el objeto
        $object = null;
        if(class_exists($class)){
            $object = new $class();
            if(method_exists($object, $methodGet)){
                $array = $object -> $methodGet();
                foreach ($array as $atributo => $valor){
                    $array[$atributo] = self::read($atributo);//:: llaman a staticas
                }
                if(method_exists($object, $methodSet)){
                    $object->$methodSet($array);//->llama a instancia
                }
            }
        }
        return $object;
    }

   static function readReadableObject(Readable $object) {
        $array = $object->readableGet();
        foreach($array as $atributo => $valor) {
            $array[$atributo] = self::read($atributo);
        }
        $object->readableSet($array);
        return $object;
    }

    private static function _read($name, array $array) {
        $result = null;
        if(isset($array[$name])) {
            $result = $array[$name];
        }
        return trim($result);
        //return isset($array[$name]) ? $array[$name] : null;
    }

}
    
    

}



/*<?php

class Reader{
    
    private function __construct(){
        
    }
    
    static function count ($method = null){
        $count = 0;
        if($method===null){
            $count = count($_GET) + count($_POST);
            
        
        }
        else{
            if($method ==='get'){
                $count = count($_GET);
            }
        else{
            $count=count($_POST);
        }
        return $count;
    }
    
    //si no me llega el parámetro con el nombre $name devuelve: null;   si si llega: el valor
    
    static function get ($name){
       return self::_read($name, $_GET);
    }
    
    static function post ($name){
      
       return self::_read($name, $_POST);
    }
        
   
    
    static function read($name){
      $result = self:: get ($name);
      if($result === null){
          $result = self::post($name);
      }
        return $result;
        
    }
    
    private static function _read($name,array $array){
        $result =null;
        if(isset($array[$name])){
            $result = $array[$name];
        }
        return $result;
    }
    
    
}*/

