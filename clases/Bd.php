<?php

class Bd
{

    private $server = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $basedatos = "blog_personal";
    private $conexion;
    private $resultado;

    private $tabla;


    public function __construct($tabla = "")
    {
        $this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->basedatos);
        $this->conexion->select_db($this->basedatos);
        $this->conexion->query("SET NAMES 'utf8'");
        $this->tabla = $tabla;
    }



    /**
     * Metodo que lanza un insertar datos a  la BD con la posibilidad de incluir una foto.
     * Para que funcione, deben llamarse igual los campos del formulario y los atributos de la base de datos
     */

    public function insertar($tabla, $datos)
    {
    
        $claves  = array();
        $valores = array();

        foreach ($datos as $clave => $valor) {

            if ($clave != "id") {
                $claves[] = addslashes($clave);
                $valores[] = ("'" . addslashes($valor) . "'");
            }
        }
        $sql = "INSERT INTO " . $tabla . " (" . implode(',', $claves) . ") 
            VALUES  (" . implode(',', $valores) . ")";
        $this->resultado =   $this->conexion->query($sql);
        $res = $this->resultado;


        return $res;
    }


    public function insertarConFoto($tabla, $datos, $foto = 0, $directorio = "")
    {

        $claves  = array();
        $valores = array();

        foreach ($datos as $clave => $valor) {
            $claves[] = addslashes($clave);
            $valores[] = "'" . addslashes($valor) . "'";
        }

        if ($foto != 0) {
            $ruta = subirFoto($foto, $directorio);

            $claves[] = "ruta";
            $valores[] = "'" . $ruta . "'";
        }


        $sql = "INSERT INTO " . $tabla . " (" . implode(',', $claves) . ") VALUES  (" . implode(',', $valores) . ")";


        $this->resultado =   $this->conexion->query($sql);
        $res = $this->resultado;
        return $res;
    }



    public function consultaSimple($consulta)
    {
        $this->resultado = $this->conexion->query($consulta);
        $res = mysqli_fetch_assoc($this->resultado);
        return $res;
    }

    public function consulta($consulta)
    {
        $this->resultado =   $this->conexion->query($consulta);
        $res = $this->resultado;
        return $res;
    }



    /**
     * Metodo actualizar con sudida de foto
     * @param type $id
     * @param type $tabla
     * @param type $datos
     * @param type $foto
     * @param type $directorio
     */
    public function uppdateBD($id, $tabla, $datos, $foto = "", $directorio = "", $campoNuevo = "ruta")
    {

        $sentencias = array();

        ver($datos);
        foreach ($datos as $campo => $valor) {
            if ($campo != "id" && $campo != "x" && $campo != "y") {
                $sentencias[] = $campo . "='" . addslashes($valor) . "'";
            }
        }


        if (strlen($foto['name']) > 0) {
            //  borrarFoto($id, $tabla, 'ruta');
            $ruta = subirFoto($foto, $directorio);
            $sentencias[] = $campoNuevo . "='" . $ruta . "'";
        }

        $campos = implode(",", $sentencias);
        $sql = "UPDATE " . $tabla . " SET " . $campos . " WHERE id=" . $id;
        $conexion = new Bd();

        $conexion->consulta($sql);
    }
}
