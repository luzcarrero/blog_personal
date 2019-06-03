<?php
require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Curso.php";

$actividad = new Curso();

if (isset($_POST) && !empty($_POST)) {

    $actividad->insertar($_POST, $_FILES);

    header("location: inicio.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosCursos.css">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <header><img src="./img/cursos.png" alt=""></header>
    <div class="main container">
        <div class="caja">
            <div class="card">
                <div class="card-header">
                    <h3>Añade un nuevo curso</h3>
                </div>
                <div class="card-body">

                    <form name="altas" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" class="form-control" placeholder="id" <?php $actividad->getId() ?>required>
                        <input type="text" name="titulo" class="form-control" placeholder="Titulo" <?php $actividad->getTitulo() ?> required>
                        <textarea type="text" name="descripcion" class="form-control" placeholder="Descripcion" <?php $actividad->getDescripcion() ?> required></textarea>

                        <input type="file" name="ruta" class="form-control" placeholder="ruta">
                        <div class="row align-items-center remember">
                        </div>
                        <div class="form-group">
                            <div class="boton">
                                <input type="submit" class=" btn btn-light btn-lg" value="enviar"></input>
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>