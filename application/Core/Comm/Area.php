<?php
namespace Core\Comm;
/**
 * 成都地区编码表
 * @param 
 * @return
 * @author Snake
 */
class Area
{
	public static $areaConfig;
	public static $atmosphereConfig;
	public static $siteConfig;
	
	public static function getLngLat($address)
	{
		$url = 'http://restapi.amap.com/v3/geocode/geo?key=a05e7a39632b39aad6bc2d9aa227fc61&output=json&address=' . $address . '&city=010';
		$result = file_get_contents($url);
		$json = json_decode($result, true);
		$location = $json['geocodes'][0]['location'];
		$local = explode(',', $location);
		return array('lng' => $local[0], 'lat' => $local[1]);
	}
}
\Core\Comm\Area::$areaConfig = array(array('id' => 1, 'name' => '青羊区'), array('id' => 2, 'name' => '锦江区'), array('id' => 3, 'name' => '金牛区'), array('id' => 4, 'name' => '武侯区'), array('id' => 5, 'name' => '成华区'), array('id' => 6, 'name' => '龙泉驿区'), array('id' => 7, 'name' => '青白江区'), array('id' => 8, 'name' => '高新区'), array('id' => 9, 'name' => '新都区'), array('id' => 10, 'name' => '温江区'), array('id' => 11, 'name' => '其他'));
\Core\Comm\Area::$atmosphereConfig = array(array('id' => 1, 'name' => '情侣约会'), array('id' => 2, 'name' => '商务宴请'), array('id' => 3, 'name' => '朋友聚餐'), array('id' => 4, 'name' => '休闲时光'), array('id' => 5, 'name' => '能刷卡'), array('id' => 6, 'name' => '能上网'), array('id' => 7, 'name' => '有无烟区'), array('id' => 8, 'name' => '送外卖'), array('id' => 9, 'name' => '老字号'));
?>