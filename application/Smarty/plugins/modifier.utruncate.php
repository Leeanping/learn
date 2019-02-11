<?php
function smarty_modifier_utruncate($string, $len=0, $etc='...')
{
	$str = preg_replace("/<sty(.*)\\/style>|<scr(.*)\\/script>|<!--(.*)-->/isU","",$string);
	$alltext = "";
	$start = 1;
	for($i=0;$i<strlen($str);$i++)
	{
		if($start==0 && $str[$i]==">")
		{
			$start = 1;
		}
		else if($start==1)
		{
			if($str[$i]=="<")
			{
				$start = 0;
				$alltext .= " ";
			}
			else if(ord($str[$i])>31)
			{
				$alltext .= $str[$i];
			}
		}
	}
	$alltext = str_replace("　"," ",$alltext);
	$alltext = preg_replace("/&([^;&]*)(;|&)/","",$alltext);
	$alltext = preg_replace("/[ ]+/s"," ",$alltext);
    $str = $alltext;
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
?>