<?php
require('classes/Upload.php');
echo '<pre>' . var_export($_FILES, true) . '</pre>';

echo '<pre>' . var_export($_POST, true) . '</pre>';

$upload = new Upload('archivo');

$upload->upload();

