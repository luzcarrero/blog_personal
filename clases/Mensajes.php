<?php

/*
*CLASE PARA LA GESTION DE USUARIOS
*/
class ListarMensajes
{

    private $lista;
    private $tabla;

    public function __construct()
    {
        $this->lista = array();
        $this->tabla = "mensaje";
    }

    public function obtenerMensaje()
    {


        $conexion = new Bd($this->tabla);

        $sql = "SELECT * FROM " . $this->tabla . " WHERE de = '" . $_SESSION['nombre'] ."'";

        $res = $conexion->consulta($sql);
        if (isset($res) && $res != '') {

            while (list($id, $para, $de, $descripcion, $leido) = mysqli_fetch_array($res)) {
                $fila = new Mensaje($id, $para, $de, $descripcion, $leido);
                array_push($this->lista, $fila);
            }
        }else{
            $txt=
            " <div class='alert alert-success' role='alert'>"."
             <h4 class='alert-heading'>No tienes mensajes</h4>".
            "<p>En algun momento te escribiran y si no pues sal a la calle y busca amigos.
            </p>".
             "<hr>".         
             "</div>";
             echo $txt;
        }
    }

    public function MensajesRecibidos()
    {


        $conexion = new Bd($this->tabla);

        $sql = "SELECT * FROM " . $this->tabla . " WHERE para = '" . $_SESSION['nombre'] ."'";

        $res = $conexion->consulta($sql);
        if (isset($res) && $res != '') {

            while (list($id, $para, $de, $descripcion, $leido) = mysqli_fetch_array($res)) {
                $fila = new Mensaje($id, $para, $de, $descripcion, $leido);
                array_push($this->lista, $fila);
            }
        }else{
            $txt=
            " <div class='alert alert-success' role='alert'>"."
             <h4 class='alert-heading'>No tienes mensajes</h4>".
            "<p>En algun momento te escribiran y si no pues sal a la calle y busca amigos.
            </p>".
             "<hr>".         
             "</div>";
             echo $txt;
        }
    }


    public function listarEnTabla()
    {
        $txt = " <form  class='main container lg>";

        for ($i = 0; $i < sizeof($this->lista); $i++) {
            $txt .= $this->lista[$i]->muestraMensaje();
            $txt .= "<br>";
        }

        $txt .= "</form>";
        return $txt;
    }
}

class Mensaje
{
    /**
     * atributos
     */
    private $id;
    private $para;
    private $de;
    private $descripcion;
    private $leido;

    private $tabla;

    public function __construct($id = "", $para = "", $de = "", $descripcion = "", $leido = "")
    {

        $this->id = $id;
        $this->para = $para;
        $this->de = $de;
        $this->descripcion = $descripcion;
        $this->leido = $leido;

        $this->tabla = "mensaje";
    }



    public function registro($datos)
    {
        $conexion = new Bd($this->tabla);
        $conexion->insertar($this->tabla, $datos);
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setPara($para)
    {
        $this->para = $para;
    }

    public function getPara()
    {
        return $this->para;
    }

    public function getDe()
    {
        return $this->de;
    }

    public function setDe($de)
    {
        $this->de = $de;
    }
    public function getDescripcion()
    {

        return $this->descripcion;
    }


    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getLeido()
    {
        return $this->leido;
    }
    public function  setLeido($leido)
    {
        $this->leido = $leido;
    }

    public function obtenerPorID($id)
    {


        $sql = "SELECT * FROM " . $this->tabla . " WHERE id=" . $id;

        $conexion = new Bd($this->tabla);
        $res = $conexion->consultaSimple($sql);

        $this->llenardesdeBD($res['id'], $res['para'], $res['de'], $res['descripcion'], $res['leido']);
        return $res;
    }


    private function llenardesdeBD($id = "", $para = "", $de = "", $descripcion = "", $leido = "")
    {

        $this->id = $id;
        $this->para = $para;
        $this->de = $de;
        $this->descripcion = $descripcion;
        $this->leido = $leido;
    }
    public function actualizar($id, $datos)
    {
        $conexion = new Bd($this->tabla);
        $conexion->uppdateBD($id, $this->tabla, $datos);
    }



    public function dameUsusarioPorNombre($usuario)
    {
        $usuario = new Usuario();
        foreach ($usuario as $clave => $valor) {
            $$clave = addslashes($valor);
        }

        $this->mail = $usuario['mail'];
        $this->usuarioExiste($usuario);
    }

    /**
     * metodo que comprueba si el usuario existe
     * para que pueda acceder a su index,
     * si no existe, debe registrarse
     */
    public function usuarioExiste($nombre)
    {


        $bd = new Bd();

        $usser = "SELECT * FROM usuario WHERE nombre ='" . $nombre . "'";
        $resultado = $bd->consultaSimple($usser);
        if (isset($resultado)) {
            return true;
        } else {
            return false;
        }
    }


    public function eliminarMensaje()
    {
        $bd = new Bd($this->tabla);
        $sql = "DELETE FROM mensaje WHERE id=" . $_GET['id'];

        $resultado = $bd->consulta($sql);
        if ($resultado == true) {
            header('location: inicio.php');
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
        $sql = "DELETE FROM " . $this->tabla . " WHERE id='$id'";
        $res = $conexion->consulta($sql);
    }

    public function muestraMensaje()
    {
        $txt = "<div class='form-group '>" .
            "<a href='eliminar.php?id=" . $this->id . "'>
        <i class='fas fa-trash-alt'></i></a></td>" .
            "<label>Para:</label>" .
            "<input type='email' type='text' class='form-control' placeholder='" . $this->para . "' >" .
            "</div>" . 
            " <label>De</label>".
            "<input type='text' class='form-control'  placeholder='".$this->de."'>".
             " <div class='form-group'>" .
            "<label>Mensaje</label>" .
            "<textarea class='form-control'  type='text' rows='3'>" . $this->descripcion . "</textarea>" .
            "<a href='enviarMensajes.php' role='button'>Responder <span class='glyphicon'>&#x270f;</span></a>".
            "</div>";
        return $txt;
    }
}
