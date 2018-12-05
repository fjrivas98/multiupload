<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!empty($_GET['esteesta'])) {
    echo 'esteesta está<br>';
} else {
    echo 'esteesta no está<br>';
}

if(!empty($_GET['estenoesta'])) {
    echo 'estenoesta está<br>';
} else {
    echo 'estenoesta no está<br>';
}