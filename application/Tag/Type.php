<?php
namespace Tag;
/*
 * 单个栏目标签
 * @author Lee
 * @site http://www.vpcv.com
 */
class Type
{
	public function getList($params)
	{
		$catid = isset($params['catid']) ? $params['catid'] : 0;
		if(!$catid) return;
		$navlist = M('nav')->where('id', $catid)->select();
		
		$key = 1;
		foreach($navlist AS $idx => $nav)
		{
			if(preg_match('/^http/', $nav['pinyin']))
			{
				$navlist[$idx]['url'] = $nav['pinyin'];
			}
			else
			{
				if(\Core\Comm\Validator::isMobile())
				{
					$navlist[$idx]['url'] = \Core\Fun::getPathroot() . 'wap/article/' . $nav['pinyin'];
				}
				else
				{
					$navlist[$idx]['url'] = \Core\Fun::getPathroot() . 'article/' . $nav['pinyin'];
				}
			}
			$navlist[$idx]['key'] = $key;
			$key ++;
		}
		return $navlist;
	}
}
?>