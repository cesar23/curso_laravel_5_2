<?php

namespace App\Librerias;


class IpClass {

    private $timeZone;
    private $date;
    private $dateH;

    public static function IpClass() {
         $ip = $_SERVER['REMOTE_ADDR'];
       return $ip;
    }

    public function GetIP() {
        $ip = $_SERVER['REMOTE_ADDR'];
       return $ip;
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

}
