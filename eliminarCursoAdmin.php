<?php

require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Curso.php";

$Eliminado=new Curso();
$id=$_GET['id'];
$Eliminado->eliminar($id);


header("location: inicio.php");
