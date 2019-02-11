<?php
namespace Core\Outapi;
/*
 * QQ connect
 *
 */
class Qc
{
	private static $appid;
	private static $appkey;
	private static $callback_url;
	private static $access_token = NULL;
	const SCOPE = 'get_user_info,add_share'; //授权方法
    
    public static function setCallback($callback_url)
	{
		self::$callback_url = $callback_url;
	}
	
	public static function setToken($access_token)
	{
		self::$access_token = $access_token;
	}
	
	public static function setAppid()
	{
		$appid = C('qqappid', 'third', '');
		self::$appid = $appid;
	}
	
	public static function setAppkey()
	{
		$appkey = C('qqappkey', 'third', '');
		self::$appkey = $appkey;
	}
	
    //返回登陆地址.
	public static function LoginUrl(){
		$params=array(
			'client_id'=>self::$appid,
			'redirect_uri'=>self::$callback_url,
			'response_type'=>'code',
			'scope'=>self::SCOPE
		);
		return 'https://graph.qq.com/oauth2.0/authorize?'.http_build_query($params);
	}

	public static function AccessToken($code){
		$params=array(
			'grant_type'=>'authorization_code',
			'client_id'=>self::$appid,
			'client_secret'=>self::$appkey,
			'code'=>$code,
			'state'=>'',
			'redirect_uri'=>self::$callback_url
		);
		$url='https://graph.qq.com/oauth2.0/token?'.http_build_query($params);
		$result_str=self::http($url);
		
		$json_r=array();
		if($result_str!='')parse_str($result_str, $json_r);
		
		return $json_r['access_token'];
	}

	/**
	function access_token_refresh($refresh_token){
	}
	**/

	public static function GetOpenid($token){
		$params=array(
			'access_token'=>$token
		);
		$url='https://graph.qq.com/oauth2.0/me?'.http_build_query($params);
		$result_str=self::http($url);
		
		$json_r=array();
		if($result_str!=''){
			preg_match('/callback\(\s+(.*?)\s+\)/i', $result_str, $result_a);
			$json_r=json_decode($result_a[1], true);
		}
		
		return $json_r['openid'];
	}

	public static function GetUserInfo($openid,$token){
		$params=array(
			'oauth_consumer_key'=>self::$appid,
			'access_token'=>$token,
			'openid'=>$openid,
			'format'=>'json'
		);
		$url='https://graph.qq.com/user/get_user_info';
		return self::api($url, $params);
	}

	public static function api($url, $params, $method='GET'){
		
		if($method=='GET'){
			$result_str=self::http($url.'?'.http_build_query($params));
		}else{
			$result_str=self::http($url, http_build_query($params), 'POST');
		}
		$result=array();
		if($result_str!='')$result=json_decode($result_str, true);
		return $result;
	}

	public static function http($url, $postfields='', $method='GET', $headers=array()){
		$ci=curl_init();
		curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ci, CURLOPT_TIMEOUT, 30);
		if($method=='POST'){
			curl_setopt($ci, CURLOPT_POST, TRUE);
			if($postfields!='')curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
		}
		
		curl_setopt($ci, CURLOPT_URL, $url);
		$response=curl_exec($ci);
		curl_close($ci);
		return $response;
	}
}
?>