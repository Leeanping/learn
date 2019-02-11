<?php
namespace Tag;
class Region
{
	public function getList($params)
	{
		$pid = isset($params['pid']) ? $params['pid'] : 52;
		$arr = M('region')->getRegionList($pid);
		$idx = 1;
		foreach($arr AS $key => $value)
		{
			$arr[$key]['idx'] = $idx;
			$idx++;
		}

		return $arr;
	}
}
?>