<?php

require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";
require_once "clases/Mensajes.php";
$id=$_GET['id'];


$borrarMensaje= new Mensaje();
$borrarMensaje->eliminarMensaje($id);
header("location: enviados.php");

