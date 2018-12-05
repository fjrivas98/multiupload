<?php

spl_autoload_register(
  function ($clase) {
    $archivo = dirname(__FILE__) . '/' . str_replace('\\', '/', $clase) . '.php';
    echo $archivo . '<br>';
    if (file_exists($archivo)) {
      require $archivo;
    }
});