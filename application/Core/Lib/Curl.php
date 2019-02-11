<?php
namespace Core\Lib;
/*
 *
 * 获取数据curl
 */
class Curl
{
	public static function getLngLatByIP($ip)
	{
		$params = array(
    		'ak' => '737720929c391b8772e74f8e8d7c216e',
    		'ip' => $ip,
    		'coor' => 'bd09ll'//百度地图GPS坐标
  		);
		$url = 'http://api.map.baidu.com/location/ip';
		$resp = self::makeRequest($url, $params, '', 'get');
		$result = json_decode($resp['msg'], true);
		return array(
    		'address' => $result['content']['address'],
    		'province' => $result['content']['address_detail']['province'],
    		'city' => $result['content']['address_detail']['city'],
    		'district' => $result['content']['address_detail']['district'],
    		'street' => $result['content']['address_detail']['street'],
    		'street_number' => $result['content']['address_detail']['street_number'],
    		'city_code' => $result['content']['address_detail']['city_code'],
    		'lng' => $result['content']['point']['x'],
    		'lat' => $result['content']['point']['y']
  		);
	}
	
	public static function makeRequest($url, $params, $cookie, $method='post', $protocol='http')
	{   
		$query_string = self::makeQueryString($params);
		$cookie_string = self::makeCookieString($cookie);
				
		$ch = curl_init();
	
		if ('GET' == strtoupper($method))
		{
			curl_setopt($ch, CURLOPT_URL, "$url?$query_string");
		}
		else 
		{
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
		}
		curl_setopt($ch, CURLOPT_REFERER, '百度地图referer');
  		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0 like Mac OS X; en-us) AppleWebKit/537.51.1 (KHTML, like Gecko) Version/7.0 Mobile/11A465 Safari/9537.53');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
	
		// disable 100-continue
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
	
		if (!empty($cookie_string))
		{
			curl_setopt($ch, CURLOPT_COOKIE, $cookie_string);
		}
		
		if ('https' == $protocol)
		{
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}
	
		$ret = curl_exec($ch);
		$err = curl_error($ch);
		
		if (false === $ret || !empty($err))
		{
			$errno = curl_errno($ch);
			$info = curl_getinfo($ch);
			curl_close($ch);
	
			return array(
				'result' => false,
				'errno' => $errno,
				'msg' => $err,
				'info' => $info,
			);
		}
		
		curl_close($ch);
	
		return array(
			'result' => true,
			'msg' => $ret,
		);
				
	}
	
	private static function makeQueryString($params)
	{
		if (is_string($params))
			return $params;
			
		$query_string = array();
	    foreach ($params as $key => $value)
	    {   
	        array_push($query_string, rawurlencode($key) . '=' . rawurlencode($value));
	    }   
	    $query_string = join('&', $query_string);
	    return $query_string;
	}

	private static function makeCookieString($params)
	{
		if (is_string($params))
			return $params;
			
		$cookie_string = array();
	    foreach ($params as $key => $value)
	    {   
	        array_push($cookie_string, $key . '=' . $value);
	    }   
	    $cookie_string = join('; ', $cookie_string);
	    return $cookie_string;
	}
}
?>