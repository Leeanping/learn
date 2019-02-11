<?php
/*
 * $string 需要操作的字符
 * $func 需要操作的函数
 */
function smarty_modifier_helper($string, $func){
	return \Core\Helper::$func($string);
}
?>