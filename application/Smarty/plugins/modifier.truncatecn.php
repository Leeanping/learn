<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_truncatecn($string, $len=0, $etc='')
{
    $str = $string;
	if ($len == 0) {
		return $str;
	}
	$len *= 2;
	if (strlen ($str) <= $len) {
		return $str;
	}

	for ($i = 0; $i < $len; $i++)
	{
		$temp_str = substr ($str, 0, 1);
		if (ord ($temp_str) > 127) {
			$i++;
			if ($i < $len) {
				$new_str[] = substr ($str, 0, 3);
				$str = substr ($str, 3);
			}
		} else {
			$new_str[] = substr ($str, 0, 1);
			$str = substr ($str, 1);
		}
	}

	$result = join ($new_str);
	$result .= ( strlen ($result) == strlen ($string) ? '' : $etc);
	return $result;
}

/* vim: set expandtab: */

?>
