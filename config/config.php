<?php
// esto se carga automaticamente sin ser llamado -- en laravel 
// ya que laravel carga todos los php que estan en la carpeta config
//----------------------------------------------------------------
//date_default_timezone_set('America/Lima');
//mb_internal_encoding('UTF-8');
//mb_http_output('UTF-8');
//mb_http_input('UTF-8');
//mb_language('uni');
//mb_regex_encoding('UTF-8');
//modo de apliacion Importante
//---------------------SEGURIDAD------------
@define("APP_DIR", $_SERVER['DOCUMENT_ROOT'].'/'); //C:/xampp/htdocs/zf/public/
//echo APP_DIR;exit;
//define("APP_FDR", "test/");
define("APP_SESSION_DB", true); //para almacenar la session en la DB
define("APP_SYSTEM_VERSION", '2.0.2');
define("APP_SYSTEM_NAME", 'SOLUCIONESSYSTEM.COM');
define("APP_FDR", "");

@define("BASE_URL_PORT", ":8000");
@define("URL_DOMAIN", "http://" . $_SERVER['SERVER_NAME'].BASE_URL_PORT);
@define("BASE_URL", "http://" . $_SERVER['SERVER_NAME'].BASE_URL_PORT."/". APP_FDR);
@define("APP_LOGOUT", "http://" . $_SERVER['SERVER_NAME'].BASE_URL_PORT);
//---------------------SEGURIDAD------------
define('ENVIRONMENT','development'); //production O development
define('DISPLAY_EXCEPTIONS_APP',false); //muestra las exceptiones zf2
define('ERROR_404_PERSONALIZADO',false); //muestra las exceptiones zf2
define('ERROR_500_PERSONALIZADO',false); //muestra las exceptiones zf2
