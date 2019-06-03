

<?php

require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";

$usuario = new Usuario();

if (isset($_POST) && !empty($_POST)) {
  
        $usuario->login($_POST);        
        header ("location: inicio.php");
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
                <form name="acceso" action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">              
                        <input type="mail" name="mail" class="form-control" placeholder="correro">
                        <input type="password" name="clave" class="form-control" placeholder="password">

                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" value="entrar" class="boton"></input>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="links">
                   Aun no tengo cuenta<a href="registro.php">registrarme</a>
                </div>
                <div class="links">
                    <a href="#">has olvidado tu contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>