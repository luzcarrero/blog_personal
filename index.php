
<?php
session_start();

if(!isset($_SESSION['id']) && empty($_SESSION['id']) ){
    header('location_index.php');
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
                        <a href="acceso.php" class=""  role="button">
                                iniciar sesion
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
                 <h1> Luz Carrero</h1>
                 <p>blog de diseño web</p>
             </div>
         </section>

<section class="main container">
    <div class="row">
        <div class="posts col-md-9">



            <div class="migas-de-pan">
                <ol class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Categorias</a></li>
                    <li class="active">Diseño Web</li>
                </ol>
            </div>


            <article class="post  clearfix">
            <a href="#" class="thumb pull-lef conte-img">
                <img class="img-thumbnail" src="img/HTML5.jpg" alt="javascript"/>
            </a>
            <h2 class="post-title">
                <a href="#">¿Que es HTML5?</a>
            </h2>
            <p><span class="post-fecha">Marzo-2019</span> por <span class="post-autor"><a href="#">Luz Carrero</a></span></p>
            <p class="post-contenido tex-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Cum, ex ipsum iure libero minima numquam omnis sapiente voluptate!
                Aperiam aut cum deleniti minus nulla quibusdam reprehenderit sint, ullam unde voluptates?
            </p>
            <div class="contenedor-botones">
                <a href="#" class="btn btn-primary">Leer mas</a>
                <a href="#" class="btn btn-success">Comentarios <span class="badge">50</span></a>
            </div>
        </article>

            <article class="post  clearfix">
                <a href="#" class="thumb pull-lef conte-img">
                    <img class="img-thumbnail" src="img/CSS.jpeg" alt="javascript"/>
                </a>
                <h2 class="post-title">
                    <a href="#">CSS ¡fácil y rapido!</a>
                </h2>
                <p><span class="post-fecha">Marzo-2019</span> por <span class="post-autor"><a href="#">Luz Carrero</a></span></p>
                <p class="post-contenido tex-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Cum, ex ipsum iure libero minima numquam omnis sapiente voluptate!
                    Aperiam aut cum deleniti minus nulla quibusdam reprehenderit sint, ullam unde voluptates?
                </p>
                <div class="contenedor-botones">
                    <a href="#" class="btn btn-primary">Leer mas</a>
                    <a href="#" class="btn btn-success">Comentarios <span class="badge">50</span></a>
                </div>
            </article>

            <article class="post  clearfix">
                <a href="#" class="thumb pull-lef conte-img">
                    <img class="img-thumbnail" src="img/javascript-img.jpg" alt="javascript"/>
                </a>
                <h2 class="post-title">
                    <a href="#">JavaScript</a>
                </h2>
                <p><span class="post-fecha">Marzo-2019</span> por <span class="post-autor"><a href="#">Luz Carrero</a></span></p>
                <p class="post-contenido tex-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Cum, ex ipsum iure libero minima numquam omnis sapiente voluptate!
                    Aperiam aut cum deleniti minus nulla quibusdam reprehenderit sint, ullam unde voluptates?
                </p>
                <div class="contenedor-botones">
                    <a href="#" class="btn btn-primary">Leer mas</a>
                    <a href="#" class="btn btn-success">Comentarios <span class="badge">50</span></a>
                </div>
            </article>
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
                <a href="#" class="list-group-item " >CSS</a>
            </div>
            <h4>Articulos Recientes</h4>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-headding">Incia proyector HTML5 mas rapido con bootstrap</h4>
                <p class="list-group-item-text">Aprende como iniciar un proyecto HTML5 desde  en 15 min</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-headding">Incia proyector HTML5 mas rapido con bootstrap</h4>
                <p class="list-group-item-text">Aprende como iniciar un proyecto HTML5 desde  en 15 min</p>
            </a>
            <a href="#" class="list-group-item">
                <h4 class="list-group-item-headding">Incia proyector HTML5 mas rapido con bootstrap</h4>
                <p class="list-group-item-text">Aprende como iniciar un proyecto HTML5 desde  en 15 min</p>
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