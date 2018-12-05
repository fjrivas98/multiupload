<?php

/*if(isset($_GET['nombre'])) {
    echo $_GET['nombre'];
}
echo '<br>';
if(isset($_POST['nombre'])) {
    echo $_POST['nombre'];
}*/

require('classes/Reader.php');

echo Reader::read('nombre');