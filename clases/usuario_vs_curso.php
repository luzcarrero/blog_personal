<?php

/*
*CLASE PARA LA GESTION DE USUARIOS
*/
class ListarCursos_vs
{

    private $lista;
    private $tabla;
    private $cursos;

    public function __construct()
    {
        $this->lista = array();
        $this->tabla = "usuario_vs_curso";
        $this->cursos = array();
    }

    public function obtenerCurso()
    {

        $conexion = new Bd($this->tabla);

        $sql = "SELECT * FROM " . $this->tabla . " WHERE pk_usuario = " . $_SESSION['id'];
        $res = $conexion->consulta($sql);
        while ($fila = $res->fetch_assoc()) {
             array_push($this->cursos, $fila['pk_cursos']);
        }
        $sql2 = " SELECT * FROM cursos WHERE id in (" . implode(", ", $this->cursos) . ")";
        $res2 = $conexion->consulta($sql2);

         if($res2!=false){
            while (list($id, $titulo, $descripcion, $ruta) = mysqli_fetch_array($res2)) {
                $fila = new Curso($id, $titulo, $descripcion, $ruta);
                array_push($this->lista, $fila);
            }
        }
    }

    public function ListarCursos()
    {

        $txt = "";

        for ($i = 0; $i < sizeof($this->lista); $i++) {
            $txt .= "<article class='post  clearfix'>";
            $txt .= $this->lista[$i]->imprimemiscursos();
            $txt .= "</article>";
        }



        return $txt;
    }
}


class Curso_vs_usuario
{
    /**
     * atributos
     */
    private $id;
    private $pk_usuario;
    private $pk_cursos;



    private $tabla;

    public function __construct($id = "", $pk_usuario = "", $pk_cursos = "")
    {

        $this->id = $id;
        $this->pk_usuario = $pk_usuario;
        $this->pk_cursos = $pk_cursos;
        

        $this->tabla = "usuario_vs_curso";
    }

    
    public function insertar($datos)
    {

        $conexion = new Bd($this->tabla);
        $conexion->insertarConFoto($this->tabla, $datos);
    }

    /**
     * consulta a la base de datos logueado 
     *verificar qu existe 
     */




    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setPk_cursos($pk_cursos)
    {
        $this->pk_cursos = $pk_cursos;
    }
    public function getPk_cursos()
    {
        return $this->pk_cursos;
    }

    public function getPk_usuario()
    {
        return $this->pk_usuario;
    }

    public function setPk_usuario($pk_usuario)
    {
        $this->pk_usuario = $pk_usuario;
    }
    

    public function obtenerPorID($id)
    {

        $sql = "SELECT * FROM " . $this->tabla . " WHERE id=" . $id;

        $conexion = new Bd($this->tabla);
        $res = $conexion->consultaSimple($sql);


        $this->llenardesdeBD($res['id'], $res['pk_usuario'], $res['pk_cursos']);
    }

    private function llenardesdeBD($id = "", $pk_usuario = "", $pk_cursos = "")
    {

        
        $this->id = $id;
        $this->pk_usuario = $pk_usuario;
        $this->pk_cursos = $pk_cursos;
    }
    public function actualizar($id, $datos)
    {
        $conexion = new Bd($this->tabla);
        $conexion->uppdateBD($id, $this->tabla, $datos);
    }

    /**
     * metodo para eliminar usuarios 
     */
    public function eliminaCurso($id)
    {
       session_start();
        $bd = new Bd($this->tabla);
        $sql = "DELETE FROM usuario_vs_curso "." WHERE pk_usuario = " . $_SESSION['id'] ." AND pk_cursos =".$id;

        $resultado = $bd->consulta($sql);
        if ($resultado == true) {
            header('location: misCursos.php');
        }
    }

   

    public function eliminar($id)
    {
        $conexion = new Bd($this->tabla);
        $sql = "DELETE FROM " . $this->tabla . " WHERE id='$id'";
        $res = $conexion->consulta($sql);
    }

    public function imprimeCursos()
    {

        $txt = "<a href='#' class='thumb pull-lef conte-img'>" .
            "<img class='img-thumbnail' src='" . $this->ruta . "' alt='" . $this->titulo . "'/>" .
            "</a>" .
            "<h2 class='post-title'><a href='#'>" . $this->titulo . "</h2>" .
            "<p><span class='post-fecha'>Marzo-2019</span> por <span clas'post-autor'><a href='#'>Luz Carrero</a></span></p>" .
            "<p class='post-contenido tex-justify'>" . $this->descripcion . "</p>" .
            "<div class='contenedor-botones'>" .
            " <a href='#' class='btn btn-primary'>Leer mas</a>" .
            "<a href='#' class='btn btn-success'>Comentarios <span class='badge'>50<span></a>" .
            "</div>";

        return $txt;
    }

    /**
     * metodo para que los usuarios puedan guardar cursos
     */

    
}
