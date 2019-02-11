<?php
namespace Tag;
/*
 * 相册标签
 * @author Lee
 * @site http://www.vpcv.com
 */
class Gallery
{
	public function getList($params)
	{
		$num = isset($params['num']) ? $params['num'] : 6;
		$limit = isset($params['limit']) ? $params['limit'] : 0;
		$itemid = isset($params['itemid']) ? $params['itemid'] : 0; //内容id
		$belong = isset($params['belong']) ? $params['belong'] : BELONG_ARTICLE; //所属
		$orderby = isset($params['orderby']) ? $params['orderby'] : 'addtime DESC';
		$where = '1=1';
		if($itemid)
		{
			$where .= " and itemid = '$itemid'";
		}
		if($belong)
		{
			$where .= " and belong = '$belong'";
		}
		$galleries = M('gallery')->where($where)->order($orderby)->limit($limit, $num)->select();
		$key = 1;
		foreach($galleries AS $idx => $gallery)
		{
			$galleries[$idx]['key'] = $key;
			$key++;
		}
		return $galleries;
	}
}
?>