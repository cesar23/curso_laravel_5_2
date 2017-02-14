<?php
namespace App\Librerias;
class UrlTitleSeoClass {

    public  function CombertirUrlTitle($str, $separator = 'dash', $lowercase = FALSE) {
        $str = trim($str);

        $str = strtr($str, $array = array("À" => "A", "Á" => "A", "Â" => "A", "Ã" => "A", "Ä" => "A", "Å" => "A", "à" => "a", "á" => "a", "â" => "a", "ã" => "a", "ä" => "a", "å" => "a", "Ò" => "O", "Ó" => "O", "Ô" => "O", "Õ" => "O", "Ö" => "O", "Ø" => "O", "ò" => "o", "ó" => "o", "ô" => "o", "õ" => "o", "ö" => "o", "ø" => "o", "È" => "E", "É" => "E", "Ê" => "E", "Ë" => "E", "è" => "e", "é" => "e", "ê" => "e", "ë" => "e", "Ç" => "C", "ç" => "c", "Ì" => "I", "Í" => "I", "Î" => "I", "Ï" => "I", "ì" => "i", "í" => "i", "î" => "i", "ï" => "i", "Ù" => "U", "Ú" => "U", "Û" => "U", "Ü" => "U", "ù" => "u", "ú" => "u", "û" => "u", "ü" => "u", "ÿ" => "y", "Ñ" => "N", "ñ" => "n", "." => ""));
        if ($separator == 'dash') {
            $search = '_';
            $replace = '-';
        } else {
            $search = '-';
            $replace = '_';
        }

        $trans = array(
            '&\#\d+?;' => '',
            '&\S+?;' => '',
            '\s+' => $replace,
            '[^a-z0-9\-\._]' => '',
            $replace . '+' => $replace,
            $replace . '$' => $replace,
            '^' . $replace => $replace,
            '\.+$' => ''
            );

        $str = strip_tags($str);

        foreach ($trans as $key => $val) {
            $str = preg_replace("#" . $key . "#i", $val, $str);
        }

        if ($lowercase === TRUE) {
            $str = strtolower($str);
        }
        return trim(stripslashes($str));
    }


    public function nombreImagenURL($name_img){
// Produce: You should eat pizza, beer, and ice cream every day
 // Convertir acentos y tildes
        $search = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú', 'Ü', 'ü', 'Ñ', 'ñ', '_');
        $replace = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'u', 'u', 'n', 'n', ' ');
        $name_img = str_replace($search, $replace, strtolower(trim($name_img)));



    //quitar las extensiones
        $busq = array(".jpg", ".JPG", ".gif",".GIF",".png",".PNG");
        $reemp   = array("","","","","","");
        $name_img = str_replace($busq, $reemp, $name_img);

/*
En esa funcion, como es para URLs amigables, conservo los espacios para reemplazarlos por guiones, entonces, en la expresion:

Elimina \s que corresponde a los espacios
Agrega: \- (guion medio, necesita estar escapado) y _ (guion bajo)

*/
$result = preg_replace("/[^a-zA-Z0-9\-_]/", "", $name_img);
//ahora  si el texto i es muy lago
$result=$this->setLimpiarString($result);

return $result;
}

//Paar url amigables
public function sef_UrlSeo($str) {
    // Eliminar entidades HTML
    $search = array('&lt;', '&gt;', '&quot;', '&amp;');
    $str = str_replace($search, '', $str);
    $str = preg_replace('/&(?!#[0-9]+;)/s', '', $str);

    // Convertir acentos y tildes
    $search = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú', 'Ü', 'ü', 'Ñ', 'ñ', '_');
    $replace = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'u', 'u', 'n', 'n', ' ');
    $str = str_replace($search, $replace, strtolower(trim($str)));

    // Eliminar todo lo que no sea letras, numeros o espacios y eliminar espacios dobles
    $str = preg_replace("/[^a-zA-Z0-9\s]/", "", $str);
    $str = preg_replace('/\s\s+/', ' ', $str);

    // Convertir espacios en guiones
    $str = str_replace(' ', '-', $str);
    return $str;
}


//---------- elimina las palabras largas sirev para los contenidos en las noticias
public function getSubString($string, $length=NULL)
{
    //Si no se especifica la longitud por defecto es 50
    if ($length == NULL)
        $length = 50;
    //Primero eliminamos las etiquetas html y luego cortamos el string
    $stringDisplay = substr(strip_tags($string), 0, $length);
    //Si el texto es mayor que la longitud se agrega puntos suspensivos
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= ' ...';
    return $stringDisplay;
}
//---------- elimina las palabras largas sirev para los contenidos en las noticias
public function setLimpiarString($string, $length=20)
{

    //Primero eliminamos las etiquetas html y luego cortamos el string
    $stringDisplay = trim(strip_tags($string));
    //Si el texto es mayor que la longitud se agrega puntos suspensivos
    if (strlen($stringDisplay) > $length){
        $stringDisplay = substr($stringDisplay, 0, $length);
    }
    
    return $stringDisplay;
    
    
}

 public function getExtension($ruta_archivo) {
      $info = pathinfo($ruta_archivo);
      $extension = strtolower($info['extension']);
      return $extension;
    }

}
