<?php
namespace Model\User;
/**
 * 缓存用户信息
 *
 * @author Snake.L
 * @package Model
 */
class Local
{
    protected static $_userLocalDir = '_data/_userinfo/'; #缓存本地化用户信息
    protected static $_expiresTime = 604800; #个人数据缓存7天

    protected static $_userProcessCache = array();//缓存本进程请求的本地用户数据

    protected static $_userID2Key = array();//缓存用户名对应用户key
    protected static $_userKey2ID = array();//缓存用户key对应用户名称
    
    /**
     * 批量获取用户信息
     * @param array $uids|$userCheck false 不用检查输入用户安全性
     * @return array 本地化后的用户信息
     */
    public static function getUsersInfo ($uids,$userCheck=true)
    {
		$uids = \Core\Comm\Util::formatName2Array($uids);
        $uids = array_map('strtolower', $uids);
        self::$_userID2Key = self::$_userKey2ID = array();//清空用户缓存

        if($userCheck)//用户账号安全性
        {
            $uids = \Core\Comm\Util::formatName2Array($uids);
            if(empty($uids)) return array();
        }

        
        $uProcessCache = array();//本次请求存在用户的缓存器
        if(!empty(self::$_userProcessCache) && !empty($uids))//如果本次请求中获取有此用户信息，不再read cache
        {
             foreach($uids AS $k=> $uid)
            {
                if(isset(self::$_userProcessCache[$uid]))
                {
                     $uProcessCache[$uid] = self::$_userProcessCache[$uid];
                     unset($uids[$k]);
                }
             }
             if(empty($uids)) return $uProcessCache;
        }
		
        $cacheUserData = array();//架构缓存（文件or memcache）
        $allUserKey = self::getCacheKey($uids);//获取用户缓存地址

        $cacheUserData = \Core\Cache::read($allUserKey);//获取缓存数据
		
        $cacheUserKey = array_keys($cacheUserData);//获已缓存的用户的key
        $unCacheUserName = self::getMissName($cacheUserKey);//获取未被缓存的用户名称
		
        if(is_array($unCacheUserName) && $unCacheUserName)
        {
            $newFetchUser = self::fetchUsersInfo($unCacheUserName);
            \Core\Cache::write($newFetchUser,'',self::$_expiresTime);
            $cacheUserData = array_merge($cacheUserData,$newFetchUser);
        }

        //转换key的键值为用户名
        foreach($cacheUserData AS $k => $v)
        {

            $uid = self::$_userKey2ID[$k];
            $cacheUserData[$uid] = $v;
            unset($cacheUserData[$k]);
        }

        $cacheUserData && self::$_userProcessCache = array_merge(self::$_userProcessCache, $cacheUserData);//合并新数据和进程缓存
        $uProcessCache && $cacheUserData = array_merge($uProcessCache, $cacheUserData);//合并本次请求的数据
	    return $cacheUserData;
        
    }

    /**
     * @单个或者批量删除用户缓存
     * @param $users: array|string(单个用户名或者英文逗号相连接的用户名)
     * @return array|string
     */
    public static function delCache($users)
    {
        //格式化
        $users = \Core\Comm\Util::formatName2Array($users);
        if(empty($users)) return false;
        $users = array_map('strtolower', $users);
        $allUserKey = self::getCacheKey($users,false);//获取用户缓存地址
        \Core\Cache::del($allUserKey);
        return true;
    }
    
    
    /**
     * @获取用户名对应的缓存key
     * @param $users: array|string
     * @return array|string
     */
    public static function getCacheKey($users,$cacheKey=true)
    {
        if(empty($users) ) return array();
        if(is_array($users))
        {
            $cachePath = array();
            foreach($users AS $v)
            {
                $userPath = \Core\Comm\Util::getUserCachePath($v, self:: $_userLocalDir);
                $cachePath[] =  $userPath;
                if($cacheKey)
                {
                    self::$_userID2Key[$v] = $userPath;
                    self::$_userKey2ID[$userPath] = $v;
                }
            }
        }else{
            $cachePath = \Core\Comm\Util::getUserCachePath($users, self:: $_userLocalDir);
        }
        return $cachePath;
    }
    
    /**
     * @返回未缓存的用户uid
     * @param $cacheUserKey 已缓存的所有用户的key 
     * @return 未缓存用户的ID
     */
    public static function getMissName($cacheUserKey)
    {
        $allUserKey = self::$_userID2Key;//所有用户的key
        if(is_array($cacheUserKey) && $cacheUserKey )//有缓存的计算差集
        {
               $unCacheUserKey = array_diff($allUserKey, $cacheUserKey);
               $unCacheUserName = self::getCacheNameFromKey($unCacheUserKey);
        }else{//否则获取全部内容
                $unCacheUserName = self::$_userKey2ID;
        }
		
        return $unCacheUserName;
    }


     /**
     * @根据缓存key得到缓存uid
     * @param array $keys 缓存地址
     * @return array name 根据用户缓存地址 反算用户名
     */
    public static function getCacheNameFromKey($unCacheUserKey)
    {
        $unCacheUserName = array();
        foreach($unCacheUserKey AS $unKey)
        {
           !empty(self::$_userKey2ID[$unKey]) && $unCacheUserName[] = self::$_userKey2ID[$unKey];
        }
        return $unCacheUserName;
    }    
    
    /**
     * 批量获取用户信息
     * @param array $uids
     * @return array 用户信息
     */
    public static function fetchUsersInfo ($uids)
    {
        !is_array($uids) && $uids = explode(',',$uids);
        if(!is_array($uids) || !count($uids)) return array();
        
        $onceTotal = 200; //每次最多处理200个
        $requests = array_chunk ($uids, $onceTotal);
        $result = array ();
        foreach ($requests as $r)
        {
            $_result = self::_fetUsersInfo ($r);
            $result = array_merge ($result, $_result);
        }
        return $result;
    }

    /**
     * 批量获取用户信息
     * @param array $uids
     * @return array 用户信息
     */
    private static function _fetUsersInfo ($uids)
    {
        if (empty ($uids)) {
            return array ();
        }
        
        //获取本地用户信息
        $userInfo = \Model\User\Member::getUserInfosByUids ($uids);
        $returnUser = array();
		
        //把某些属性替换成本地内容
        foreach ($uids as $val)
        {
            $key = empty(self::$_userID2Key[$val])?\Core\Comm\Util::getUserCachePath($val, self:: $_userLocalDir):self::$_userID2Key[$val];//此用户要缓存的key
            if(empty($val)) continue;
			$viptime = C::M('User_Vip')->getVipByUid('endtime', $userInfo[$val]['uid']);
            $user = array();
			$user['username'] = $userInfo[$val]['username'];
            $user['uid'] = $userInfo[$val]['uid'];//uid
			$user['gid'] = $userInfo[$val]['gid'];
			$user['usersn'] = $userInfo[$val]['usersn'];
			$user['password'] = $userInfo[$val]['password'];
			$user['paypassword'] = $userInfo[$val]['paypassword'];
			$user['roleid'] = $userInfo[$val]['roleid'];
            $user['email'] = $userInfo[$val]['email'];
			$user['score'] = $userInfo[$val]['score'];
			$user['telephone'] = $userInfo[$val]['telephone'];
			$user['istelephone'] = $userInfo[$val]['istelephone'];
			$user['isemail'] = $userInfo[$val]['isemail'];
			$user['qq'] = $userInfo[$val]['qq'];
			$user['headpic'] = $userInfo[$val]['headpic'];
			$user['headpic150'] = $userInfo[$val]['headpic150'];
			$user['honor'] = $userInfo[$val]['honor'];
			$user['regtime'] = $userInfo[$val]['regtime'];
			$user['lastvisit'] = $userInfo[$val]['lastvisit'];
			$user['connectid'] = $userInfo[$val]['connectid'];
			$user['shield'] = $userInfo[$val]['shield'];
			$user['isvip'] = C::M('User_Vip')->isVip($userInfo[$val]['uid']) ? 1: 0;
			$user['issvip'] = C::M('User_Svip')->isVip($userInfo[$val]['uid']) ? 1: 0;
			$user['viptime'] = $viptime['endtime'];
			$user['account'] = C::M('User_Account')->isAccount($userInfo[$val]['uid']) ? 1 : 0;//是否安全验证
            $returnUser[$key] = $user;
        }
        return $returnUser;
    }
    
}