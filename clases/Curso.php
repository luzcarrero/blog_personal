<?php

/*
*CLASE PARA LA GESTION DE USUARIOS
*/
class ListarCursos
{

    private $lista;
    private $tabla;

    public function __construct()
    {
        $this->lista = array();
        $this->tabla = "cursos";
    }

    public function obtenerUsuarios()
    {
        $conexion = new Bd($this->tabla);

        $sql = "SELECT * FROM " . $this->tabla;

        $res = $conexion->consulta($sql);

        while (list($id, $titulo, $descripcion, $ruta) = mysqli_fetch_array($res)) {
            $fila = new Curso($id, $titulo, $descripcion, $ruta);
            array_push($this->lista, $fila);
        }
    }
    public function ListarCursos()
    {
        $usuario = new Usuario();
        $txt = "";
        $admin = $usuario->obtenerPorID($_SESSION['id']);
        if ($admin['permiso'] == 1) {
            for ($i = 0; $i < sizeof($this->lista); $i++) {
                $txt .= "<article class='post  clearfix'>";
                $txt .= $this->lista[$i]->imprimirAdmin();
                $txt .= "</article>";
            }
        } else {
            for ($i = 0; $i < sizeof($this->lista); $i++) {
                $txt .= "<article class='post  clearfix'>";
                $txt .= $this->lista[$i]->imprimir();
                $txt .= "</article>";
            }
        }



        return $txt;
    }
}

class Curso
{
    /**
     * atributos
     */
    private $id;
    private $titulo;
    private $descripcion;
    private $ruta;


    private $tabla;

    public function __construct($id = "", $titulo = "", $descripcion = "", $ruta = "")
    {

        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->ruta = $ruta;

        $this->tabla = "cursos";
    }

    /**
     * otro metodo para añadir usuario
     */
    public function insertar($datos, $foto)
    {

        $conexion = new Bd($this->tabla);
        $conexion->insertarConFoto($this->tabla, $datos, $foto['ruta'], "img/");
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
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getRuta()
    {

        return $this->ruta;
    }


    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }


    public function obtenerPorID($id)
    {

        $sql = "SELECT * FROM " . $this->tabla . " WHERE id=" . $id;

        $conexion = new Bd($this->tabla);
        $res = $conexion->consultaSimple($sql);

        $this->llenardesdeBD($res['id'], $res['titulo'], $res['descripcion'], $res['ruta']);
    }

    private function llenardesdeBD($id = "", $titulo = "", $descripcion = "", $ruta = "")
    {

        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->ruta = $ruta;
    }
    public function actualizar($id, $datos, $foto)
    {
        ver($foto);
        $conexion = new Bd();
        $conexion->uppdateBD($id, $this->tabla, $datos, $foto['ruta'], "img/");
    }

    /**
     * metodo para eliminar usuarios 
     */
    public function eliminaCurso()
    {
        $bd = new Bd($this->tabla);
        $sql = "DELETE FROM usuarios WHERE id=" . $_GET['id'];
        print_r($sql);
        $resultado = $bd->consulta($sql);
        if ($resultado == true) {
            header('location: gestionUsuarios.php');
        }
    }

    /**
     * metodo para editar usuario
     */
    public function editar($id, $datos)
    {
        $sql = new Bd($this->tabla);
        $sentencias = array();

        foreach ($datos as $campo => $valor) {
            if ($campo != "id" && $campo != "x" && $campo != "y") {
                $sentencias[] = $campo . "='" . addslashes($valor) . "'";
            }
        }

        $campos = implode(",", $sentencias);
        $act = "UPDATE " . $this->tabla . " SET " . $campos . " WHERE id=" . $id;

        $sql->consulta($act);
    }

    public function eliminar($id)
    {
        $conexion = new Bd($this->tabla);
        $sql = "DELETE FROM " . $this->tabla . " WHERE id=".$id;
        $res = $conexion->consulta($sql);
        
    }

    public function imprimir()
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
            "<a class='btn' href='añadir_curso.php?id=" . $this->id . "'>Añadir Curso</a>" .
            "</div>";

        return $txt;
    }
    public function imprimirAdmin()
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
            "<a class='btn' href='eliminarCursoAdmin.php?id=" . $this->id . "'>Borrar</a>" .
            "<a class='btn' href='editarActividades.php?id=" . $this->id . "'>Editar</a>" .


            "</div>";

        return $txt;
    }

    public function imprimemiscursos()
    {

        $txt = "<a href='#' class='thumb pull-lef conte-img'>" .
            "<img class='img-thumbnail' src='" . $this->ruta . "' alt='" . $this->titulo . "'/>" .
            "</a>" .
            "<h2 class='post-title'><a href='#'>" . $this->titulo . "</h2>" .
            "<p><span class='post-fecha'>Marzo-2019</span> por <span clas'post-autor'><a href='#'>Luz Carrero</a></span></p>" .
            "<p class='post-contenido tex-justify'>" . $this->descripcion . "</p>" .
            "<div class='contenedor-botones'>" .
            " <a href='#' class='btn btn-primary'>Leer mas</a>" .
            "<td><a class='btn' href='eliminarCurso.php?id=" . $this->id . "'>
            <i class='fas fa-trash-alt'></i></a></td>" .
            "</div>";

        return $txt;
    }

    /**
     * metodo para que los usuarios puedan guardar cursos
     */
}
