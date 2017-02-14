<?php
namespace App\Librerias;

class RestClass {

  

  public function RestClass() {

  }

   public function limpiarEntrada($data) {  
   $entrada = array();  
   if (is_array($data)) {  
     foreach ($data as $key => $value) {  
       $entrada[$key] = $this->limpiarEntrada($value);  
     }  
   } else {  
     if (get_magic_quotes_gpc()) {  
         //Quitamos las barras de un string con comillas escapadas  
         //Aunque actualmente se desaconseja su uso, muchos servidores tienen activada la extensión magic_quotes_gpc.   
         //Cuando esta extensión está activada, PHP añade automáticamente caracteres de escape (\) delante de las comillas que se escriban en un campo de formulario.   
       $data = trim(stripslashes($data));  
     }  
       //eliminamos etiquetas html y php  
     $data = strip_tags($data);  
       //Conviertimos todos los caracteres aplicables a entidades HTML  
     $data = htmlentities($data);  
     $entrada = trim($data);  
   }  
   return $entrada;  
 } 

  public function isXmlHttpRequest()
  {
    $header = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
    return ($header === 'XMLHttpRequest');
  }


///REST
  public function convertirJson($data) {  
   return json_encode($data);  
 } 

public function mostrarRespuesta($data, $estado=200) {
   $status = array(  
     200 => 'OK',  
     201 => 'Created',  
     202 => 'Accepted',  
     204 => 'No Content',  
     301 => 'Moved Permanently',  
     302 => 'Found',  
     303 => 'See Other',  
     304 => 'Not Modified',  
     400 => 'Bad Request',  
     401 => 'Unauthorized',  
     403 => 'Forbidden',  
     404 => 'Not Found',  
     405 => 'Method Not Allowed',  
     500 => 'Internal Server Error');  
   $respuesta = ($status[$estado]) ? $status[$estado] : $status[500]; 

   header("HTTP/1.1 " . $estado. " " . $respuesta);  
   header("Content-Type:application/json;charset=utf-8");   

   echo $data;  
   exit;  
 }

  public function devolverError($id) {  
   $errores = array(  
     array('estado' => "error", "msg" => "petición no encontrada"),  
     array('estado' => "error", "msg" => "petición no aceptada"),  
     array('estado' => "error", "msg" => "petición sin contenido"),  
     array('estado' => "error", "msg" => "email o password incorrectos"),  
     array('estado' => "error", "msg" => "error borrando usuario"),  
     array('estado' => "error", "msg" => "error actualizando nombre de usuario"),  
     array('estado' => "error", "msg" => "error buscando usuario por email"),  
     array('estado' => "error", "msg" => "error creando usuario"),  
     array('estado' => "error", "msg" => "usuario ya existe"),
     array('estado' => "error", "msg" => "no se pudo crear el registro"),
     array('estado' => "error", "msg" => "no se pudo actualizar el registro"),
     array('estado' => "error", "msg" => "no se pudo eliminar el registro"),
     array('estado' => "error", "msg" => "verificar el metoto de entradad GET,POST,PUT,DELETE")  
     );  
   return $errores[$id];  
 }  


      }

/*
---------USO -----

*****************OK***********
 $respuesta['estado'] = 'correcto';  
   $respuesta['data']= "Se Envio mail";
  mostrarRespuesta(convertirJson($respuesta));

  *************** Error***********
  $respuesta['estado'] = 'failed';  
  $respuesta['data']= "Ocurrio un error intentalo mas tarde"; 
  mostrarRespuesta(convertirJson(devolverError(10)), 404);



 */