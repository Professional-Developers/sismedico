<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

//define('HOST_NAME', '192.168.1.38');
//define('HOST_NAME', 'localhost');
//define('HOST_NAME', 'vasoleche.medconsultt.com');
define('PROJECT', 'Sistema Medico');
//define('HOST_NAME', 'localhost:81/siscom');
//define('HOST_NAME', '10.10.16.47:8080/sismedico');
define('HOST_NAME', 'localhost:81/sismedico');

/*define('PROJECT', 'Sistema Comercial');
define('HOST_NAME', 'www.dluanas.com/siscom');*/
//define('FOLDER', 'vasoleche');
define('URL_MAIN', 'http://'.HOST_NAME.'/'); 
define('URL_MAIN_LOGO', 'http://'.HOST_NAME.'/uploads/logoEmpresa'); 

define('URL_MAIN_PRODUCTOS', 'http://'.HOST_NAME.'/uploads/productos'); 

define('URL_DASHBOARD', 'http://'.HOST_NAME.'/principal/'); 
define('URL_CSS', 'http://'.HOST_NAME.'/css/');
define('URL_JS', 'http://'.HOST_NAME.'/js/');
define('URL_IMG', 'http://'.HOST_NAME.'/images/');


define('URL_PLU', 'http://'.HOST_NAME.'/plugins/');

define('URL_PLU_INSPINIA', 'http://'.HOST_NAME.'/plugins/Inspinia/');
define('URL_PLU_CSS', 'http://'.HOST_NAME.'/plugins/Inspinia/css/');
define('URL_PLU_JS', 'http://'.HOST_NAME.'/plugins/Inspinia/js/');
define('URL_PLU_IMAGES', 'http://'.HOST_NAME.'/plugins/Inspinia/images/');
define('URL_PLU_IMG', 'http://'.HOST_NAME.'/plugins/Inspinia/img/');

define('URL_IMG_LOGO', 'http://'.HOST_NAME.'/images/logo/');
define('URL_JS_AD', 'http://'.HOST_NAME.'/jsAdicional/');
define('URL_CSS_AD', 'http://'.HOST_NAME.'/css/admin/');
// define('URL_CSS_LOGIN', 'http://'.HOST_NAME.'/'.FOLDER.'/css/login/');
// define('URL_IMG_AD', 'http://'.HOST_NAME.'/'.FOLDER.'/img/admin/'); 

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */