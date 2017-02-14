<?php

namespace App\Librerias;

class MiUrlClass {

    public static function SelftUrl() {


        return "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }

    public function current_url($modulo = null,$controller=null,$action=null,$parametro=null) {

        if ($parametro) {
            return "http://" . $_SERVER['SERVER_NAME'] ."/".$modulo."/".$controller."/".$action."/".$parametro;
        }
        if($action){
             return "http://" . $_SERVER['SERVER_NAME'] ."/".$modulo."/".$controller."/".$action;
        }
         if($controller){
             return "http://" . $_SERVER['SERVER_NAME'] ."/".$modulo."/".$controller;
        }
        if($modulo){
             return "http://" . $_SERVER['SERVER_NAME'] ."/".$modulo;
        }
        return "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }

   public function isXmlHttpRequest()
{
    //if (isXmlHttpRequest()) {  true }

    $header = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
    return ($header === 'XMLHttpRequest');
}

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
/*
 mostrarRespuesta(convertirJson($respuesta));
  mostrarRespuesta(convertirJson(devolverError(10)), 404);
 */
}
