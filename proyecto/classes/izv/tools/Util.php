<?php

namespace izv\tools;

class Util {

    static function encriptar($cadena, $coste = 10) {
        $opciones = array(
            'cost' => $coste
        );
        return password_hash($cadena, PASSWORD_DEFAULT, $opciones);
    }
    
    static function dateFromSql($date) {
        return 'formato europeo de la fecha';
    }

    static function url() {
        $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $parts = pathinfo($url);
        return $parts['dirname'] . '/';
    }

    static function varDump($value) {
        return '<pre>' . var_export($value, true) . '</pre>';
    }

    static function verificarClave($claveSinEncriptar, $claveEncriptada) {
         echo '<pre> clave real v2' . var_export($claveEncriptada, true) . '</pre>';
                     echo '<pre> la otra clave que yo pongo coñooooo v2' . var_export($claveSinEncriptar, true) . '</pre>';
        return password_verify($claveSinEncriptar, $claveEncriptada);
    }
}