<?php
require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";
require_once "clases/Mensajes.php";
$id=$_GET['id'];

$Eliminado=new Usuario();
$Eliminado->eliminar($id);
header("location: inicio.php");

