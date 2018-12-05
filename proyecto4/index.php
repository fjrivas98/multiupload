<?php
require 'classes/autoload.php';

use izv\app\App;
use izv\data\Usuario;
use izv\tools\Alert;
use izv\tools\Reader;
use izv\tools\Util;
use izv\tools\Session;
use izv\database\Database;
use izv\managedata\ManageUsuario;


$db = new Database();
$manager = new ManageUsuario($db);
$usuarios = $manager->getAll();
$db->close();


$sesion = new Session(App::SESSION_NAME);
$usuariosesion = $sesion->getLogin();



$alert = Alert::getMessage(Reader::get('op'), Reader::get('resultado'));
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>dwes</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" >
    </head>
    <body>
        <!-- modal -->
        <div class="modal fade" id="modallogin" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="cliente/dologin.php" method="post" id="fLogin">
                            <input class="form-control" type="email" name="correo" id="correo" required placeholder="Correo electrónicoo"/>
                            <br>
                            <input class="form-control" type="password" name="clave" id="clave" required placeholder="Clave de acceso"/>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" form="fLogin" class="btn btn-primary" id="btLogin">Login</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="./">dwes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="producto/index.php">Producto</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="usuario/">Usuario</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="cliente/">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <?php
                
                        if($sesion->isLogged()) {
                            ?>
                            <a class="btn btn-primary btn-lg" href="cliente/dologin.php" role="button">logout &raquo;</a>
                            <?php
                        }
                        ?>
            </div>
        </nav>
        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3">Hello, world!</h1>
                    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                    <p>
                        <a data-toggle="modal" data-target="#modallogin" class="btn btn-primary btn-lg" href="#" role="button">Login &raquo;</a>
                        <?php
                        if($sesion->isLogged()) {
                            ?>
                            <a class="btn btn-primary btn-lg" href="cliente/edit.php" role="button">Editar &raquo;</a>
                            <div class="jumbotron">
                <div class="container">
                    <h4 class="display-4">Usuarios</h4>
                    <?= $alert ?>
                </div>
            </div>
            <div class="container">
                <table class="table table-striped table-hover" id="tablaUsuario">
                    <thead>
                        <tr>
                            <?php
                            
                            if($usuariosesion->getAdmin()==='1'){
                            ?>
                            <th><input type="checkbox" id="checkAll" /></th>
                             <?php
                            }
                            ?>
                            <th>Correo</th>
                            <th>Alias</th>
                            <th>Nombre</th>
                             <?php
                            if($usuariosesion->getAdmin()==='1'){
                            ?>
                            <th>Activo</th>
                            <th>Fecha alta</th>
                            <th>Borrar</th>
                            <th>Editar</th>
                              <?php
                            }
                            ?>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($usuarios as $usuario) {
                                $nombre = urlencode($usuario->getNombre());
                                ?>
                                <tr >
                                    <?php
                                    
                                    if($usuariosesion->getAdmin()==='1'){
                                    ?>
                                    <td><input type="checkbox" name="ids[]"  value="<?= $usuario->getId() ?>" form="fBorrar" /></td>
                                    <?php
                                    }
                                    ?>
                                    <td><?php echo $usuario->getCorreo(); ?></td>
                                    <td><?= $usuario->getAlias() ?></td>
                                    <td><?= $usuario->getNombre() ?></td>
                                    <?php
                                    if($usuariosesion->getAdmin()==='1'){
                                    ?>
                                    <td><?= $usuario->getActivo() ?></td>
                                    <td><?= $usuario->getFechaalta() ?></td>
                                    <td><a href="dodelete.php?id=<?= $usuario->getId() ?>" class = "borrar">Borrar</a></td>
                                    <td><a href="edit.php?id=<?= $usuario->getId() ?>">Editar</a></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <?php
                    if($usuariosesion->getAdmin()==='1'){
                    ?>
                    <input class="btn btn-danger" type="button" value="borrar" data-toggle="modal" data-target="#confirm" />
                    &nbsp;
                    <a href="insert.php" class="btn btn-success">agregar usuario</a>
                    <?php
                        }
                    ?>
                </div>
                <form action="dodelete.php" method="post" name="fBorrar" id="fBorrar"></form>
                <hr>
            </div>
                            <?php
                        }
                        ?>
                    </p>
                    
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Heading</h2>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Heading</h2>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                    </div>
                    <div class="col-md-4">
                        <h2>Heading</h2>
                        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                    </div>
                </div>
                <hr>
            </div>
        </main>
        <footer class="container">
            <p>&copy; Company 2017-2018</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
    </body>
</html>