<?php

use izv\data\Usuarios;
use izv\database\Database;
use izv\managedata\ManageProducto;
use izv\tools\Reader;
use izv\tools\Util;
require '../classes/autoload.php';

//1º comprobar si puedo hacer esta operación
//2º validar los datos
$id = Reader::read('id');

if($id === null || !is_numeric($id) ||  $id <= 0) {
    header('Location: index.php');
    exit();
}

$db = new Database();
$manager = new ManageProducto($db);
$usuario = $manager->get($id);

$db->close();

if($usuario === null) {
    header('Location: index.php');
    exit();
}

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>dwes</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css" >
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="..">dwes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="..">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./">Usuarios</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h4 class="display-4">Usuarios</h4>
                </div>
            </div>
            <div class="container">
                <div>
                    <form action="doedit.php" method="post">
                        <div class="form-group">
                            <label for="correo">Correo del usuario</label>
                            <input required type="text" class="form-control" id="correo" name="correo" placeholder="Introduce el correo del usuario">
                        </div>
                        <div class="form-group">
                            <label for="alias">Alias del usuario</label>
                            <input required type="text" class="form-control" id="alias" name="alias" placeholder="Introduce el alias del usuario">
                        </div>
                         <div class="form-group">
                            <label for="nombre">Nombre del usuario</label>
                            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce el nombre del usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña del usuario</label>
                            <input required type="password" class="form-control" id="clave" name="clave" placeholder="Introduce la clave del usuario">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="activo" name="activo">
                            <label class="form-check-label" for="activo">Usuario activo</label>
                        </div>
                        <input type="hidden" name="id" value="<?= $usuario->getId() ?>" />
                        <input type="hidden" name="fechaalta" value="<?= $usuario->getFechaalta() ?>" />
                        <button type="submit" class="btn btn-primary">Editar</button>
                      <?php  echo Util::varDump($usuario);?>
                    </form>
                </div>
                <hr>
            </div>
        </main>
        <footer class="container">
            <p>&copy; IZV 2018</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="../js/script.js"></script>
    </body>
</html>