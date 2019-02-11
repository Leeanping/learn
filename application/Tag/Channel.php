<?php
namespace Tag;
/*
 * 导航标签
 * @author Lee
 * @site http://www.vpcv.com
 */
class Channel
{
	public function getList($params)
	{
		$wapOn = \Core\Config::get('wap_on', 'wap', true);
		$parentid = isset($params['parentid']) ? $params['parentid'] : 0;
		$channel = isset($params['channel']) ? $params['channel'] : 'main';
		$type = isset($params['type']) ? $params['type'] : 0;
		if($channel == 'all')
		{
			$type = false;
		}
		elseif($channel == 'footer')
		{
			$type = 2;
		}
		elseif($channel == 'top')
		{
			$type = 1;
		}
		elseif($type == 'main')
		{
			$type = 0;
		}
		else
		{
			return;
		}
		$useable = !isset($params['useable']) ? true : ($params['useable'] == 1 ? true : false);
		if(preg_match('/,/', $parentid))
		{
			$navlist = M('nav')->queryAll(array(array('id', $parentid, 'IN')));
		}
		else
		{
			$navlist = M('nav')->getNavList($type, $parentid, $useable);
		}
		
		$key = 1;
		foreach($navlist AS $idx => $nav)
		{
			if(preg_match('/^http/', $nav['pinyin']))
			{
				$navlist[$idx]['url'] = $nav['pinyin'];
			}
			else
			{
				if(\Core\Comm\Validator::isMobile() && $wapOn)
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