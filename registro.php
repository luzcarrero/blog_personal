
<?php

require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";

$usuario = new Usuario();
if(isset($_GET['id']) && !empty($_GET['id'])){
  
    $id = intval($_GET['id']);
    $usuario->obtenerPorID($id); 
 
}
 
if(isset($_POST) && !empty($_POST)){
 
if(isset($_POST['id']) && !empty($_POST['id'])){
    //actualizando
 
    $id = intval($_POST['id']);
 
    $usuario->actualizar($id, $_POST, $_FILES);
 
}
}
if (isset($_POST) && !empty($_POST)) {
    
  
    $usuario->registro($_POST);
    header("location: inicio.php");    
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/StyleContac.css"/>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="caja">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="redes_sociales">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                
                <form name="iniciacion" action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">
                    <input type="hidden" name="id" class="form-control" placeholder="id" value="<?php  echo $usuario->getId() ?>">    
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php  echo $usuario->getNombre() ?>"required>
                    <input type="text" name="mail" class="form-control" placeholder="correo" value="<?php  echo $usuario->getCorreo() ?>" required>
                    <input type="password" name="clave" class="form-control" placeholder="contraseña" value="<?php  echo $usuario->getClave() ?>">
                    <div class="row align-items-center remember">
                        <input type="checkbox">Recordarme
                    </div>
                    <div class="form-group">
                    <div class="boton">
                   <input type="submit" class="boton" value="enviar"></input>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="links">
                   <a href="acceso.php">Estoy registrado, Iniciar Sesión</a>
                </div>
               
            </div>
        </div>
    </div>
</div>
</body>
</html>