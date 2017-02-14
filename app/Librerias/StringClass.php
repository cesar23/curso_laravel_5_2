<?php

namespace App\Librerias;

class StringClass {

    public function StringClass() {

    }


public function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
{
    $source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;
}
    public function getExtensionArchivo($archivo) {

        $extension = strtolower(substr(strrchr($archivo, "."), 1));
        return $extension;
    }

    public function getNombreArchivo($archivo, $separador = '.') {
        $pos = strrpos($archivo, $separador);
        if ($pos === false) {
            return $archivo;
        }
        return substr($archivo, 0, $pos + 1);
    }

    public function letras_cesar_html($letra) {


//$letra_bien=array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&ntilde;","N&ordm;");
        $letra_mal = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "Nº", "Nº", "N°", "¿", "ñ", "º", "°");


        $letra_bien = array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "N&ordm;", "N&ordm;", "N&ordm;", "&iquest;", "&ntilde;", "&ordm;", "&ordm;");

        $letra = str_replace($letra_mal, $letra_bien, $letra);

        return $letra;
    }


   public function Mayusculas ($str) {
       $LATIN1_UC_CHARS="ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝ";
       $LATIN1_LC_CHARS="àáâãäåæçèéêëìíîïðñòóôõöøùúûüý";


       $str = strtoupper(strtr($str, $LATIN1_LC_CHARS, $LATIN1_UC_CHARS));
       return strtr($str, array("ß" => "SS"));
   }
///tipo oracion
  public function Oracion ($str) {

    return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");

}


//-funcion que añade un array con una llave
/*
EJEMPLO:
 $arrayFuente=array("uno" => "11","dos" => "22");
 $arrayPush=array("uno" => "one");
 $result=PaginadorGet($arrayFuente,$arrayPush); 
  [------ resultado array("uno" => "one","dos" => "22"); ----]
  y lo convierte despues en 
  uno=11&dos=22

 */
public function PaginadorGet($arrayFuente,$arrayPush){
    if (!isset($arrayFuente)) {
        return http_build_query($arrayPush);
    }

     //recorrer la fuente de array
     foreach ($arrayFuente as $key => $value) {
         //recorrer la array a borrar
        foreach ($arrayPush as $keyRemp=> $valueRemp) {
            if ($key==$keyRemp) {
             unset($arrayFuente[$key]);
             //$salida[$key]=$valueRemp;
        }
    }

 }
//añadimos los arrays
 $salida=array_merge($arrayFuente,  $arrayPush); //tipo array_push pero con key
  $salida=http_build_query($salida); //uno=11&dos=22
 return $salida;
 }

/*
EJEMPLO:
 $arrayFuente=array("uno" => "11","dos" => "22");
 $arrayPush=array("uno" => "one");
 $result=addArray($arrayFuente,$arrayPush); 
  [------ resultado array("uno" => "one","dos" => "22"); ----]

 */
 public function addArrayKey($arrayFuente,$arrayPush){
    if (!isset($arrayFuente)) {
        return http_build_query($arrayPush);
    }

     //recorrer la fuente de array
     foreach ($arrayFuente as $key => $value) {
         //recorrer la array a borrar
        foreach ($arrayPush as $keyRemp=> $valueRemp) {
            if ($key==$keyRemp) {
             unset($arrayFuente[$key]);
             //$salida[$key]=$valueRemp;
        }
    }

 }
//añadimos los arrays
 $salida=array_merge($arrayFuente,  $arrayPush); //tipo array_push pero con key

 return $salida;
 }


    static function limpiarCadenaInputCorto($document){

        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
        );

        $text = preg_replace($search, '', $document);
        // $text=str_replace("'","´",$text);
        $text=str_replace("'","",$text);
        $text = preg_replace("/\r*\n/","\\n",$text);
        $text = preg_replace("/\//","\\\/",$text);
        $text = preg_replace("/\"/","\\\"",$text);
        $text = preg_replace("/'/"," ",$text);
        //$text=addcslashes($text,"\0..\37!@\@\177..\377");

        //$text = htmlspecialchars($text);


        /* $text = str_replace(
             array("#","$","%","&","'","(",")","*","+","?","[","]","^","_","`","{","|","}","~","Δ","€","‚","ƒ","…","†","‡",
                 "ˆ","‰","Š","‹","Œ","Ž","'","'","•","–","—","˜","™","š","›","œ","ž","Ÿ","¡","¢","£","¤","¥","¦","§","¨","©",
                 "ª","«","¬","®","¯","°","±","²","³","´","µ","¶","·","¸","¹","º","»","¼","½","¾","¿","À","Â","Ã","Ä","Å",
                 "Æ","Ç","È","Ê","Ì","Î","Ï","Ð","Ò","Ô","Õ","Ö","×","Ø","Ù","Ú","Û","Ü","Ý","Þ","ß","à","â","ã","ä","å","æ",
                 "ç","è","ê","ë","ì","î","ï","ð","ñ","ò","ô","õ","ö","÷","ø","ù","û","ü","þ","ÿ"),
             '', $text);*/

        $text = str_replace(
            array("#","$","%","&","'","(",")","*","+","?","[","]","^","`","{","|","}","~","Δ","€","ƒ","…","†","‡",
                "ˆ","‰","Š","‹","Œ","Ž","'","'","•","˜","™","š","›","œ","ž","Ÿ","¡","¢","£","¤","¥","¦","§","¨","©",
                "ª","«","¬","®","¯","°","±","²","³","´","µ","¶","·","¸","¹","º","»","¼","½","¾","¿","À","Â","Ã","Ä","Å",
                "Æ","Ç","È","Ê","Ì","Î","Ï","Ð","Ò","Ô","Õ","Ö","×","Ø","Ù","Ú","Û","Ü","Ý","Þ","ß","à","â","ã","ä","å","æ",
                "ç","è","ê","ë","ì","î","ï","ð","ò","ô","õ","ö","÷","ø","ù","û","ü","þ","ÿ"),
            '', $text);


        return $text;
    }

    function limpiarCadenaInput($document){

        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
        );

        $text = preg_replace($search, '', $document);
       // $text=str_replace("'","´",$text);
        $text=str_replace("'","",$text);
        $text = preg_replace("/\r*\n/","\\n",$text);
        $text = preg_replace("/\//","\\\/",$text);
        $text = preg_replace("/\"/","\\\"",$text);
        $text = preg_replace("/'/"," ",$text);
        //$text=addcslashes($text,"\0..\37!@\@\177..\377");

        //$text = htmlspecialchars($text);


       /* $text = str_replace(
            array("#","$","%","&","'","(",")","*","+","?","[","]","^","_","`","{","|","}","~","Δ","€","‚","ƒ","…","†","‡",
                "ˆ","‰","Š","‹","Œ","Ž","'","'","•","–","—","˜","™","š","›","œ","ž","Ÿ","¡","¢","£","¤","¥","¦","§","¨","©",
                "ª","«","¬","®","¯","°","±","²","³","´","µ","¶","·","¸","¹","º","»","¼","½","¾","¿","À","Â","Ã","Ä","Å",
                "Æ","Ç","È","Ê","Ì","Î","Ï","Ð","Ò","Ô","Õ","Ö","×","Ø","Ù","Ú","Û","Ü","Ý","Þ","ß","à","â","ã","ä","å","æ",
                "ç","è","ê","ë","ì","î","ï","ð","ñ","ò","ô","õ","ö","÷","ø","ù","û","ü","þ","ÿ"),
            '', $text);*/

        $text = str_replace(
            array("#","$","%","&","'","(",")","*","+","?","[","]","^","`","{","|","}","~","Δ","€","ƒ","…","†","‡",
                "ˆ","‰","Š","‹","Œ","Ž","'","'","•","˜","™","š","›","œ","ž","Ÿ","¡","¢","£","¤","¥","¦","§","¨","©",
                "ª","«","¬","®","¯","°","±","²","³","´","µ","¶","·","¸","¹","º","»","¼","½","¾","¿","À","Â","Ã","Ä","Å",
                "Æ","Ç","È","Ê","Ì","Î","Ï","Ð","Ò","Ô","Õ","Ö","×","Ø","Ù","Ú","Û","Ü","Ý","Þ","ß","à","â","ã","ä","å","æ",
                "ç","è","ê","ë","ì","î","ï","ð","ò","ô","õ","ö","÷","ø","ù","û","ü","þ","ÿ"),
            '', $text);


        return $text;
    }


    function mysql_escape_mimic($inp) {
        if(is_array($inp))
            return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
        }

        return $inp;
    }
    function limpiarCadenaInput2($document){

        $search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
        );

        $text = preg_replace($search, '', $document);
        $text=str_replace("'","´",$text);
        $text = preg_replace("/\r*\n/","\\n",$text);
        $text = preg_replace("/\//","\\\/",$text);
        $text = preg_replace("/\"/","\\\"",$text);
        $text = preg_replace("/'/"," ",$text);
        //$text=addcslashes($text,"\0..\37!@\@\177..\377");

        $text = htmlspecialchars($text);
        $text = preg_replace("/=/", "=\"\"", $text);
        $text = preg_replace("/&quot;/", "&quot;\"", $text);
        $tags = "/&lt;(\/|)(\w*)(\ |)(\w*)([\\\=]*)(?|(\")\"&quot;\"|)(?|(.*)?&quot;(\")|)([\ ]?)(\/|)&gt;/i";
        $replacement = "<$1$2$3$4$5$6$7$8$9$10>";
        $text = preg_replace($tags, $replacement, $text);
        $text = preg_replace("/=\"\"/", "=", $text);

        //"+",
        $text = str_replace(
            array("\\","|", "\"",
                "/",
                "^",
                ">", "<"),
            '', $text);

        $text = str_replace(
            array("#","$","%","&","'","(",")","*","+","?","[","]","^","_","`","{","|","}","~","Δ","€","‚","ƒ","…","†","‡",
                "ˆ","‰","Š","‹","Œ","Ž","'","'","•","–","—","˜","™","š","›","œ","ž","Ÿ","¡","¢","£","¤","¥","¦","§","¨","©",
                "ª","«","¬","®","¯","°","±","²","³","´","µ","¶","·","¸","¹","º","»","¼","½","¾","¿","À","Â","Ã","Ä","Å",
                "Æ","Ç","È","Ê","Ì","Î","Ï","Ð","Ò","Ô","Õ","Ö","×","Ø","Ù","Ú","Û","Ü","Ý","Þ","ß","à","â","ã","ä","å","æ",
                "ç","è","ê","ë","ì","î","ï","ð","ñ","ò","ô","õ","ö","÷","ø","ù","û","ü","þ","ÿ"),
            '', $text);

        return $text;
    }

    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }


}
