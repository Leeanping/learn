<?php
namespace Tag;
/*
 * 模型标签
 * @author Lee
 * @site http://www.vpcv.com
 */
class Module
{
	public function getList($params)
	{
		$arr = M('base_module')->select();
		return $arr;
	}
}
?>