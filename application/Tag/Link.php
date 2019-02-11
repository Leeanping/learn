<?php
namespace Tag;
/*
 * 友情链接标签
 * @author Lee
 * @site http://www.vpcv.com
 */
class Link
{
	public function getList($params)
	{
		$arr = M('link')->getLinks();
		return $arr;
	}
}
?>