<?php
    require('Reader.php');
    $nombre = Reader::get('user');
    $img = Reader::get('img');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="./styles.css" type="text/css" />
    </head>
    <body>
    <img src="data:image/*;base64,<?php echo base64_encode(file_get_contents('/home/ubuntu/privado/' . $nombre . '/' . $img));?>"/>
    </body>
</html>