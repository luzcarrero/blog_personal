<?php

require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";

$Eliminado=new Usuario();
$id=$_GET['id'];
$Eliminado->eliminar($id);


header("location: index.php");
