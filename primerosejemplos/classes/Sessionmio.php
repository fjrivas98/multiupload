<?php

class Session{
    //constructor(nombre)
    const IND_SESSION = 'password';
    function __construct($valor = null){
        if(session_status() === PHP_SESSION_NONE){
          session_name($valor);
         
        }
         session_start();
    }
    //get(nombre)
    function get($valor) {
        if (isset ( $_SESSION [$valor] )) {
            return $_SESSION [$valor];
        }
        return null;
    }
    //set(nombre,valor)
    function set($valor, $newvalor) {
        $_SESSION [$valor] = $newvalor;
    }
    //destroy
    function destroy(){
        session_destroy();
    }
    
    //getLogin()
    function getLogin(){
        return ($_SESSION[self::IND_SESSION]);
    }
    //setLogin()
    function setLogin(){
         session_regenerate_id();
         
    }
    //logout()
    function logout(){
        unset ( $_SESSION [self::IND_SESSION]);
    }
}