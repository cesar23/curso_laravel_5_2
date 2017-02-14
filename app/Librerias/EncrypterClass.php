<?php
namespace App\Librerias;
class EncrypterClass {

    private static $Key = "Hlatino";
 
    public static function encrypt ($input) {
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(EncrypterClass::$Key), $input, MCRYPT_MODE_CBC, md5(md5(EncrypterClass::$Key))));
        return $output;
    }
 
    public static function decrypt ($input) {
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(EncrypterClass::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(EncrypterClass::$Key))), "\0");
        return $output;
    }
 
}