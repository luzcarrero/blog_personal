
<?php
 
 // Motrar todos los errores de PHP
 error_reporting(-1);
  
 // No mostrar los errores de PHP
 error_reporting(0);
  
 // Motrar todos los errores de PHP
 error_reporting(E_ALL);
  
 // Motrar todos los errores de PHP
 ini_set('error_reporting', E_ALL);
  
 function lanzaError($msg){
  
     echo "<script>alert('".$msg."')</script>";
  
 }
  
 function ver($elem){
  
     echo "<pre>";
     print_r($elem);
     echo "</pre>";
  
 }
  
 function verCabeceras(){
  
     echo "El Post:<br><pre>";
     print_r($_POST);
     echo "</pre>--------";
     echo "El Get:<br><pre>";
     print_r($_GET);
     echo "</pre>--------";
     echo "El Files:<br><pre>";
     print_r($_FILES);
     echo "</pre>--------";
     echo "</pre>--------";
     echo "El SESSION:<br><pre>";
     print_r($_SESSION);
     echo "</pre>--------";
 }
  
  
  
  
 function subirArchivo($archivo,$directorio,$pesoMax = 10000000){
  
     $ruta = "";
     $tipo = $archivo['type'];
     $tamano = $archivo['size'];
  
     $nombreArchivo = limpiar_caracteres_especiales($archivo['name']);
     $nombreArchivo = cortarCadenaFinal($nombreArchivo, ".");
  
     if(strpos($tipo, 'pdf') ||  strpos($tipo, 'doc' || strpos($tipo, 'odt')) && $tamano < $pesoMax ){
  
  
         $idUnico = time();
  
         if(strpos($tipo, 'pdf')){
             $extension = '.pdf';
         }else if(strpos($tipo, 'odt')) {
             $extension = '.odt';
         }else{
             $extension = '.doc';
         }
  
  
         $nombre_fichero = $directorio.$nombreArchivo.$extension;
  
  
         if (file_exists($directorio.$nombreArchivo.".pdf") || file_exists($directorio.$nombreArchivo.".doc") || file_exists($directorio.$nombreArchivo.".odt")) {
             $nombre_fichero = $directorio.$nombreArchivo.$idUnico.$extension;
         }
         if(move_uploaded_file($archivo['tmp_name'],"".$nombre_fichero)){
  
             $ruta = $nombre_fichero;
             lanzaError($ruta);
         }else{
  
             echo "<script>alert('Error al subir el archivo al servidor')</script>";
             $ruta = false;
         }
     }else{
  
         echo "<script>alert('Solo se acptan documentos PDF o DOC')</script>";
         $ruta = false;
  
     }
  
     return $ruta;
 }
  
 function subirFoto($archivo,$directorio,$pesoMax = 5000000){
     $ruta = "";
     $tipo = $archivo['type'];
     $tamano = $archivo['size'];
 
     $nombreArchivo = limpiar_caracteres_especiales($archivo['name']);
     $nombreArchivo = cortarCadenaFinal($nombreArchivo, ".");
  
     if((strpos($tipo, 'jpeg') ||  strpos($tipo, 'png')) && $tamano < $pesoMax ){
         $idUnico = time();
  
         if(strpos($tipo, 'jpeg')){
             $extension = '.jpg';
         }else{
             $extension = '.png';
         }
         $nombre_fichero = $directorio.$nombreArchivo.$extension;
         if (file_exists($directorio.$nombreArchivo.".jpg") || file_exists($directorio.$nombreArchivo.".png") ) {
             $nombre_fichero = $directorio.$nombreArchivo.$idUnico.$extension;
         }
         if(move_uploaded_file($archivo['tmp_name'],$nombre_fichero)){
             if($extension == '.png'){
                 png_a_jpg($nombre_fichero);
                 unlink($nombre_fichero);
                 $nombre_fichero=str_replace(".png", ".jpg", $nombre_fichero);
             }
             $ruta = $nombre_fichero;
  
  
         }else{
  
             echo "<script>alert('Error al subir el archivo al servidor')</script>";
             $ruta = false;
         }
     }else{
  
         echo "<script>alert('La foto debe tener una extensión del tipo: jpg o png')</script>";
         $ruta = false;
  
     }
  
  
  
     return $ruta;
 }
  
 function png_a_jpg($archivo) {
     if ( is_file($archivo) )
     {
         $imagen = imagecreatefrompng($archivo);
         $archivo=str_replace(".png", ".jpg", $archivo);
         imagejpeg($imagen,$archivo,100);
     }
  
 }
  
  
 function limpiar_caracteres_especiales($archivo) {
     $archivo = str_replace("[áàâãªä@]", "a", $archivo);
     $archivo = str_replace("[ÁÀÂÃÄ]", "A", $archivo);
     $archivo = str_replace("[éèêë]", "e", $archivo);
     $archivo = str_replace("[ÉÈÊË]", "E", $archivo);
     $archivo = str_replace("[íìîï]", "i", $archivo);
     $archivo = str_replace("[ÍÌÎÏ]", "I", $archivo);
     $archivo = str_replace("[óòôõºö]", "o", $archivo);
     $archivo = str_replace("[ÓÒÔÕÖ]", "O", $archivo);
     $archivo = str_replace("[úùûü]", "u", $archivo);
     $archivo = str_replace("[ÚÙÛÜ]", "U", $archivo);
     $archivo = str_replace("[¿?\]", "_", $archivo);
     $archivo = str_replace(" ", "_", $archivo);
     $archivo = str_replace("ñ", "n", $archivo);
     $archivo = str_replace("Ñ", "N", $archivo);
 //para ampliar los caracteres a reemplazar agregar lineas de este tipo:
 //$archivo = str_replace("caracter-que-queremos-cambiar","caracter-por-el-cual-lo-vamos-a-cambiar",$archivo);
     return $archivo;
 }
  
  
 function cortarCadenaPrincipio($cadena, $caracter){
  
 // localicamos en que posición se haya la $subcadena, en nuestro caso la posicion es "7"
     $posicionsubcadena = strpos ($cadena, $caracter);
 // eliminamos los caracteres desde $subcadena hacia la izq, y le sumamos 1 para borrar tambien el @ en este caso
     $nombre = substr ($cadena, ($posicionsubcadena+1));
     return $nombre;
  
 }
  
 function cortarCadenaFinal($cadena, $caracter){
  
 // localicamos en que posición se haya la $subcadena, en nuestro caso la posicion es "7"
     $posicionsubcadena = strrpos ($cadena, $caracter);
 // eliminamos los caracteres desde $subcadena hacia la izq, y le sumamos 1 para borrar tambien el @ en este caso
     $nombre = substr ($cadena, 0, ($posicionsubcadena));
     return $nombre;
  
 }
  
  
  
 function borrarFoto($id, $tabla, $campo) {
  
     $sql = "select " . $campo . " from " . $tabla . " WHERE id = '" . $id . "'";
     $conexion = new Bd();
     $res = $conexion->consultaSimple($sql);
     if ($conexion->numeroElementos() > 0) {
         $foto = $res[$campo];
         if (strlen($foto) > 4) {
  
             if (!unlink("../".$foto))
                 echo "<script>alert('error al borrar archivo antiguo, avise al administrador')</script>";
         }
     }
 }