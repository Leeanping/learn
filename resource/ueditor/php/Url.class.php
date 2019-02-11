<?php
class Url
{
	public static function getBasedoc()
	{
		$baseUrl = dirname(__FILE__);
		$baseUrl = str_replace("\\", "/", $baseUrl);
		$baseUrl = substr($baseUrl, 0, -20);
		return $baseUrl;
	}
	
	public static function getBasepath()
	{
		if(!empty($_SERVER['REQUEST_URI']))
    		$scriptName = $_SERVER['REQUEST_URI'];
    	else
    		$scriptName = $_SERVER['PHP_SELF'];

    	$basepath = preg_replace("#\/resource(.*)$#i", '', $scriptName);
		return $basepath . '/';
	}
}
?>