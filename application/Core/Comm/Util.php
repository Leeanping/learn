<?php
namespace Core\Comm;
/**
 * 工具类(业务无关)
 * @param 
 * @return
 * @author luckyxiang, echoyang
 */
class Util
{

    /**
     * 字符串转关联数组
     * @param $str
     * @param $s
     * @param $g
     * @return unknown_type
     */
    static public function str2map ($str, $s='&', $g='=')
    {
        $map = array ();
        $arr = explode ($s, $str);
        foreach ($arr as $var)
        {
            $pos = strpos ($var, $g);
            if ($pos == false) { //0 or false
                continue;
            }
            $key = substr ($var, 0, $pos);
            $value = substr ($var, $pos + strlen ($g));
            $map[$key] = $value;
        }
        return $map;
    }

    /**
     * 关联数组转字符串
     * @param $map
     * @param $s
     * @param $g
     * @return string
     */
    static public function map2str ($map, $s='&', $g='=')
    {
        //var_dump($map);
        $str = "";
        foreach ($map as $key => $value)
        {
            if (!empty ($str)) {
                $str .= $s;
            }
            $str .= $key . $g . urlencode ($value);
        }
        return $str;
    }

    static public function trailUrl ($input_url='')
    {
        $url_parsed = parse_url ($input_url);
        return $url_parsed["scheme"] . "://" . $url_parsed["host"] . $url_parsed["path"];
    }

    /**
     * 数组转换为字符串
     * @param type $array
     * @param type $s
     * @return type
     */
    static public function array2string ($array, $sep=",", $out="'",$escape=true)
    {
        if (!empty ($array)) {
            $r = '';
            foreach ($array as $value)
            {
                if($escape)
                {
                    $r .= $out . \Core\Db::sqlescape($value) . $out . $sep;
                }else{
                    $r .= $out . $value . $out . $sep;
                }
            }
            if ($out) {
                return substr ($r, 0, -strlen ($out));
            } else {
                return $r;
            }
        } else {
            return '';
        }
    }

    /**
     * 302跳转
     * @param $url
     * @return unknown_type
     */
    static public function location ($url, $return=false)
    {
        $url = str_replace (array ("%0d%0a", "%0d", "%0a"), "", $url);
        $url = str_replace (array ("%0D%0A", "%0D", "%0A"), "", $url);
        header ("Location: {$url}");
        if ($return) {
            return;
        } else {
            exit ();
        }
    }

    /**
     * 获取二进制文件类型
     * @param $bin	二进制文件的前两个字节
     * @return string
     */
    public static function getFileType ($bin)
    {
        $strInfo = @unpack ("C2chars", $bin);

        $typeCode = intval ($strInfo['chars1'] . $strInfo['chars2']);

        $fileType = 'unknown';
        switch ($typeCode)
        {
            case 7790:
                $fileType = 'exe';
                break;
            case 7784:
                $fileType = 'midi';
                break;
            case 8297:
                $fileType = 'rar';
                break;
            case 255216:
                $fileType = 'jpg';
                break;
            case 7173:
                $fileType = 'gif';
                break;
            case 6677:
                $fileType = 'bmp';
                break;
            case 13780:
                $fileType = 'png';
                break;
            default:
                $fileType = 'unknown';
        }
        return $fileType;
    }

    /**
     * 获取用户访问ip
     * @return unknown_type
     */
    public static function getClientIp ()
    {
        $clientIp = "";
        if (isset ($_SERVER)) 
		{
            if (isset ($_SERVER["HTTP_X_FORWARDED_FOR"]) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) 
			{
				foreach ($matches[0] AS $xip) 
				{
					if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) 
					{
						$clientIp = $xip;
						break;
					}
				}
                $clientIp = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } 
			elseif (isset ($_SERVER["HTTP_CLIENT_IP"]) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) 
			{
                $clientIp = $_SERVER["HTTP_CLIENT_IP"];
            } 
			else 
			{
                $clientIp = $_SERVER["REMOTE_ADDR"];
            }
        }
		else
		{
			if (getenv('HTTP_X_FORWARDED_FOR'))
			{
				$clientIp = getenv('HTTP_X_FORWARDED_FOR');
			}
			elseif (getenv('HTTP_CLIENT_IP'))
			{
				$clientIp = getenv('HTTP_CLIENT_IP');
			}
			else
			{
				$clientIp = getenv('REMOTE_ADDR');
			}
		}
        return $clientIp;
    }
	
    /**
     * trim 不支持字符串，这里实现了字符串
     * @param string $str 源字符串
     * @param string $sub 要去掉的字符串
     * @return string
     */
    public static function trim ($str, $sub)
    {
        $len = strlen ($str);
        $sublen = strlen ($sub);
        $start = 0;
        while ($start + $sublen < $len && substr ($str, $start, $sublen) == $sub)
        {
            $start += $sublen;
        }
        $end = $len;
        while ($end - $sublen >= $start && substr ($str, $end - $sublen, $sublen) == $sub)
        {
            $end -= $sublen;
        }
        return substr ($str, $start, $end - $start);
    }

    /**
     * 定宽截取utf-8字符串
     * @param $string
     * @param $len		字节宽度
     * @return string
     */
    public static function widthUtfSubstr ($string, $len = 0)
    {
        $str = $string;
        if ($len == 0) {
            return $str;
        }

        if (strlen ($str) <= $len) {
            return $str;
        }

        for ($i = 0; $i < $len; $i++)
        {
            $temp_str = substr ($str, 0, 1);
            if (ord ($temp_str) > 127) {
                if (++$i < $len) {
                    $new_str[] = substr ($str, 0, 3);
                    $str = substr ($str, 3);
                }
            } else {
                $new_str[] = substr ($str, 0, 1);
                $str = substr ($str, 1);
            }
        }

        $result = join ($new_str);
        return $result;
    }

    /**
     * 中文截字方法 utf-8
     * @param string $content
     * @param number $length 
     * @param string $add
     */
    public static function utfSubstr ($string, $len=0, $etc='')
    {
        $str = $string;
        if ($len == 0) {
            return $str;
        }
        $len *= 2;
        if (strlen ($str) <= $len) {
            return $str;
        }

        for ($i = 0; $i < $len; $i++)
        {
            $temp_str = substr ($str, 0, 1);
            if (ord ($temp_str) > 127) {
                $i++;
                if ($i < $len) {
                    $new_str[] = substr ($str, 0, 3);
                    $str = substr ($str, 3);
                }
            } else {
                $new_str[] = substr ($str, 0, 1);
                $str = substr ($str, 1);
            }
        }

        $result = join ($new_str);
        $result .= ( strlen ($result) == strlen ($string) ? '' : $etc);
        return $result;
    }
	
	public static function Html2text($string)
	{
		$str = preg_replace("/<sty(.*)\\/style>|<scr(.*)\\/script>|<!--(.*)-->/isU","",$string);
		$alltext = "";
		$start = 1;
		for($i=0;$i<strlen($str);$i++)
		{
			if($start==0 && $str[$i]==">")
			{
				$start = 1;
			}
			else if($start==1)
			{
				if($str[$i]=="<")
				{
					$start = 0;
					$alltext .= " ";
				}
				else if(ord($str[$i])>31)
				{
					$alltext .= $str[$i];
				}
			}
		}
		$alltext = str_replace("　"," ",$alltext);
		$alltext = preg_replace("/&([^;&]*)(;|&)/","",$alltext);
		$alltext = preg_replace("/[ ]+/s"," ",$alltext);
		return $alltext;
	}
	
    /**
     * 获得文件夹下子文件夹列表
     *
     * @param string $path
     * @return array
     * @author lvfeng
     */
    public static function getFolderList ($path)
    {
        $folderList = array ();
        if (is_dir ($path)) {
            $dp = dir ($path);
            while ($file = $dp->read ())
                if (is_dir ($path . $file) && $file{0} != '.')
                    $folderList[] = $file;
            $dp->close ();
        }
        return $folderList;
    }
	
	/*
     * 取得所在地str
     *
     * @param string $nationIndex
     * @param string $provinceIndex
     * @return array
     */
    public static function getLocation($provinceIndex = '', $cityIndex = '', $districtIndex = '', $roadIndex = '')
    {
        $location = '';
        isset($provinceIndex) && $location = M('region')->getRegionName($provinceIndex) . ' ';
        isset($cityIndex) && $location .= M('region')->getRegionName($cityIndex);
        isset($districtIndex) && $location .= ' ' . M('region')->getRegionName($districtIndex);
		isset($roadIndex) && $location .= ' ' . M('region')->getRegionName($roadIndex);
        
        return $location;
    }    
    
    /**
     * @获取用户相对缓存路径
     * @param $uname 单个用户名用户
     * @param $relCahceDir 相对地址
     * @author echoyang
     * @time 2011/5/13
     */

    public static function getUserCachePath($uid,$relCahceDir)
    {
        if(empty($uid)) throw new \Core\Exception('没有用户错误');
        if(empty($relCahceDir)) throw new \Core\Exception('没有缓存地址');
        $userCacheFile = $userDir = '';

        $md5NameStr = md5($uid);
        $tDirMd5 = substr($md5NameStr, -2); //加uid的md5值倒数第1~2位做1级文件夹
        $userDir = $relCahceDir . $tDirMd5 . '/';

        $tDirMd5 = substr($md5NameStr, -4, 2); //加uid的md5值倒数第3~4位做2级文件夹
        $userDir .= $tDirMd5 . '/';

        $tDirMd5 = substr($md5NameStr, -6, 2); //加uid的md5值倒数第5~6位做3级文件夹
        $userDir .= $tDirMd5 . '/';

        $userCacheFile = $userDir . $uid . '.php';  //缓存文件

        return $userCacheFile;
    }
    
    /**
     * 分析用户名
     * @param $uname ：array|string
     * @param array
     * @author echoyang
     * @time 2011/5/13
     */    
    
    public static function formatName2Array($uids)
    {
        if(empty($uids) && isset($_SESSION['uid']))
        {
            return array($_SESSION['uid']);//为空是获取自己消息
        }
        if(!is_array($uids) && $uids)
        {
            if(strpos($uids,',')===false)
            {
                $uids = array($uids);
            }else{
               $uids = explode(',', $uids);
            }
        }
        if(is_array($uids))
        {
            $uids = array_filter($uids);
            $uids = array_unique($uids);
        }
        return $uids;
    }
    
    /**
     * 数组key变小写
     * @param $uname ：array|string
     * @param array
     * @author echoyang
     * @time 2011/5/13
     */    
    
    public static function arrayKey2Lower($arr)
    {
        $tarr = array();
        if(is_array($arr))
        {
            foreach($arr AS $k => $v)
            {
                $skey = strtolower($k);
                $tarr[$skey] = $v;
                unset($arr[$k]);
            }
        }
        return $tarr;
        
    }    
    
	public static function getHour($hour = '')
	{
		$str = '';
		for($i = 0; $i < 24; $i++)
		{
			$idx = $i < 10 ? '0' . $i : $i;
			$sel = $hour == $idx ? ' selected="selected"' : ($idx == '09' ? ' selected="selected"' : '');
			$str .= '<option value="' . $idx . '"' . $sel . '>' . $idx . '</option>';
		}
		return $str;
	} 
	
	public static function getMinute($minute = '')
	{
		$str = '';
		for($i = 0; $i < 60; $i++)
		{
			$idx = $i < 10 ? '0' . $i : $i;
			$sel = $minute == $idx ? ' selected="selected"' : ($idx == '30' ? ' selected="selected"' : '');
			$str .= '<option value="' . $idx . '"' . $sel . '>' . $idx . '</option>';
		}
		return $str;
	} 
	
	public static function getWeek($week)
	{
		$weekArr = array(
			'1' => '星期一',
			'2' => '星期二',
			'3' => '星期三',
			'4' => '星期四',
			'5' => '星期五',
			'6' => '星期六',
			'0' => '星期日',
		);
		return $weekArr[$week];
	}
	
	public static function getAttch($content)
	{
		$rule = "/(src)=[\"|'| ]{0,}([^>]*\.(gif|jpg|bmp|png))/isU";
		if(preg_match($rule, $content, $array))
		{
			$array = str_replace(array("\\\"", '"'),array("", ""), $array[2]);
			if(stristr($array, "http://"))
			{
				$attach = self::httpDownPic($array);
			}
			else
			{
				$attach = $array;
			}
		}
		else
		{
			$attach = '';
		}
		return $attach;
	}
	
	public static function getAttchList($content)
	{
		$rule = "/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i";
		if(preg_match_all($rule, $content, $array))
		{
			$array = str_replace(array("\\\"", '"'),array("", ""), $array[1]);
			$attach = $array;
		}
		else
		{
			$attach = '';
		}

		return $attach;
	}
	
	public static function httpDownPic($link)
	{
		$htd = new \Core\Fun\Httpdown();//实例化
		$htd->OpenUrl($link);
		$sparr = array("image peg", "image/jpeg", "image/gif", "image/png", "image/xpng", "image/wbmp");
		if(!in_array($htd->GetHead("content-type"),$sparr))
		{
			return '';
		}
		else
		{
			$date = 'uploadfile/attach/day_' . \Core\Fun::date("Ymd");
			$name = \Core\Fun::date("YmdHis") . mt_rand(1000,9999);
			$url = HTDOCS_ROOT . $date;
			$imgUrl = $url . '/' . $name;
			
			//创建路径
			if(!file_exists($url))
			{
				\Core\Fun\File::makeDir($url);
				fclose(fopen($url . '/index.htm', 'w'));
			}
			
			$itype = $htd->GetHead("content-type");
			if($itype=="image/gif")
			{
				$itype = '.gif';
			}
			else if($itype=="image/png")
			{
				$itype = '.png';
			}
			else if($itype=="image/wbmp")
			{
				$itype = '.bmp';
			}
			else
			{
				$itype = '.jpg';
			}
			$fileurl = $imgUrl . $itype;
			$ok = $htd->SaveToBin($fileurl);
			return $attach = \Core\Fun::getWebroot() . $date . "/" . $name . $itype;
		}
	}
	
	public static function xmlToArray($xml, $root = true) {
		if (!$xml->children()) {
			return (string)$xml;
		}
	
		$array = array();
		foreach ($xml->children() as $element => $node) {
			$totalElement = count($xml->{$element});
			
			if (!isset($array[$element])) {
				$array[$element] = "";
			}
	
			// Has attributes
			if ($attributes = $node->attributes()) {
				$data = array(
					'attributes' => array(),
					'value' => (count($node) > 0) ? self::xmlToArray($node, false) : (string)$node
				);
	
				foreach ($attributes as $attr => $value) {
					$data['attributes'][$attr] = (string)$value;
				}
	
				if ($totalElement > 1) {
					$array[$element][] = $data;
				} else {
					$array[$element] = $data;
				}
	
			// Just a value
			} else {
				if ($totalElement > 1) {
					$array[$element][] = self::xmlToArray($node, false);
				} else {
					$array[$element] = self::xmlToArray($node, false);
				}
			}
		}
	
		if ($root) {
			return array($xml->getName() => $array);
		} else {
			return $array;
		}
	}
	
	public static function getDomin()
	{
		return array('eat', 'tour');
	}
	
	public static function getHostname()
	{
		$host = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');
		$host = ($host == 'localhost' || $host == '127.0.0.1') ? 'www' : $host;
		$hostArr = explode('.', $host);
		return $hostArr[0];
	}
	
	public static function userCredits($type)
	{
		$credits = array(
			'user_login' => array('name' => '用户登录', 'credit' => 10),
			'user_face' => array('name' => '用户上传头像', 'credit' => 50),
			'user_profile' => array('name' => '用户完善资料', 'credit' => 50),
			'user_mark' => array('name' => '用户签到', 'credit' => 5),
			'user_feed' => array('name' => '用户评论', 'credit' => 2),
			'user_stow' => array('name' => '用户收藏', 'credit' => 2),
			'user_best' => array('name' => '用户点赞', 'credit' => 2),
			'user_cost' => array('name' => '用户消费', 'credit' => ''),
			'thread_post' => array('name' => '用户发帖', 'credit' => 0),
			'thread_reply' => array('name' => '用户回帖', 'credit' => 0),
			'thread_best' => array('name' => '设置精华帖', 'credit' => 0),
			'thread_replycredit' => array('name' => '回帖奖励(中奖)', 'credit' => '')
		);
		return $credits[$type];
	}
	
	public static function getUserCredit($type)
	{
		$credits = self::userCredits($type);
		return $credits['credit'];
	}
}

?>