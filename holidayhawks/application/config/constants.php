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

define('TITLE', 'Holidayhawks');

define('CSS_PATH', 'css/');
define('JS_PATH', 'js/');
define('IMG_PATH', 'images/');
define('TOOLS_PATH', 'assets/tools/');
define('TEMPLATE_PATH', 'assets/template/');

define('ADMIN_LATEST', 'assets_admin_latest/');

define('CSS_PATH_ADMIN_LATEST', 'assets_admin_latest/css/');
define('JS_PATH_ADMIN_LATEST', 'assets_admin_latest/js/');
define('IMG_PATH_ADMIN_LATEST', 'assets_admin_latest/img/');
define('TOOL_PATH_ADMIN_LATEST', 'assets_admin_latest/tools/');
define('TEMPLATE_PATH_ADMIN_LATEST', 'assets_admin_latest/template/');

define('CSS_PATH_ADMIN', 'assets_admin/');
define('JS_PATH_ADMIN', 'assets_admin/');
define('IMG_PATH_ADMIN', 'assets_admin/');
define('TOOL_PATH_ADMIN', 'assets_admin/');
define('TEMPLATE_PATH_ADMIN', 'assets_admin/');

define('CSS_PATH_NEW', 'assets_new/css/');
define('JS_PATH_NEW', 'assets_new/js/');
define('IMG_PATH_NEW', 'assets_new/img/');
define('TOOL_PATH_NEW', 'assets_new/tools/');
define('TEMPLATE_PATH_NEW', 'assets_new/template/');
/* End of file constants.php */
/* Location: ./application/config/constants.php */