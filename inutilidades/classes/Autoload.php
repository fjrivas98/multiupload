<?php

class Autoload {
  static function load($clase) {
    $ruta = dirname(__FILE__) . '/' . $clase . '.php';
    echo $ruta;
    exit;
    if (file_exists($ruta)) {
      require_once($ruta);
    }
  }
}
spl_autoload_register('Autoload::load');