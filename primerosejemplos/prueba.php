<?php

require 'classes/Session.php';

$session = new Session('puto');
$session->set('laultimaprueba','chachipirulo');
echo $session->getLogin().'<br>';
echo $session->get('nombre').'<br>';
echo $session->get('password').'<br>';

echo $session->get('laultimaprueba').'<br>';

echo '<pre>' . var_dump($_SESSION) . '</pre>';