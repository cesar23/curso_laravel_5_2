<?php

namespace App\Librerias;

use DateTime;
use DateTimeZone;

class FechaClass {

    private $timeZone;
    private $date;
    private $dateH;

    public function FechaClass() {
        
    }

    public function FechaHoy() {
        $timezone = new DateTimeZone('America/Lima');
        $fecha = new DateTime();
        $fecha->setTimezone($timezone);


        /* $timeZone = new DateTimeZone('America/Lima');

          $date = new DateTime();
          $date->setTimezone($timeZone);
          //echo $date->format('Y-m-d');
          echo "<br>";
          echo $date->format('h:i:s');
          echo "<br>";
          echo date('l jS \of F Y h:i:s A');
          exit; */

        return $fecha->format('Y-m-d');
        //return "cesar";
    }
    
    
        public function FechaEspIngles($fech="2014/02/02") {
        $timezone = new DateTimeZone('America/Lima');
        $fecha = new DateTime($fech);
        


        return $fecha->format('Y-m-d');
        //return "cesar";
    }
    
    
     function fecha_Ingles_A_Espanol($mydate,$parametro="-") {

        list($yy, $mm, $dd) = explode($parametro, $mydate);
       
        return $dd."/".$mm."/".$yy;
    }
    

    

    public function HoraHoy() {
        $timezone = new DateTimeZone('America/Lima');
        $fecha = new DateTime();
        $fecha->setTimezone($timezone);


        /* $timeZone = new DateTimeZone('America/Lima');

          $date = new DateTime();
          $date->setTimezone($timeZone);
          //echo $date->format('Y-m-d');
          echo "<br>";
          echo $date->format('h:i:s');
          echo "<br>";
          echo date('l jS \of F Y h:i:s A');
          exit; */

        return $fecha->format('h:i:s');
        //return "cesar";
    }

    public function FechaHoraHoy() {
        $timezone = new DateTimeZone('America/Lima');
        $fecha = new DateTime();
        $fecha->setTimezone($timezone);


        /* $timeZone = new DateTimeZone('America/Lima');

          $date = new DateTime();
          $date->setTimezone($timeZone);
          //echo $date->format('Y-m-d');
          echo "<br>";
          echo $date->format('h:i:s');
          echo "<br>";
          echo date('l jS \of F Y h:i:s A');
          exit; */

        return $fecha->format('Y-m-d H:i:s');
        //return "cesar";
    }

    public function FechaHoyArray() {
        $timezone = new DateTimeZone('America/Lima');
        $fecha = new DateTime();
        $fecha->setTimezone($timezone);


        /* $timeZone = new DateTimeZone('America/Lima');

          $date = new DateTime();
          $date->setTimezone($timeZone);
          //echo $date->format('Y-m-d');
          echo "<br>";
          echo $date->format('h:i:s');
          echo "<br>";
          echo date('l jS \of F Y h:i:s A');
          exit; */

        $fecha_hoy = $fecha->format('Y-m-d');
        $hora = $fecha->format('h:i:s');
        $dianumero = $fecha->format('z');
        $ano = date("Y");
        
        return array("fecha" => $fecha_hoy,
            "ano" => $ano,
            "dianumero" => $dianumero,
            "hora" => $hora,
             "ip" => $this->GetIPAvance(),
        );
    }

    function aumentarMinutos($minutos = 15) {
        $timezone = new DateTimeZone('America/Lima');
        $DataTimeActual = new DateTime();
        $DataTimeActual->setTimezone($timezone);


//Tiempo en la que entro a la Url     
        $tiempo_entrada = $DataTimeActual->format('Y-m-d H:i:s');




//Definimos el tiempo en que caducara
        //$nuevafecha = strtotime('+13 minute', strtotime($tiempo_entrada));
        $nuevafecha = strtotime('+' . $minutos . ' minute', strtotime($tiempo_entrada));
        $nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
        $DataTimefechaNew = new DateTime($nuevafecha);
        $tiempo_caducidad = $DataTimefechaNew->format('Y-m-d H:i:s');
        return $tiempo_caducidad;
    }
    
    
     public function GetIPAvance() {
        $ip = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARTDED_FOR'] != '') {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
         return $ip;
    }
    

    function aumentarFechaHoras() {
        $timezone = new DateTimeZone('America/Lima');
        $DataTimefecha = new DateTime();
        $DataTimefecha->setTimezone($timezone);


        $fecha = $DataTimefecha->format('Y-m-d H:i:s');



        echo "Fecha Padre:" . $fecha . " - Hora strtotime(UNIX):" . strtotime($fecha) . "<p>";


        echo "<b>Sumandole una Hora al padre</b>:";
        $nuevafecha = strtotime('+1 hour', strtotime($fecha));
        $nuevafecha = date('Y-m-d H:i:s', $nuevafecha);

        $DataTimefecha = new DateTime($nuevafecha);
        $nuevafecha = $DataTimefecha->format('Y-m-d H:i:s');
        echo $nuevafecha . " - Hora strtotime(UNIX):" . strtotime($nuevafecha) . "<br>";


        echo "<b>Sumandole una 13 minutos al padre</b>:";
        $nuevafecha = strtotime('+13 minute', strtotime($fecha));
        $nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
        $DataTimefecha = new DateTime($nuevafecha);
        $nuevafecha = $DataTimefecha->format('Y-m-d H:i:s');
        echo $nuevafecha . " - Hora strtotime(UNIX):" . strtotime($nuevafecha) . "<br>";

        echo "<b>Sumandole una 30 segundos al padre</b>:";
        $nuevafecha = strtotime('+30 second', strtotime($fecha));
        $nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
        $DataTimefecha = new DateTime($nuevafecha);
        $nuevafecha = $DataTimefecha->format('Y-m-d H:i:s');
        echo $nuevafecha . " - Hora strtotime(UNIX):" . strtotime($nuevafecha) . "<br>";
    }

}
