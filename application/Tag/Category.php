<?php
namespace Tag;
/*
 * 类别标签
 * @author Lee
 * @site http://www.vpcv.com
 */
class Category
{
	public function getList($params){
		$catid = isset($params['catid']) ? $params['catid'] : 0;
		$itemid = isset($params['itemid']) ? $params['itemid'] : 1;
		$num = isset($params['num']) ? $params['num'] : 0;
		$field = isset($params['field']) ? $params['field'] : '*';
		$where = "useable = '1' and pid = '$catid'";
		if($itemid){
			$where .= " and itemid = '$itemid'";
		}

		if($num){
			$categories = M('base_category')->field($field)->where($where)->limit(0, $num)->select();
		}else{
			$categories = M('base_category')->field($field)->where($where)->select();
		}
		$key = 1;
		foreach($categories as $idx => $cat){
			$categories[$idx]['key'] = $key;
			$key++;
		}

		return $categories;
	}
}
?>