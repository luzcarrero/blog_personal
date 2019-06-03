<?php

require_once "clases/Bd.php";
require_once "clases/funciones.php";
require_once "clases/usuario_vs_curso.php";

$insertado=new Curso_vs_usuario();
session_start();
$data = array('pk_usuario'=>$_SESSION['id'], 'pk_cursos' => $_GET['id']);
$insertado->insertar($data);
header("location: inicio.php");