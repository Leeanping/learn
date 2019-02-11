<?php
namespace Core\Controller;
/**
 * Core_Controller_Action 基类
 * 所有Controller继承自此类
 *
 * @author Snake.L
 * @version $Id: Core_Controller_Action.php $
 * @package Controller
 */
class Action
{

    protected $_classMethods;
    protected $_params;

    /**
     * 构造函数
     * @param array $params Pathinfo中附带的请求参数
     * @author Snake.L
     */
    public function __construct ($params)
    {
        $this->_params = $params;
    }

    /**
     * 获取请求参数
     * 优先级 Pathinfo => $_GET => $_POST
     *
     * @param string $key    不解释
     * @param string $default    默认值
     * @return mix
     * @author Snake.L
     */
    public function getParam ($key, $default = null)
    {
		if (isset($this->_params[$key]))
		{
			//return $this->_params[$key];
			return $this->hackXss($this->_params[$key]);
		}
		elseif (isset($_GET[$key]))
		{
			//return $_GET[$key];
			return $this->hackXss($_GET[$key]);
		}
		elseif (isset($_POST[$key]))
		{
			//return $_POST[$key];
			return $this->hackXss($_POST[$key]);
		}

        return $default;
    }

    public function getSafeParam ($key, $default = null)
    {
        return strip_tags(trim($this->getParam ($key,$default)));
    }

    /**
     * 获取所有请求参数
     * Pathinfo解析 + $_GET + $_POST
     * @return array
     * @author Snake.L
     */
    public function getParams ()
    {
        $return = $this->_params;
        if (isset ($_GET) && is_array ($_GET)) {
            $return += $_GET;
        }
        if (isset ($_POST) && is_array ($_POST)) {
            $return += $_POST;
        }
        return $return;
    }

    /**
     * 设置一个请求参数
     *
     * @param string $key	参数key
     * @param mix $value	参数值
     * @return Core_Controller_Action
     * @author Snake.L
     */
    public function setParam ($key, $value)
    {
        $key = (string)$key;

        if ((null === $value) && isset ($this->_params[$key])) {
            unset ($this->_params[$key]);
        } elseif (null !== $value) {
            $this->_params[$key] = $value;
        }

        return $this;
    }

    /**
     * 设置一组请求参数
     *
     * @param array $params 请求参数数组
     * @return Core_Controller_Action
     * @author Snake.L
     */
    public function setParams ($params=array ())
    {
        foreach ($params as $key => $value)
        {
            $this->setParam ($key, $value);
        }
        return $this;
    }

    /**
     * 转发请求到其它控制器
     *
     * @param string $action	转发的Action
     * @param string $controller	转发的Controller
     * @param string $model	转发的Model
     * @param array $params 附带的参数
     * @author Snake.L
     */
    public function forward ($action, $controller=null, $model=null, $params=null)
    {
        $front = \Core\Controller\Front::getInstance ();
        $front->setdparams ($action, $controller, $model, $params);
        $front->dispatch ();
    }

    protected $_front = null;

    /**
     * 获取前端控制器
     * @return Core_Controller_Front
     * @author Snake.L
     */
    public function getFront ()
    {
        if (null === $this->_front) {
            $this->_front = \Core\Controller\Front::getInstance ();
        }
        return \Core\Controller\Front::getInstance ();
    }

    /**
     * 获得Model Name
     * @return string
     * @author Snake.L
     */
    protected function getModelName ()
    {
        return \Core\Controller\Front::getInstance ()->getModelName ();
    }

    /**
     * 获得Controller Name
     * @return string
     * @author Snake.L
     */
    protected function getControllerName ()
    {
        return \Core\Controller\Front::getInstance ()->getControllerName ();
    }

    /**
     * 获得Action Name
     * @return string
     * @author Snake.L
     */
    protected function getActionName ()
    {
        return \Core\Controller\Front::getInstance ()->getActionName ();
    }

    /**
     * 获取一个Cookie值
     * @param string $name
     * @return mix
     * @author Snake.L
     */
    protected function getCookie ($name)
    {
        return \Core\Fun::getcookie ($name);
    }

    /**
     * 设置Cookie值
     * @param string $name Cookie key
     * @param string $value Cookie 值
     * @param number $kptime 有效期，0当前session
     * @param bool $httponly 是否仅http
     * @author Snake.L
     */
    protected function setCookie ($name, $value, $kptime=0, $httponly=false)
    {
        \Core\Fun::setcookie ($name, $value, $kptime, $httponly);
    }
	
    /**
     * 获取SERVER变量
     * @param string $name
     * @return string
     * @author Snake.L
     */
    protected function getServer ($name)
    {
        return $_SERVER[$name];
    }

    /**
     * 分发前执行的操作
     * 如有需要请重载
     * @author Snake.L
     */
    public function preDispatch ()
    {
    	$bannedModel = new \Model\User\Banned();
		if($bannedModel->checkBanned(\Core\Comm\Util::getClientIp()))
		{
			$this->display('index/banned.tpl');
			exit;
		}

		$userModel = new \Model\User\Member();
		$cUser = $userModel->onGetCurrentUser();
        $cUser && $userInfo = $userModel->getUserInfoByUid($cUser['uid']);
		
        //站点关闭 只有管理员才可以登录和访问
        if(\Core\Config::get('site_closed','site',false))
        {
        	if(!$userInfo || $userInfo['gid'] != 1)
        	{
	        	if($this->getModelName() == 'index' && (($this->getControllerName() != 'gd' && ($this->getControllerName() != 'login') || ($this->getControllerName() == 'login' && ($this->getActionName() != 'index' && $this->getActionName() != 'l')))))
	        	{
	        		$userModel->onLogout();
	        		$this->showmsg('', 'login/index/msg/'.\Core\Comm\Modret::RET_SITE_CLOSED, 0);
	        	}
	        	if($this->getModelName() == 'wap' && ($this->getControllerName() != 'login' || ($this->getControllerName() == 'login' && ($this->getActionName() != 'index' && $this->getActionName() != 'l'))))
	        	{
	        		$userModel->onLogout();
	        		$this->showmsg('', 'wap/login/index', 0);
	        	}
        	}
        }
        //关闭新用户注册 注册请求跳转回登录页
        if(!\Core\Config::get('login_allow_new_user','basic',false))
        	if($this->getModelName() == 'index' && $this->getControllerName() == 'reg' && ($this->getActionName() == 'index' || $this->getActionName() == 'r'))
        		$this->showmsg('', 'login', 0);
        //Model是index 且Controller是login或reg
		if($this->getModelName() == 'index' && ($this->getControllerName() == 'login' || $this->getControllerName() == 'reg'))
		{
			if($this->getActionName() != 'logout')
			{
		        if(!empty($cUser['uid']))
		        	$this->showmsg('', 'u/'.$cUser['uid'], 0);
		        if(($this->getControllerName() == 'login' && $this->getActionName() != 'l') &&
			        		($this->getControllerName() == 'reg' && $this->getActionName() != 'b') &&
			        		($this->getControllerName() == 'reg' && $this->getActionName() != 'index') &&
			        		($this->getControllerName() == 'reg' && $this->getActionName() != 'r'))
		        	$this->showmsg('', 'reg/b', 0);
			}
		}
		//Model是wap 且Controller是login
		if($this->getModelName() == 'wap' && $this->getControllerName() == 'login')
		{
			if($this->getActionName() != 'logout')
			{
		        if(!empty($cUser['uid']))
		        	$this->showmsg('', 'wap/u/'.$cUser['uid'], 0);
		        if(($this->getControllerName() == 'login' && $this->getActionName() != 'l') &&
			        		($this->getControllerName() == 'login' && $this->getActionName() != 'b'))
		        	$this->showmsg('', 'wap/login/b', 0);
			}
		}
		//Model是admin
		if($this->getModelName() == 'admin')
		{
			if(isset($_SESSION['isadmin']) && isset($_SESSION['admingid']))
			{
				if($_SESSION['isadmin'] != 1)
				{
					$_controller = $this->getControllerName();
					$_action = $this->getActionName();
					//检查权限
					if(M('User_Access')->checkAccessByUidAndModel($_SESSION['isadmin'], $_controller . '_' . $_action))
					{
						
						if($_controller == 'login' && $_action == 'login')
						{
							$userModel->onLogout();
							$this->showmsg('你没有权限操作', 'admin/login/index');
						}
						else
						{
							echo 'no priv';exit;
						}
					}
				}
			}
			
			//数据恢复
			if(!(isset($_SESSION['restore']) && $_SESSION['restore']))
			{
				if(isset($_SESSION['isadmin']) && $_SESSION['isadmin']){
					//为活跃管理员延续超时时间
					if($_SESSION['isadmin'] && \Core\Fun::time() - $_SESSION['lastupdate'] > 300)
		            	$_SESSION['lastupdate'] = \Core\Fun::time();
				}
				//Model是admin 且Controller不是login
				if($this->getControllerName() != 'login' && empty($_SESSION['isadmin'])){
                    if($this->getControllerName() == 'index' && $this->getActionName() == 'index')
                    {
                        $this->showmsg('', 'admin/login/index', 0);
                    }
                    else
                    {
                        $arr['msg'] = -1;
                        echo \Core\Fun::array2json($arr);
                        exit;
                    } 
                }
				
				//Model是admin 且Controller是login 且Action不是logout
				if($this->getControllerName() == 'login' && $this->getActionName() != 'logout' && isset($_SESSION['isadmin']))
					$this->showmsg('', 'admin/index/index', 0);
			}
		}
    }

    /**
     * 分发完成后执行的操作
     * 如有需要请重载
     * @author Snake.L
     */
    public function postDispatch ()
    {

    }

    /**
     * 分发请求到Action
     * @param string $action
     * @author Snake.L
     */
    public function dispatch ($action)
    {
        $this->preDispatch ();
        if (null === $this->_classMethods) {
            $this->_classMethods = get_class_methods ($this);
        }

        //__call 方法兼容
        if (in_array ($action, $this->_classMethods)) {
            $this->$action ();
        } else {
            $this->__call ($action, array ());
        }
        $this->postDispatch ();
    }

    /**
     * __call 魔术方法，在Action不存在时运行
     * 可以用来做个性化Url
     * @param string $methodName 调用的成员函数名称
     * @param array $args 调用函数时传入的参数
     * @author Snake.L
     */
    public function __call ($methodName, $args)
    {
        if ('Action' == substr ($methodName, -6)) {
            $action = substr ($methodName, 0, strlen ($methodName) - 6);
            throw new \Core\Exception (sprintf ('Action "%s" does not exist and was not trapped in __call()', $action), 404);
        }

        throw new \Core\Exception (sprintf ('Method "%s" does not exist and was not trapped in __call()', $methodName), 500);
    }

    /**
     * 设置一个模板变量
     *
     * @param string $key
     * @param mix $val
     * @author Snake.L
     */
    public function assign ($key, $val)
    {
        \Core\Template::assignvar ($key, $val);
    }

    /**
     * 设置默认模版参数
     * @param type $tpl
     */
    protected function _setDefaultTplParams ()
    {
        $_front = \Core\Controller\Front::getInstance ();		
		\Core\Template::assignvar(array(
			'_modelName' => $_front->getModelName(),
			'_controllerName' => $_front->getControllerName(),
			'_actionName' => $_front->getActionName (),
			'_gdurl' => 'gd/index',
			'_resource' => SITEURL,
			'_pathroot' => \Core\Fun::getPathroot(),	
			'_host' => \Core\Comm\Util::getHostname(),
			'_footCountMes' => 
				array(
					'ip' =>  \Core\Fun::ip(),
					'name' =>  empty($_SESSION['name'])?NULL:$_SESSION['access_token'] ,
			)		
		));
    }

    /**
     *
     * 调用一个模板并显示
     *
     * @param string $tpl
     * @author Snake.L
     */
    public function display ($tpl, $type = false)
    {
        $this->_setDefaultTplParams ();
		header('Content-Type: text/html; charset=utf-8');
        \Core\Template::render ($tpl, $type);
    }
	
    /**
     *
     * 获取一个模板内容
     *
     * @param string $tpl
     * @author gionouyang
     */
    public function fetch ($tpl)
    {
        $this->_setDefaultTplParams ();
        return \Core\Template::render ($tpl, true);
    }
	
	public function makeHtml($tpl)
	{
		$body = $this->fetch($tpl);
		$fp = @fopen('index.html',"w");
        fwrite($fp,$body);
        fclose($fp);
	}
	
	public function getCacheId()
	{
		$params = $this->getParams();
		return sprintf('%X', crc32(implode('-', $params)));
	}
	
    /**
     * 统一抛出错误方法
     *
     * 业务逻辑错误 code < 0
     * 系统内部错误 code > 0
     * 比如 404 500
     * 数据库错误 会抛出 Core_Db_Exception ,code 为数据库错误 代码 大于0
     *
     * @param number $code
     * @param string $msg
     * @param array $params 扩展参数
     * @author Snake.L
     */
    public function error ($code, $msg, $params=array ())
    {
        \Core\Fun::error ($msg, $code, $params);
    }

    /**
     * 统一抛出AJAX错误方法
     *
     * @param number code < 0
     * @param string $msg
     * @param array $params 扩展参数
     * @author echoyang
     */
    public function exitJson ($code, $msg='', $params=array (), $callback=NULL)
    {
        \Core\Fun::exitJson ($code, $msg, $params, $callback);
    }

    /**
     * 统一返回 AJAX错误方法
     *
     * @param number code < 0
     * @param string $msg
     * @param array $params 扩展参数
     * @author echoyang
     */
    public function returnJson ($code, $msg='', $params=array (), $callback=NULL)
    {
        return \Core\Fun::returnJson ($code, $msg, $params, $callback);
    }

    /**
     * 通用的cfg保存方法
     */
    public function configsave ($config = null)
    {
        if (!isset ($config)) {
            $config = $this->getParam ('config', array ());
        }
		
        foreach ((array)$config as $_group => $__config)
        {
            \Core\Config::get (null, $_group);
            \Core\Config::add ($__config, $_group);
            \Core\Config::update ($_group);
        }
    }

    /**
     * showmsg 方法
     *
     * @param string $msg	提示信息内容
     * @param string $gourl 跳转地址
     * @param number $time	跳转等待时间
     * @param bool $button	是否停留并显示一个botton，点击后再跳转
     * @author Snake.L
     * @todo 暂时只有后台跳转模板，前台todo
     */
    public function showmsg ($msg, $gourl=-1, $time = null, $button=false)
    {
        \Core\Fun::showmsg ($msg, $gourl, $time, $button);
    }

    /**
     * 分页
     *
     * @param $num - 总数
     * @param $perpage - 每页数
     * @param $curpage - 当前页
     * @param $mpurl - 跳转的路径
     * @param $page - 最多显示多少页码
     * @return array
     * @author Snake.L
     */
    public static function multipage ($num, $perpage, $curpage, $mpurl, $page=5)
    {
		$mpurlArr = explode('/', $mpurl);
		foreach ($mpurlArr as $k=>$v)
			$mpurlArr[$k] = \Core\Fun::iurlencode($v);
		$mpurl = \Core\Fun::getPathroot() . implode('/', $mpurlArr);

        $returnArr = array ();
        $returnArr['total'] = '总记录数:' . $num;
        $realpages = 1;
        if ($num > $perpage) {
            $offset = 2;
            $pages = $realpages = @ceil ($num / $perpage);
            if ($page > $pages) {
                $from = 1;
                $to = $pages;
            } else {
                $from = $curpage - $offset;
                $to = $from + $page - 1;
                if ($from < 1) {
                    $to = $curpage + 1 - $from;
                    $from = 1;
                    ($to - $from < $page) && $to = $page;
                } elseif ($to > $pages) {
                    $from = $pages - $page + 1;
                    $to = $pages;
                }
            }
            $returnArr['totalpage'] = '共' . $pages . '页';
            ($curpage > 1) && $returnArr['prev'] = array ('上一页', $mpurl . 'page/' . ($curpage - 1), 'prev');
            ($curpage - $offset > 1 && $pages > $page) && $returnArr[] = array ('1 ...', $mpurl . 'page/1', 'first');
            $totalpages = [];
            for ($i = $from; $i <= $to; $i++)
            {
                $totalpages[] = ($i == $curpage) ? array ($i, '', '') : array ($i, $mpurl . 'page/' . $i, '');
            }
            $returnArr['pages'] = $totalpages;
            ($to < $pages) && $returnArr[] = array ('... ' . $realpages, $mpurl . 'page/' . $pages, 'last');
            ($curpage < $pages) && $returnArr['next'] = array ('下一页', $mpurl . 'page/' . ($curpage + 1), 'next');
        }
        $newreturnArr[] = $returnArr;
        return $newreturnArr;
    }

		/**
     * 特殊加密url,防止地址被解析不完全
     *
     * @param string $class
     * @return Class
     * @author
     */
    public static function iurlencode($key)
    {
        return \Core\Fun::iurlencode($key);
    }
	
	/**
	 *
	 * 修复浏览器XSS HACK 函数
	 * @param string $input 
	 * @return string
	 */
	private function hackXss($input)
	{
		if(is_array($input))
		{
			return $input;
		}
		else
		{
			return $this->removeXss($input);
		}
	}
	
	/**
	 *
	 * 修复浏览器XSS HACK 函数
	 * @param string $val 
	 * @return string
	 */
	private function removeXss($val)
	{
		$this->checkInjection($val);//注入检测
		//$val = $this->safeReplace($val);
		$val = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S', '', $val);

		$parm1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'blink', 'link', 'script', 'iframe', 'frame', 'frameset', 'ilayer', 'bgsound', 'base');
	
		$parm2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
	
		$parm = array_merge($parm1, $parm2); 
	
		for ($i = 0; $i < sizeof($parm); $i++) { 
			$pattern = '/'; 
			for ($j = 0; $j < strlen($parm[$i]); $j++) { 
				if ($j > 0) { 
					$pattern .= '('; 
					$pattern .= '(&#[x|X]0([9][a][b]);?)?'; 
					$pattern .= '|(&#0([9][10][13]);?)?'; 
					$pattern .= ')?'; 
				}
				$pattern .= $parm[$i][$j]; 
			}
			$pattern .= '/i';
			$val = preg_replace($pattern, '', $val); 
		}
       	return $val;
	}
	
	/**
 	 *  检查注入函数
 	 *
 	 * @param     string   $val  需要处理的内容
 	 * @return    string
     */
	private function checkInjection($val)
	{
		$notallow = "select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into";
		$notarr = array('select', 'insert', 'update', 'and', 'or', 'delete', 'union', 'into', '\'', '\*', '\.');
		if(preg_match($val, $notallow))
		{
			//Core_Util_Log::setFile('Request','Request vars are not allow : ' . $val);
			//exit('Request vars are not allow');
		}
		return str_replace($notarr, '', $val);
	}
	
	private function safeReplace($string) 
	{
		$string = str_replace('%20','',$string);
		$string = str_replace('%27','',$string);
		$string = str_replace('%2527','',$string);
		$string = str_replace('*','',$string);
		$string = str_replace('"','&quot;',$string);
		$string = str_replace("'",'',$string);
		$string = str_replace('"','',$string);
		$string = str_replace(';','',$string);
		$string = str_replace('<','&lt;',$string);
		$string = str_replace('>','&gt;',$string);
		$string = str_replace("{",'',$string);
		$string = str_replace('}','',$string);
		$string = str_replace("<!--{",'',$string);
		$string = str_replace('}-->','',$string);
		$string = str_replace('\\','',$string);
		return $string;
	}
	
	/*
	 * 简便条件
	 * @return array()
	 */
	protected function setWhereCondition(array $Arr = array())
	{
		$whereArr = array();
		$conditions = array();
		$_map = '';
		$_return = array();
		
		foreach($Arr AS $_arr)
		{
			$param = $this->getParam ($_arr[0]);
			if (!empty($param)) 
			{
				$_where = '' != $_arr[1] ? array ($_arr[0], $this->getParam ($_arr[0]), $_arr[1]) : 
										   array ($_arr[0], $this->getParam ($_arr[0]));
				$whereArr[] = $_where;
            	$conditions[$_arr[0]] = $this->getParam ($_arr[0]);
            	$this->assign ($_arr[0], $this->getParam ($_arr[0]));
			}
			else
			{
				$this->assign ($_arr[0], 0);
			}
			if(isset($_arr[2]))
			{
				$whereArr[] = '' != $_arr[1] ? array($_arr[0], $_arr[2], $_arr[1]) : array($_arr[0], $_arr[2]);
				$conditions[$_arr[0]] = $_arr[2];
				$this->assign ($_arr[0], $_arr[2]);
			}
		}
		$_return['where'] = $whereArr;
		$_return['conditions'] = $conditions;
		
		return $_return;
	}
	
	/*
	 * 获取swfupload上传控件
	 * @return assign
	 */
	protected function setSwfupload(array $swfArr = array())
	{
		foreach($swfArr AS $swf)
		{
			$_Params = array(
				'item_id' => $swf['item_id'], 
				'belong' => $swf['belong'],
				'button_id' => 'spanButton' . ucfirst($swf['id']),
				'progress_id' => 'divFileProgress' . ucfirst($swf['id']),
				'obj' => 'img' . $swf['obj'],
				'kindid' => $swf['kindid'],
				'isIndex' => $swf['isIndex']
			);
			$this->assign($swf['id'], Core_Fun_Swfupload::_build_upload($_Params)); //构建swfupload
		}
	}
	
	/*
	 * 获取swfupload上传控件
	 * @return string
	 */
	protected function setStringSwfupload(array $swfArr = array())
	{
		$_Params = array(
			'item_id' => $swfArr['item_id'], 
			'belong' => $swfArr['belong'],
			'button_id' => 'spanButton' . ucfirst($swfArr['id']),
			'progress_id' => 'divFileProgress' . ucfirst($swfArr['id']),
			'obj' => 'img' . $swfArr['obj'],
			'kindid' => $swfArr['kindid'],
			'isIndex' => $swfArr['isIndex']
		);
		return \Core\Fun\Swfupload::_build_upload($_Params); //构建swfupload
	}
	
	protected function setSeo($action)
	{
		$this->assign('seo', \Model\Nav::getNavSeo($action));
	}
}
