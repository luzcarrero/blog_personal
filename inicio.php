<?php
require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";
require_once "clases/Curso.php";
require_once "includes\protecc.php";


$Actividades = new ListarCursos();
$Actividades->obtenerUsuarios();
$usuario = new Usuario();

if (isset($_POST) && !empty($_POST)) {

    $usuario->login($_POST);

    if ($usuario->login($_POST)) {
        header("location: inicio.php");
    } else {

        header("location: login.php");
    }
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

    <?php include("includes/header.php"); ?>
    <!--aqui va el jumbotron-->
    <section class="jumbotron">
        <div class=" container">
            <?php if (!empty($_SESSION['nombre'])) {
                echo "Bienvenido</a> " . "(" . $_SESSION['nombre'] . ")";
            }

            ?>
        </div>
    </section>

    <section class="main container">
        <div class="row">
            <div class="posts col-md-9">



                <div class="migas-de-pan">
                    <ol class="breadcrumb">
                        <li class="active">Inicio</li>
                        <li><a href="#">Categorias</a></li>
                        <?php $admin = $usuario->obtenerPorID($_SESSION['id']);
                        if ($admin['permiso'] == 1) {
                            echo  "<li class='active'><a href='altaActividades.php'>añadir curso <i class='fas fa-edit'></i></a></li>";
                            echo  " <li> <a href='gestionUsuarios.php' role='button'>Gestionar Usuarios</a></li>";
                        }   
                                 

                        if (isset($_SESSION) && !empty($_SESSION) && $admin['permiso'] != 1) {
                            echo  "<li class='active'><a href='misCursos.php' method='post'>mis cursos 
                                <i class='fas fa-laptop-code'></i></a></li>";
                        }
                        ?>
                    </ol>
                </div>



                <?php echo $Actividades->ListarCursos(); ?>


            </div>
            <!--aqui el aside que va ubicado a la derecha cubriendo el resto de espacio que no cubre la seccion de cursos-->
            <aside class="col-md-3 hidden-xs hidden-sm">
                <h4>Categorias</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Diseño Web</a>
                    <a href="#" class="list-group-item ">Recursos</a>
                    <a href="#" class="list-group-item ">Elementos Web</a>
                    <a href="#" class="list-group-item ">Cursos</a>
                    <a href="#" class="list-group-item ">Seo</a>
                    <a href="#" class="list-group-item ">CSS</a>
                </div>
                <h4>Articulos Recientes</h4>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-headding">Incia proyector HTML5 mas rapido con bootstrap</h4>
                    <p class="list-group-item-text">Aprende como iniciar un proyecto HTML5 desde en 15 min</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-headding">Incia proyector HTML5 mas rapido con bootstrap</h4>
                    <p class="list-group-item-text">Aprende como iniciar un proyecto HTML5 desde en 15 min</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-headding">Incia proyector HTML5 mas rapido con bootstrap</h4>
                    <p class="list-group-item-text">Aprende como iniciar un proyecto HTML5 desde en 15 min</p>
                </a>
            </aside>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <p>Luz Carrero</p>
                </div>
                <div class=" col-xs-6 col-mg-6">
                    <ul class="list-inline tex-lef">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Cursos</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>