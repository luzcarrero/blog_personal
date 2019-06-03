
<?php
require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";
require_once "clases/Curso.php";
require_once "clases/usuario_vs_curso.php";
require_once "includes\protecc.php";

$listaCursos=new ListarCursos_vs();
$listaCursos->obtenerCurso();



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
        
<header>
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
                    <span class="sr-only">desplegar/ocultar menu</span>
                    <span class=""></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand ">Altair<img src="img/code.png" alt=""/>Programming</a>
            </div>
            <!--aqui comienza el menu-->
            <div class="collapse navbar-collapse" id="navegacion-fm">
                <ul class="nav navbar-nav">
                    <li class=""><a href="#">Inicio</a></li>
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            categoria <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Medio</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Avanzado</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fas fa-star"> <span> Principiante </span></i></a></li>
                        </ul>
                    </li>
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            blog <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="sobreMi.php">¿Quién soy?</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Articulos</a></li>
                          
                            
                        </ul>
                    </li>
                    <li class="" >
                    <a href="salir.php" class=""  role="button">
                                cerrar sesion
                        </a>

                    </li>
                </ul>
                <!-barra de busqueda y botoncito-->
                <form action="#" class="navbar-form navbar-right" rol="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="buscar"/>
                    </div>
                    <button type="sumit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>

            </div>

        </div>
       
    </nav>
</header>
         <!--aqui va el jumbotron-->
         <section class="jumbotron">         
             <div class=" container">
            <?php if(!empty($_SESSION['nombre'])){
                echo "Bienvenido</a> "."(".$_SESSION['nombre'].")";
            }?>
         </section>

<section class="main container">
    <div class="row">
        <div class="posts col-md-9">



            <div class="migas-de-pan">
                <ol class="breadcrumb">
                    <li><a href="inicio.php">Inicio</a></li> 
                    <li class="active">Diseño Web</li>
                    
                    <li><i class='far fa-folder-open'></i></li>   
                </ol>
            </div>

            <?php $hola = $listaCursos->ListarCursos();
            if (isset($hola) && !empty($hola)){                
            echo $listaCursos->ListarCursos();
            }else{
                $txt=
               " <div class='alert alert-success' role='alert'>"."
                <h4 class='alert-heading'>No tienes cursos disponibles!!</h4>".
               "<p>Añade cursos de tu preferencia.
               </p>".
                "<hr>".
                "<p class='mb-0'>¡Comparte conmigo la aventura de aprender.!</p>".
                "</div>";
                echo $txt;
            } ?>
            

        </div>
<!--aqui el aside que va ubicado a la derecha cubriendo el resto de espacio que no cubre la seccion de cursos-->
       
    </div>
</section>
        </body>
</html>