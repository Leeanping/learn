<?php
namespace Model\User;

use Core\Model;
/**
 * 用户操作类
 *
 * @author snake.L
 */
class Member extends Model
{
    /**
     * 表名
     *
     * @var string
     */
    protected $_tableName = 'user_member';

    /**
     * 字段列表
     *
     * @var array
     */
    protected $_fields = array ('uid', 'gid', 'roleid', 'username', 'realname', 'password', 'salt', 'score', 'regtime', 'regip', 'lastvisit', 'lastip', 'headpic', 'honor', 'medals', 'headpic30', 'headpic50', 'headpic150', 'islocked', 'email', 'isemail', 'telephone', 'qq', 'connectid', 'exp', 'istelephone', 'wbname');

    /**
     * 主键字段名
     *
     * @var string
     */
    public $_idkey = 'uid';

    //数据容器
    protected static $_userdata = array();

    /**
     * 获得加密随机码
     *
     * @return string
     */
    public function getSalt ()
    {
        return substr (uniqid (rand ()), -6);
    }

    /**
     * 加密密码
     *
     * @param string $password
     * @param string $salt
     * @return string
     */
    public function formatPassword ($password, $salt)
    {
        return md5 (md5 ($password) . $salt);
    }

    /**
     * 添加用户
     *
     * @param array $userInfo
     * @return int uid
     */
    public function addUser ($userInfo)
    {
        return $this->add ($userInfo, $this->memberTableSafeColumu);
    }

    /**
     * 修改用户信息
     *
     * @param array $userInfo
     * @return boolean
     */
    public function editUserInfo ($userInfo)
    {
        $update = $this->update ($userInfo);
        !empty ($userInfo['uid']) && \Model\User\Local::delCache ($userInfo['uid']);
        return $update;
    }

    /**
     * 根据用户编号删除用户信息（未用到，未清缓存）
     *
     * @param int|array $uid
     * @return boolean
     */
    public function deleteUserByUid ($uid)
    {
        return $this->remove ($uid);
    }

    /**
     * 验证用户名是否已注册
     *
     * @param string $username
     * @param int $uid
     * @return boolean
     */
    public function checkUsernameExists ($username, $uid=0)
    {
		if(preg_match('/^[0-9]+$/', $username) && strlen($username) == 6)
		{
			$whereArr = array (array ('cardsn', $username));
		}
		else
		{
        	$whereArr = array (array ('username', $username));
		}
        !empty ($uid) && $whereArr[] = array ('uid', $uid, '<>');
        return $this->getCount ($whereArr);
    }
	
	/**
     * 验证姓名是否已注册
     *
     * @param string $realname
     * @param int $uid
     * @return boolean
     */
    public function checkRealnameExists ($realname, $uid=0)
    {
        $whereArr = array (array ('realname', $realname));
        !empty ($uid) && $whereArr[] = array ('uid', $uid, '<>');
        return $this->getCount ($whereArr);
    }

    /**
     * 验证邮箱是否已注册
     *
     * @param string $email
     * @param int $uid
     * @return boolean
     */
    public function checkEmailExists ($email, $uid=0)
    {
        $whereArr = array (array ('email', $email));
        !empty ($uid) && $whereArr[] = array ('uid', $uid, '<>');
        return $this->getCount ($whereArr);
    }

    /**
     * 修改密码时验证旧密码是否正确
     *
     * @param string $username
     * @param string $oldPassword
     * @return boolean
     */
    public function checkUserOldPassword ($username, $oldPassword)
    {
        $oldPassword = $this->formatPassword ($oldPassword, $this->getSaltByUsername ($username));
        return $this->getCount (array (array ('username', $username), array ('password', $oldPassword)));
    }
	
    /**
     * 根据用户名获得salt
     *
     * @param string $username
     * @return string
     */
    public function getSaltByUsername ($username)
    {
    	$uinfo = $this->getUserInfoByUsername($username);
        return empty ($uinfo['salt']) ? '' : $uinfo['salt'];
    }

    /**
     * 根据用户编号获得用户信息
     *
     * @param int $uid
     * @return array
     */
    public function getUserInfoByUid ($uid)
    {
    	if(!isset(self::$_userdata['uid.'.$uid]))
    		self::$_userdata['uid.'.$uid] = $this->queryOne ('*', array (array ('uid', $uid)));
    	return self::$_userdata['uid.'.$uid];
    }
	
	/**
     * 根据connectid获得用户信息
     *
     * @param int $connectid
     * @return array
     */
	public function getUserInfoByConnectid ($connectid)
    {
    	if(!isset(self::$_userdata['connectid.'.$connectid]))
    		self::$_userdata['connectid.'.$connectid] = $this->queryOne ('*', array (array ('connectid', $connectid)));
    	return self::$_userdata['connectid.'.$connectid];
    }
	
	public function getInfoByUid ($field, $uid)
    {
    	$uinfo = $this->getUserInfoByUid($uid);
        return empty ($uinfo[$field]) ? '' : $uinfo[$field];
    }
	
	public function getDisplayUsernameByUid ($uid)
    {
    	$uinfo = $this->getUserInfoByUid($uid);
        return empty ($uinfo['realname']) ? $uinfo['username'] : $uinfo['realname'];
    }

    /**
     * 根据用户名获得用户信息
     *
     * @param string $username
     * @return array
     */
    public function getUserInfoByUsername ($username)
    {
		$user = array (array ('username', $username));
    	if(!isset(self::$_userdata['username.'.$username]))
    		self::$_userdata['username.'.$username] = $this->queryOne ('*', $user);
    	return self::$_userdata['username.'.$username];
    }
	
	/**
     * 根据用户名获得用户信息
     *
     * @param string $username
     * @return array
     */
    public function getInfoByUsername ($field, $username)
    {
		$uinfo = $this->getUserInfoByUsername($username);
        return empty ($uinfo[$field]) ? '' : $uinfo[$field];
    }

    /**
     * 通过姓名获得用户信息
     *
     * @param string $name
     * @return array
     */
    public function getUserInfoByName ($realname)
    {
    	if(!isset(self::$_userdata['realname.'.$realname]))
    		self::$_userdata['realname.'.$realname] = $this->queryOne ('*', array (array ('realname', $realname)));
    	return self::$_userdata['realname.'.$realname];
    }

    /**
     * 获得用户信息
     *
     * @param array $uids|$tolowwer 是否把键值变为小写
     * @return array
     */
    public static function getUserInfosByUids ($uids)
    {
        if (is_array ($uids) && count ($uids) > 0) {
            $sql = 'SELECT a.* FROM `##__user_member` AS a WHERE a.uid IN(' . \Core\Comm\Util::array2string ($uids) . ')';
            $sqlResult = \Core\Db::fetchAll ($sql);
            $result = array ();
            foreach ($sqlResult as $value)
            {
                $result[$value['uid']] = $value;
            }
            return $result;
        } 
        return array ();
    }

    /**
     * 获得用户列表
     *
     * @param array $whereArr
     * @param array $orderByArr
     * @param array $limitArr
     * @return array
     */
    public function getUserList ($whereArr=array (), $orderByArr=array (), $limitArr=array ())
    {
        return $this->queryAll ($whereArr, $orderByArr, $limitArr);
    }

    /**
     * 获得用户数量
     *
     * @param array $whereArr
     * @return int
     */
    public function getUserCount ($whereArr=array ())
    {
        return $this->getCount ($whereArr);
    }

    /**
     * 用户注册
     *
     * @param string $username
     * @param string $password
     * @param string $email
     * @return int uid
     */
    public function onRegister ($username, $password, $email)
    {
        $salt = $this->getSalt ();
        $password = $this->formatPassword ($password, $salt);
        $userInfo = array ('username' => $username
            , 'password' => $password
            , 'salt' => $salt
            , 'email' => $email
            , 'regtime' => time ()
            , 'regip' => \Core\Comm\Util::getClientIp ()
            , 'lastvisit' => time ()
            , 'lastip' => \Core\Comm\Util::getClientIp ()
        );
        return $this->addUser ($userInfo);
    }

    /**
     * 自动注册
     *
     * @param int $uid
     * @param string $username
     * @param string $email
     * @return int uid
     */
    public function onAutoRegister ($uid, $username, $email)
    {
        $userInfo = array ('uid' => $uid
            , 'username' => $username
            , 'password' => md5 (rand ())
            , 'email' => $email
            , 'regtime' => time ()
            , 'regip' => \Core\Comm\Util::getClientIp ()
            , 'lastvisit' => time ()
            , 'lastip' => \Core\Comm\Util::getClientIp ()
        );
        return $this->addUser ($userInfo);
    }

    /**
     * 更新密码
     *
     * @param int $uid
     * @param string $password
     * @return boolean
     */
    public function onUpdatePassword ($uid, $password)
    {
        $salt = $this->getSalt ();
        $password = $this->formatPassword ($password, $salt);
        $userInfo = array ('uid' => $uid
            , 'password' => $password
            , 'salt' => $salt
        );
        return $this->editUserInfo ($userInfo);
    }

    /**
     * 用户登录
     *
     * @param string $username
     * @param string $password
     * @return array
     */
    public function onLogin ($username, $password)
    {
        $password = $this->formatPassword ($password, $this->getSaltByUsername ($username));
		$user = array ('username', $username);
        return $this->queryOne ('*', array ($user, array ('password', $password)));
    }
	
	/**
     * 用户登录通过connectid
     *
     * @param string $connectid
     * @return array
     */
    public function onLoginByConnectid ($connectid)
    {
        return $this->queryOne ('*', array (array ('connectid', $connectid)));
    }

    /**
     * 保存当前用户信息
     *
     * @param int $uid
     * @param string $nick
     */
    public function onSetCurrentUser ($uid, $username, $roleid)
    {
        $_SESSION['uid'] = $uid;
        $_SESSION['username'] = $username;
		$_SESSION['roleid'] = $roleid;
        $_SESSION['lastupdate'] = CURTIME;
    }

    /**
     * 获得当前用户信息
     *
     * @return array
     */
    public function onGetCurrentUser ()
    {
        $cUser = array ();
        $cUser['uid'] = isset ($_SESSION['uid']) ? $_SESSION['uid'] : null;
        $cUser['username'] = isset ($_SESSION['username']) ? $_SESSION['username'] : null;
		$cUser['roleid'] = isset ($_SESSION['roleid']) ? $_SESSION['roleid'] : null;
        //为用户延长会话保持时间
        if (empty ($_SESSION['lastupdate']) || ($cUser && \Core\Fun::time () - $_SESSION['lastupdate'] > 300)) 
            $_SESSION['lastupdate'] = \Core\Fun::time ();
        return $cUser;
    }

    /**
     * 用户登出
     */
    public function onLogout ()
    {
        $tokenModel = new \Model\Base\Token();
        if (isset($_SESSION['uid']) && $_SESSION['uid'])
            $tokenModel->deleteTokenByUid ($_SESSION['uid']);
            
        \Core\Fun::setcookie ('vpcv_token', null);
        
        if(isset ($_SESSION['uid']))
        	unset ($_SESSION['uid']);
        if(isset ($_SESSION['nick']))
        	unset ($_SESSION['nick']);
		if(isset ($_SESSION['gid']))
        	unset ($_SESSION['gid']);
        
	    if(isset ($_SESSION['username']))
	        unset ($_SESSION['username']);
	        
	    if(isset ($_SESSION['finduser']))
	        unset ($_SESSION['finduser']);
	    if(isset ($_SESSION['changeuser']))
	        unset ($_SESSION['changeuser']);
	        
	    if(isset ($_SESSION['ucsynlogin']))
	        unset ($_SESSION['ucsynlogin']);
	    if(isset ($_SESSION['ucsynlogout']))
	        unset ($_SESSION['ucsynlogout']);
    }

    /**
     * 更新用户最后访问时间和IP
     *
     * @param int $uid
     * @return boolean
     */
    public function onSetLastVisit ($uid)
    {
        $userInfo = array ('uid' => $uid
            , 'lastvisit' => time ()
            , 'lastip' => \Core\Comm\Util::getClientIp ()
        );
        return $this->editUserInfo ($userInfo);
    }

    /**
     * 检测用户是否登录
     *
     * @return boolean
     */
    public function checkLogged ()
    {
        $cUser = $this->onGetCurrentUser ();
        if (!empty ($cUser['uid']))
            return true;
        return false;
    }
	
	//格式化用户等级
	public function formatUserLevel($uid)
	{
		$star = '';
		$gid = $this->getInfoByUid('gid', $uid);
		$_groupModel = new \Model\User\Group();
		$group = $_groupModel->getGroupInfoByGid($gid);
		$num = $group['starnum'];
		if($num < 4) 
		{
			for($i = 0; $i < $num; $i++) 
			{
				$star .= '<img src="/resource/images/star/star_level1.gif" />';
			}
		} 
		else 
		{
			for($i = 3; $i > 0; $i--) 
			{
				$numlevel = intval($num / pow(4, ($i - 1)));
				$num = ($num % pow(4, ($i - 1)));
				for($j = 0; $j < $numlevel; $j++) 
				{
					$star .= '<img class="vmiddle" src="/resource/images/star/star_level'.$i.'.gif" />';
				}
			}
		}
		
		return array('star' => $star, 'groupname' => $group['title']);
	}
	
	public function formatMedal($medals)
	{
		$medals = unserialize($medals);
		$m = '';
		$idx = 0;
		foreach($medals AS $medal)
		{
			$idx++;
			$imgtype = $idx > 10 ? '.png' : '.gif';
			$m .= '<img src="/resource/images/medal/' . $medal . $imgtype . '" class="medal" />';
		}
		return $m;
	}
}
?>