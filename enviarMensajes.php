<?php

require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";
require_once "clases/Curso.php";
require_once "clases/Mensajes.php";
require_once "includes\protecc.php";

$mensaje = new Mensaje();

if (isset($_POST) && !empty($_POST)) {
    if ($mensaje->usuarioExiste($_POST['para']) == true) {
        $mensaje->registro($_POST);
    }else{
        $txt=
        " <div class='alert alert-success' role='alert'>"."
         <h4 class='alert-heading'>El usuario no existe!!</h4>".
        "<p>intenta de nuevo.
        </p>".
         "<hr>".         
         "</div>";
         echo $txt;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

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

    <?php include("includes/headerAdmin.php") ?>

    <form class="main container" name="enviarMensaje" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group ">
            <label for="exampleFormControlInput1">Para:</label>
            <input type="text" name="para" class="form-control" id="exampleFormControlInput1" placeholder="Nombre del usuario">
        </div>        <div class="form-group ">
        <label>De:</label>
            <input type="text" type="hidden" name="de" class="form-control" value="<?php echo $_SESSION['nombre'] ?>" placeholder="<?php echo $_SESSION['nombre'] ?>">
        </div>
        <div class="form-group ">

            <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mensaje</label>

            <textarea class="form-control" type="text" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="">
            <input type="submit" class="btn btn-primary btn-group-justified">

        </div>
    </form>


</body>

</html>