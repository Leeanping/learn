<?php
/**
 * 入口文件
 * @author Snake.L
 */
$d = dirname(__FILE__);
define('ROOT', $d == '' ? '/' : $d . '/');
define('INCLUDE_PATH', ROOT . 'application/');
define('HTDOCS_ROOT', ROOT);
require(INCLUDE_PATH . 'run.php');
?>