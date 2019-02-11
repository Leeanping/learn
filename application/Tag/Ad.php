<?php
namespace Tag;

class Ad
{
	public function getList($params)
	{
		$arr = M('ad')->getAdList($params['tagname'], $params['num'], $params['typeid']);
		return $arr;
	}
}
?>