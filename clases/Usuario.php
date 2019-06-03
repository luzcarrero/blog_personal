<?php

/*
*CLASE PARA LA GESTION DE USUARIOS
*/
class ListarUsuarios
{

    private $lista;
    private $tabla;

    public function __construct()
    {
        $this->lista = array();
        $this->tabla = "usuario";
    }

    public function obtenerUsuarios()
    {
        $conexion = new Bd($this->tabla);

        $sql = "SELECT * FROM " . $this->tabla;

        $res = $conexion->consulta($sql);

        while (list($id, $nombre, $mail, $clave, $permiso) = mysqli_fetch_array($res)) {
            $fila = new Usuario($id, $nombre, $mail, $mail, $clave, $permiso);
            array_push($this->lista, $fila);
        }
    }
    public function ListarUsuarios(){
        $txt="<table class='table main container'>".
        " <thead class='thead-dark'>
        <tr>".
        "<th scope='col'>ID#</th>".
        "<th scope='col'>Nombre</th>".
        "<th scope='col'>Mail</th>".
        "<th scope='col'>Clave</th>".
        "<th scope='col'>Editar</th>".
        "<th scope='col'>Eliminar</th>";
        ;

        for ($i = 0; $i < sizeof($this->lista); $i++) {
            $txt .= $this->lista[$i]->imprimeUsuariosEnTabla();
        }

        $txt.= "</tr>"."</thead><tbody></tbody> </table>";

        return $txt;
 

    }
    public function listarEnTabla()
    {
        $txt = "<table border='1'>";
        for ($i = 0; $i < sizeof($this->lista); $i++) {
            $txt .= $this->lista[$i]->imprimefila();
        }

        $txt .= "</table>";
        return $txt;
    }
}

class Usuario
{
    /**
     * atributos
     */
    private $id;
    private $nombre;
    private $mail;
    private $clave;
    private $permiso;

    private $tabla;

    public function __construct($id = "", $nombre = "", $mail = "", $clave = "", $permiso = "")
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->mail = $mail;
        $this->clave = $clave;
        $this->permiso = $permiso;

        $this->tabla = "usuario";
    }

    /**
     * otro metodo para añadir usuario
     */

    public function registro($datos)
    {
        // print_r('hola');
        // print_r($datos);
        // exit;
        $conexion = new Bd($this->tabla);
        $datos['clave'] = md5($datos['clave']);
        $conexion->insertar($this->tabla, $datos);
    }
    /**
     * consulta a la base de datos logueado 
     *verificar qu existe 
     */

    
    public function login($datos)
    {
      
        $ok = true;
        $sql = "SELECT id, nombre , mail 
         FROM " . $this->tabla . "
         WHERE mail='" . $datos['mail'] . "' AND clave='" . md5($datos['clave']) . "';";

        $bd = new Bd($this->tabla);

        $res = $bd->consultaSimple($sql);
      
        if (!$res) {
            $ok = false;
        } else {

            session_start();
            $_SESSION['id'] = $res['id'];
            $_SESSION['nombre'] = $res['nombre'];
            $ok = true;
        }
        return $ok;
    }


    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setCorreo($mail)
    {
        $this->mail = $mail;
    }
    public function getCorreo()
    {

        return $this->mail;
    }


    public function setClave($clave)
    {
        $this->clave = $clave;
    }
    public function getPermiso()
    {
        return $this->permiso;
    }
    public function  setPermiso($permiso)
    {
        $this->permiso = $permiso;
    }
    
    public function obtenerPorID($id){

        
        $sql = "SELECT * FROM ".$this->tabla." WHERE id=".$id;
        
        $conexion = new Bd($this->tabla);
        $res = $conexion->consultaSimple($sql);
        
        $this->llenardesdeBD($res['id'],$res['nombre'],$res['mail'],$res['clave'],$res['permiso']);
        return $res;
 
    }
   
    
    private function llenardesdeBD($id ="", $nombre="", $mail="", $clave="", $permiso=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->mail = $mail;
        $this->clave = $clave;
        $this->permiso = $permiso;
      
 
    }
    public function actualizar($id, $datos){
                  $conexion = new Bd($this->tabla);
                $conexion->uppdateBD($id,$this->tabla,$datos);
         
         
        }
    /*
 * metodo para añadir usuarios 
 * dentro del CRUD seria "C" de crear
 */
    public function anadeUsuario($usuario)
    {

        foreach ($usuario as $clave => $valor) {
            $$clave = addslashes($valor);
        }
        $this->nombre = $usuario['nombre'];
        $this->mail = $usuario['mail'];
        $this->clave = $usuario['clave'];
        $this->lanzoQueryadd();
        $this->usuarioExiste($usuario);
    }
    /**
     * metodo que comprueba si el usuario existe
     */

    public function dameUsuario($usuario)
    {

        foreach ($usuario as $clave => $valor) {
            $$clave = addslashes($valor);
        }

        $this->mail = $usuario['mail'];
        $this->clave = md5($usuario['clave']);

        $this->usuarioExiste($usuario);
    }
    /**
     * metodo que comprueba si el usuario existe
     * para que pueda acceder a su index,
     * si no existe, debe registrarse
     */
    public function usuarioExiste($usuario)
    {
        $bd = new Bd();

        $usser = "SELECT * FROM usuarios WHERE mail='" . $this->mail . "'" . " AND clave='" . $this->clave . "'";
        $resultado = $bd->consulta($usser);


        if ($bd->numeroElementos() == 1) {
            session_start();
            $_SESSION['mail'] = $this->mail;
            $_SESSION['clave'] = $this->clave;

            header('location: inici.php');
        } else {

            header("location: registro.php");
        }
    }

    /**
     *metodo para añadir usuarios
     */
    private function lanzoQueryadd()
    {
        $bd = new Bd($this->tabla);
        $sql = "INSERT INTO usuarios (nombre,mail,clave) "
            . "VALUES('" . $this->nombre . "','" . $this->mail . "','" . $this->clave . "')";

        $resultado = $bd->consulta($sql);

        if ($resultado == true) {
            header('location: index.php');
        }
    }
    /**
     * metodo para eliminar usuarios 
     */
    public function eliminarUsuario()
    {
        $bd = new Bd($this->tabla);
        $sql = "DELETE FROM usuarios WHERE id=" . $_GET['id'];

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
    
    public function eliminar($id){
        $conexion=new Bd($this->tabla);
        $sql="DELETE FROM ".$this->tabla." WHERE id='$id'";    
        $res=$conexion->consulta($sql); 
        
    }
    
    public function imprimeUsuariosEnTabla(){
        $txt=
        
        "<tr>".
        "<td scope='row'>".$this->id."</td>".
        "<td>".$this->nombre."</td>".
        "<td>".$this->mail."</td>".
        "<td>".$this->clave."</td>".
        "<td><a href='registro.php?id=" . $this->id . "'> editar<i class='fas fa-sync'></i></td>".
        "<td><a href='eliminarUsuario.php?id=" . $this->id . "'> Borrar<i class='fas fa-trash-alt'></i></a></td>".
        "</tr>"
        ."</div>";
    return $txt;

    }
   
}
