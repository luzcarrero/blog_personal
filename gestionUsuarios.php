

<?php
require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";
$lista=new ListarUsuarios();
$lista->obtenerUsuarios();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
<?php include ("includes/header.php");?>
<?php echo $lista->ListarUsuarios();?>    




</body>
</html>