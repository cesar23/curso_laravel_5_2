<?php
namespace App\Librerias;
class FicheroClass
{

    public function tamano_archivo($peso, $decimales = 2)
    {
        $clase = array(" Bytes", " KB", " MB", " GB", " TB");
        return round($peso / pow(1024, ($i = floor(log($peso, 1024)))), $decimales) . $clase[$i];
    }


//pasar la ruta de un archio y mostrar  que peso tiene en bytes
    public function tamano_archivo_bytes($ruta_archivo, $decimales = 2)
    {

        $ruta_archivo = realpath($ruta_archivo);
        $peso_archivo = filesize($ruta_archivo);
        return $peso_archivo;
    }

//pasar la ruta de un archio y mostrar  que peso tiene en bytes
    public function tamano_bytes_a_Letras($peso, $decimales = 2)
    {
        $clase = array(" Bytes", " KB", " MB", " GB", " TB");
        return round($peso / pow(1024, ($i = floor(log($peso, 1024)))), $decimales) . $clase[$i];
    }

//pasar la ruta de un archio y mostrar  que peso tiene en bytes Amigables
    public function tamano_archivoAmigable($ruta_archivo, $decimales = 2)
    {

        $ruta_archivo = realpath($ruta_archivo);
        $peso_archivo = filesize($ruta_archivo);

        $clase = array(" Bytes", " KB", " MB", " GB", " TB");
        return round($peso_archivo / pow(1024, ($i = floor(log($peso_archivo, 1024)))), $decimales) . $clase[$i];
    }


//pasar la ruta de un archio y mostrar  que peso tiene en bytes
    public function tamano_bytes_carpeta($dir)
    {
        if (is_dir($dir)) {

            if ($gd = opendir($dir)) {

                $cont = 0;
                while (($archivo = readdir($gd)) !== false) {

                    if ($archivo != "." && $archivo != "..") {

                        if (is_dir($archivo)) {
                            $cont += tamano_bytes_carpeta($dir . "/" . $archivo);
                        } else {
                            $cont += filesize($dir . "/" . $archivo);
                            // echo  "archivo : " . $dir."/".$archivo . "&nbsp;&nbsp;" . filesize($dir."/".$archivo)."<br />";
                        }
                    }

                }

                closedir($gd);

            }
        }
        return $cont;
    }


    public function deleteDirectorioAll($directory, $empty = false)
    {
        if (substr($directory, -1) == "/") {
            $directory = substr($directory, 0, -1);
        }

        if (!file_exists($directory) || !is_dir($directory)) {
            return false;
        } elseif (!is_readable($directory)) {
            return false;
        } else {
            $directoryHandle = opendir($directory);

            while ($contents = readdir($directoryHandle)) {
                if ($contents != '.' && $contents != '..') {
                    $path = $directory . "/" . $contents;

                    if (is_dir($path)) {
                        deleteDirectorioAll($path);
                    } else {
                        unlink($path);
                    }
                }
            }

            closedir($directoryHandle);

            if ($empty == false) {
                if (!rmdir($directory)) {
                    return false;
                }
            }

            return true;
        }
    }


//----------leer Fichero
    public function leerArchivo($ruta_archivo)
    {
        $linea = '';
        $fp = fopen($ruta_archivo, "r");

        while (!feof($fp)) {
            //$linea .= fgets($fp) . PHP_EOL;
            $linea .= fgets($fp);
            //echo $linea . PHP_EOL;
        }
        fclose($fp);
        return $linea;
    }

    public function guardarArchivo($ruta_archivo, $contenido)
    {
        $linea = '';
        $modi = fopen($ruta_archivo, 'w+');

        if ($yeah = fwrite($modi, $contenido)) {
            return true;
        } else {
            return false;
        }
    }

    public function validarExtensionImagen($FILE_NAME,$FILE_TYPE)
    {
        // Primero, hay que validar que se trata de un JPG/GIF/PNG
        $allowedExts = array("jpg", "jpeg", "gif", "png","bmp", "JPG", "GIF", "PNG");

        //$extension = explode(".", $_FILES["foto"]["name"]);
        $extension = explode(".", $FILE_NAME);
        $extension = strtolower(array_pop($extension));
        /*
        if ((($_FILES["foto"]["type"] == "image/gif")
            || ($_FILES["foto"]["type"] == "image/jpeg")
            || ($_FILES["foto"]["type"] == "image/png")
            || ($_FILES["foto"]["type"] == "image/pjpeg"))
       */

        if ((($FILE_TYPE == "image/gif")
                || ($FILE_TYPE == "image/jpeg")
                || ($FILE_TYPE == "image/bmp")
                || ($FILE_TYPE == "image/png")
                || ($FILE_TYPE == "image/pjpeg"))
            && in_array($extension, $allowedExts)
        ) {
            return true;

        }
        return false;
    }


}
