<?php

//setcookie('usuario', 'admin', time() + 60 * 60);


echo 'hola';

if(isset($_COOKIE['usuario'])){
  echo 'La cookie es: ' . $_COOKIE['usuario'];
}