<?php
/**
 * run文件
 * @author Lee
 */
!defined('ROOT') && exit('Forbidden');
if (PHP_VERSION < '7.0') {
    die("PHP 7.0 or greater is required!!!");
}
define('CACHEDIR',ROOT . 'cache/');

define('VERSION', '2.0.0');
define('APPLICATION_PATH',INCLUDE_PATH . 'Controller/');
define('PLUGIN_PATH',INCLUDE_PATH . 'Plugin/');
define('TEMPLATE_PATH',ROOT . 'view/');
define('CONFIG_PATH',ROOT . 'config/');
define('BASEROOT', $_SERVER['DOCUMENT_ROOT']); //网站根目录不包含扩展目录

/* 上传文件归属 */
define('BELONG_ARTICLE',     1);
define('BELONG_CATEGORY',    2);
define('BELONG_FORUM',       3);
define('BELONG_AD',          4);
define('BELONG_FACTORY',     5);

/*文件后缀*/
define('FILE_LOG',    '.log');

date_default_timezone_set('Asia/Shanghai');
set_include_path(INCLUDE_PATH . PATH_SEPARATOR . get_include_path());
ini_set('magic_quotes_runtime', 0);
require_once(INCLUDE_PATH . 'loader.php');
if(function_exists('spl_autoload_register')) {
	spl_autoload_register(array('Loader', 'autoload'));
} else {
	function __autoload($class) {
		return Loader::autoload($class);
	}
}
Loader::_loadfile('function.php');
define('SITEURL', \Core\Fun::getPathroot());
define('CURTIME', \Core\Fun::time());
$rundebug = \Core\Config::get('rundebug','basic',false);
if ($rundebug)
{
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	//error_reporting(2047);
}
else
{
	error_reporting(0);
}
//other env set

//使用原始数据，入库需要转义！
if (get_magic_quotes_gpc()) {
	//trips
	$_GET = \Core\Fun::stripslashes($_GET);
	$_POST = \Core\Fun::stripslashes($_POST);
	$_COOKIE = \Core\Fun::stripslashes($_COOKIE);
	$_REQUEST = \Core\Fun::stripslashes($_REQUEST);
}

//全局session_start
\Core\Fun::session_start();
//bug fix Ea or Apc session_write
register_shutdown_function('session_write_close');
//兼容 json_encode / json_decode
if( !function_exists('json_encode') )
{
    function json_encode($data) {
        $json = new Services_JSON();
        return( $json->encode($data) );
    }
}

if( !function_exists('json_decode') )
{
	function json_decode($data , $assoc = false) {
		$use = 0;
		if($assoc)
		{
			//SERVICES_JSON_LOOSE_TYPE	返回关联数组
			$use = 0x10;
		}
        $json = new Services_JSON($use);
        return( $json->decode($data) );
    }
}

$front = \Core\Controller\Front::getInstance();
$front->setApplicationPath(APPLICATION_PATH);
//注册运行的Model
$front->registerModels(array('admin','index','api','wap','swfupload'));

try{
	$front->dispatch();
}
catch (Exception $e)
{
    \Core\Error\Display::show($e);
}
