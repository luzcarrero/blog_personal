<?php

require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/Usuario.php";
require_once "clases/usuario_vs_curso.php";

$Eliminado=new Curso_vs_usuario();
$id=$_GET['id'];

$Eliminado->eliminaCurso($id);


header("location: misCursos.php");
