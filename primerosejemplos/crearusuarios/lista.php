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
        <p>USUARIOS</p>
        <ul>
            <?php
                $dirs = glob('/home/ubuntu/privado/*' , GLOB_ONLYDIR);
                foreach ($dirs as  $valor) {
                $n = pathinfo($valor);
                $img = scandir($valor,1);
                ?>
                 <li><a href="imagen.php?user=<?=$n['basename']?>&img=<?=$img[0]?>"><?=$n['basename']?></a> </li>
                
                 <?php   
                }
            ?>
        </ul>
    </body>
</html>