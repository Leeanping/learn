<?php
namespace Core\Util;

class Tutil
{
	private static $UC2GBTABLE;
	private static $pinyins;
	
	public static function getPinyin($str, $ishead=0, $isclose=1)
	{
		$str = self::utf82gb($str);
		$restr = '';
		$str = trim($str);
		$slen = strlen($str);
		if($slen < 2)
		{
			return $str;
		}
		if(count(self::$pinyins) == 0)
		{
			$fp = fopen(HTDOCS_ROOT . 'data/pinyin.dat', 'r');
			while(!feof($fp))
			{
				$line = trim(fgets($fp));
				self::$pinyins[$line[0].$line[1]] = substr($line, 3, strlen($line)-3);
			}
			fclose($fp);
		}
		for($i=0; $i<$slen; $i++)
		{
			if(ord($str[$i])>0x80)
			{
				$c = $str[$i].$str[$i+1];
				$i++;
				if(isset(self::$pinyins[$c]))
				{
					if($ishead==0)
					{
						$restr .= self::$pinyins[$c];
					}
					else
					{
						$restr .= self::$pinyins[$c][0];
					}
				}else
				{
					$restr .= "_";
				}
			}else if( preg_match("/[a-z0-9]/i", $str[$i]) )
			{
				$restr .= $str[$i];
			}
			else
			{
				$restr .= "_";
			}
		}
		if($isclose==0)
		{
			unset(self::$pinyins);
		}
		return $restr;
	}
	
	public static function utf82gb($utfstr)
    {
        if(function_exists('iconv'))
        {
            return \Core\Fun::iconv('utf-8','gbk//ignore',$utfstr);
        }
        
        $okstr = "";
        if(trim($utfstr)=="")
        {
            return $utfstr;
        }
        if(empty(self::$UC2GBTABLE))
        {
            $filename = HTDOCS_ROOT . "data/gb2312-utf8.dat";
            $fp = fopen($filename,"r");
            while($l = fgets($fp,15))
            {
                self::$UC2GBTABLE[hexdec(substr($l, 7, 6))] = hexdec(substr($l, 0, 6));
            }
            fclose($fp);
        }
        $okstr = "";
        $ulen = strlen($utfstr);
        for($i=0;$i<$ulen;$i++)
        {
            $c = $utfstr[$i];
            $cb = decbin(ord($utfstr[$i]));
            if(strlen($cb)==8)
            {
                $csize = strpos(decbin(ord($cb)),"0");
                for($j=0;$j < $csize;$j++)
                {
                    $i++; $c .= $utfstr[$i];
                }
                $c = self::utf82u($c);
                if(isset(self::$UC2GBTABLE[$c]))
                {
                    $c = dechex(self::$UC2GBTABLE[$c]+0x8080);
                    $okstr .= chr(hexdec($c[0].$c[1])).chr(hexdec($c[2].$c[3]));
                }
                else
                {
                    $okstr .= "&#".$c.";";
                }
            }
            else
            {
                $okstr .= $c;
            }
        }
        $okstr = trim($okstr);
        return $okstr;
    }
	
	public static function utf82u($c)
    {
        switch(strlen($c))
        {
            case 1:
                return ord($c);
            case 2:
                $n = (ord($c[0]) & 0x3f) << 6;
                $n += ord($c[1]) & 0x3f;
                return $n;
            case 3:
                $n = (ord($c[0]) & 0x1f) << 12;
                $n += (ord($c[1]) & 0x3f) << 6;
                $n += ord($c[2]) & 0x3f;
                return $n;
            case 4:
                $n = (ord($c[0]) & 0x0f) << 18;
                $n += (ord($c[1]) & 0x3f) << 12;
                $n += (ord($c[2]) & 0x3f) << 6;
                $n += ord($c[3]) & 0x3f;
                return $n;
        }
    }
	
	public static function u2utf8($c)
    {
        for ($i = 0;$i < count($c);$i++)
        {
            $str = "";
        }
        if ($c < 0x80)
        {
            $str .= $c;
        }
        else if ($c < 0x800)
        {
            $str .= (0xC0 | $c >> 6);
            $str .= (0x80 | $c & 0x3F);
        }
        else if ($c < 0x10000)
        {
            $str .= (0xE0 | $c >> 12);
            $str .= (0x80 | $c >> 6 & 0x3F);
            $str .= (0x80 | $c & 0x3F);
        }
        else if ($c < 0x200000)
        {
            $str .= (0xF0 | $c >> 18);
            $str .= (0x80 | $c >> 12 & 0x3F);
            $str .= (0x80 | $c >> 6 & 0x3F);
            $str .= (0x80 | $c & 0x3F);
        }
        return $str;
    }
	
    /**
     * timestamp转换成显示时间格式
     * @param $timestamp
     * @return unknown_type
     */
    public static function tTimeFormat($timestamp)
    {
        $curTime = time();
        $space = $curTime - $timestamp;
        //1分钟
        if($space < 60)
        {
            $string = "刚刚";
            return $string;
        }
        elseif($space < 3600) //一小时前
        {
            $string = floor($space / 60) . "分钟前";
            return $string;
        }
        $curtimeArray = getdate($curTime);
        $timeArray = getDate($timestamp);
        if($curtimeArray['year'] == $timeArray['year'])
        {
            if($curtimeArray['yday'] == $timeArray['yday'])
            {
                $format = "%H:%M";
                $string = strftime($format, $timestamp);
                return "今天 {$string}";
            }
            elseif(($curtimeArray['yday'] - 1) == $timeArray['yday'])
            {
                $format = "%H:%M";
                $string = strftime($format, $timestamp);
                return "昨天 {$string}";
            }
            else
            {
                $string = sprintf("%d月%d日 %02d:%02d", $timeArray['mon'], $timeArray['mday'], $timeArray['hours'], 
                $timeArray['minutes']);
                return $string;
            }
        }
        $string = sprintf("%d年%d月%d日 %02d:%02d", $timeArray['year'], $timeArray['mon'], $timeArray['mday'], 
        $timeArray['hours'], $timeArray['minutes']);
        return $string;
    }
	
	/**
     * timestamp转换成显示多少天
     * @param $timestamp
     * @return unknown_type
     */
    public static function tTimeFormatDay($timestamp)
    {
        $curTime = \Core\Fun::time();
        $space = $timestamp - $curTime;
        if($space >= 0)
		{
			if($space < 60 && $space >= 0)
			{
				$string = $space . '秒';
			}
			elseif($space < 3600) //一小时前
			{
				$string = floor($space / 60) . "分钟";
			}
			else if($space >= 3600 && $space < 86400)
			{
				$string = floor($space / (60 * 60)) . "小时";
			}
			else if($space >= 86000)
			{
				$string = floor($space / (60 * 60 * 24)) . "天";
			}
			else
			{
				$string = 'unknow';
			}
		}
        else
		{
			$string = '无';
		}
        return $string;
    }

    /**
     * 关键字编码
     * @param $key
     * @return string
     */
    public static function keywordEncode($key)
    {
        return \Core\Fun::iurlencode($key);
    }
	
	public static function contentKeywords($content)
	{
		$akeywords = \Core\Config::get('akeywords', 'basic', '');
		$keyArr = explode(';', $akeywords);
		foreach($keyArr AS $key)
		{
			$simple = explode('|', $key);
			if(!preg_match("/<a\s+href=\"([^>]*)\"\s*target=\"_blank\">" . $simple[0] . "<\/a>/isU", $content, $match))
			{
				if($match[1] != $simple[1])
				{
					$content = preg_replace("/" . $simple[0] . "/", '<a href="' . $simple[1] . '" target="_blank">' . $simple[0] . '</a>', $content, 1);
				}
			}
		}
		return $content;
	}
	
	public static function setStats()
	{
		$time = \Core\Fun::time();
		$browser = self::getUserBrowser();
    	$os = self::getOS();
    	$ip = \Core\Comm\Util::getClientIp();
    	$area = self::getGeoIp($ip);
		if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']))
		{
			$pos  = strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], ';');
			$lang = addslashes(($pos !== false) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, $pos) : $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		}
		else
		{
			$lang = '';
		}
		/* 来源 */
		if (!empty($_SERVER['HTTP_REFERER']) && strlen($_SERVER['HTTP_REFERER']) > 9)
		{
			$pos = strpos($_SERVER['HTTP_REFERER'], '/', 9);
			if ($pos !== false)
			{
				$domain = substr($_SERVER['HTTP_REFERER'], 0, $pos);
				$path   = substr($_SERVER['HTTP_REFERER'], $pos);
			}
			else
			{
				$domain = $path = '';
			}
		}
		else
		{
			$domain = $path = '';
		}
		$phpself = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
		$data = array(
			'accesstime' => $time,
			'ip' => $ip,
			'visits' => 1,
			'browser' => $browser,
			'system' => $os,
			'language' => $lang,
			'area' => $area,
			'refererdomain' => $domain,
			'refererpath' => $path,
			'accessurl' => $phpself
		);
		M('stats')->addStats($data);
	}
	
	/**
	 * 获得浏览器名称和版本
	 *
	 * @access  public
	 * @return  string
	 */
	public static function getUserBrowser()
	{
		if (empty($_SERVER['HTTP_USER_AGENT']))
		{
			return '';
		}
	
		$agent       = $_SERVER['HTTP_USER_AGENT'];
		$browser     = '';
		$browser_ver = '';
	
		if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs))
		{
			$browser     = 'Internet Explorer';
			$browser_ver = $regs[1];
		}
		elseif (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs))
		{
			$browser     = 'FireFox';
			$browser_ver = $regs[1];
		}
		elseif (preg_match('/Maxthon/i', $agent, $regs))
		{
			$browser     = '(Internet Explorer ' .$browser_ver. ') Maxthon';
			$browser_ver = '';
		}
		elseif (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs))
		{
			$browser     = 'Opera';
			$browser_ver = $regs[1];
		}
		elseif (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $agent, $regs))
		{
			$browser     = 'OmniWeb';
			$browser_ver = $regs[2];
		}
		elseif (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $agent, $regs))
		{
			$browser     = 'Netscape';
			$browser_ver = $regs[2];
		}
		elseif (preg_match('/safari\/([^\s]+)/i', $agent, $regs))
		{
			$browser     = 'Safari';
			$browser_ver = $regs[1];
		}
		elseif (preg_match('/NetCaptor\s([^\s|;]+)/i', $agent, $regs))
		{
			$browser     = '(Internet Explorer ' .$browser_ver. ') NetCaptor';
			$browser_ver = $regs[1];
		}
		elseif (preg_match('/Lynx\/([^\s]+)/i', $agent, $regs))
		{
			$browser     = 'Lynx';
			$browser_ver = $regs[1];
		}
	
		if (!empty($browser))
		{
		   return addslashes($browser . ' ' . $browser_ver);
		}
		else
		{
			return 'Unknow browser';
		}
	}
	
	/**
	 * 获得客户端的操作系统
	 *
	 * @access  private
	 * @return  void
	 */
	public static function getOS()
	{
		if (empty($_SERVER['HTTP_USER_AGENT']))
		{
			return 'Unknown';
		}
	
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		$os    = '';
	
		if (strpos($agent, 'win') !== false)
		{
			if (strpos($agent, 'nt 5.1') !== false)
			{
				$os = 'Windows XP';
			}
			elseif (strpos($agent, 'nt 5.2') !== false)
			{
				$os = 'Windows 2003';
			}
			elseif (strpos($agent, 'nt 5.0') !== false)
			{
				$os = 'Windows 2000';
			}
			elseif (strpos($agent, 'nt 6.0') !== false)
			{
				$os = 'Windows Vista';
			}
			elseif (strpos($agent, 'nt') !== false)
			{
				$os = 'Windows NT';
			}
			elseif (strpos($agent, 'win 9x') !== false && strpos($agent, '4.90') !== false)
			{
				$os = 'Windows ME';
			}
			elseif (strpos($agent, '98') !== false)
			{
				$os = 'Windows 98';
			}
			elseif (strpos($agent, '95') !== false)
			{
				$os = 'Windows 95';
			}
			elseif (strpos($agent, '32') !== false)
			{
				$os = 'Windows 32';
			}
			elseif (strpos($agent, 'ce') !== false)
			{
				$os = 'Windows CE';
			}
		}
		elseif (strpos($agent, 'linux') !== false)
		{
			$os = 'Linux';
		}
		elseif (strpos($agent, 'unix') !== false)
		{
			$os = 'Unix';
		}
		elseif (strpos($agent, 'sun') !== false && strpos($agent, 'os') !== false)
		{
			$os = 'SunOS';
		}
		elseif (strpos($agent, 'ibm') !== false && strpos($agent, 'os') !== false)
		{
			$os = 'IBM OS/2';
		}
		elseif (strpos($agent, 'mac') !== false && strpos($agent, 'pc') !== false)
		{
			$os = 'Macintosh';
		}
		elseif (strpos($agent, 'powerpc') !== false)
		{
			$os = 'PowerPC';
		}
		elseif (strpos($agent, 'aix') !== false)
		{
			$os = 'AIX';
		}
		elseif (strpos($agent, 'hpux') !== false)
		{
			$os = 'HPUX';
		}
		elseif (strpos($agent, 'netbsd') !== false)
		{
			$os = 'NetBSD';
		}
		elseif (strpos($agent, 'bsd') !== false)
		{
			$os = 'BSD';
		}
		elseif (strpos($agent, 'osf1') !== false)
		{
			$os = 'OSF1';
		}
		elseif (strpos($agent, 'irix') !== false)
		{
			$os = 'IRIX';
		}
		elseif (strpos($agent, 'freebsd') !== false)
		{
			$os = 'FreeBSD';
		}
		elseif (strpos($agent, 'teleport') !== false)
		{
			$os = 'teleport';
		}
		elseif (strpos($agent, 'flashget') !== false)
		{
			$os = 'flashget';
		}
		elseif (strpos($agent, 'webzip') !== false)
		{
			$os = 'webzip';
		}
		elseif (strpos($agent, 'offline') !== false)
		{
			$os = 'offline';
		}
		else
		{
			$os = 'Unknown';
		}
	
		return $os;
	} 
	
	public static function getGeoIp($ip)
	{
		static $fp = NULL, $offset = array(), $index = NULL;

		$ip    = gethostbyname($ip);
		$ipdot = explode('.', $ip);
		$ip    = pack('N', ip2long($ip));
	
		$ipdot[0] = (int)$ipdot[0];
		$ipdot[1] = (int)$ipdot[1];
		if ($ipdot[0] == 10 || $ipdot[0] == 127 || ($ipdot[0] == 192 && $ipdot[1] == 168) || ($ipdot[0] == 172 && ($ipdot[1] >= 16 && $ipdot[1] <= 31)))
		{
			return 'LAN';
		}
	
		if ($fp === NULL)
		{
			$fp = fopen(ROOT . 'data/ipdata.dat', 'rb');
			if ($fp === false)
			{
				return 'Invalid IP data file';
			}
			$offset = unpack('Nlen', fread($fp, 4));
			if ($offset['len'] < 4)
			{
				return 'Invalid IP data file';
			}
			$index  = fread($fp, $offset['len'] - 4);
		}
	
		$length = $offset['len'] - 1028;
		$start  = unpack('Vlen', $index[$ipdot[0] * 4] . $index[$ipdot[0] * 4 + 1] . $index[$ipdot[0] * 4 + 2] . $index[$ipdot[0] * 4 + 3]);
		for ($start = $start['len'] * 8 + 1024; $start < $length; $start += 8)
		{
			if ($index{$start} . $index{$start + 1} . $index{$start + 2} . $index{$start + 3} >= $ip)
			{
				$index_offset = unpack('Vlen', $index{$start + 4} . $index{$start + 5} . $index{$start + 6} . "\x0");
				$index_length = unpack('Clen', $index{$start + 7});
				break;
			}
		}
	
		fseek($fp, $offset['len'] + $index_offset['len'] - 1024);
		$area = fread($fp, $index_length['len']);
	
		fclose($fp);
		$fp = NULL;
	
		return $area;
	}
}
