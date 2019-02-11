<?php
namespace Core\Controller;
/**
 * 前端控制器
 * 继承了前端控制器和Router功能
 * 尽可能的轻量
 *
 * @author Snake.L
 */
class Front
{

	protected $_pathInfo = null;
	protected $_ext = null;
	protected $_baseUrl = null;
	protected $_requestUri = null;
	protected $_params = array();
	protected $_modelKey = '__Model';
	protected $_controllerKey = '__Controller';
	protected $_actionKey = '__Action';
	protected $_model = 'index';
	protected $_controller = 'index';
	protected $_action = 'index';
	protected $_applicationpath = '';
	protected $_pluginpath = '';

	protected $_models = array();

	const URI_DELIMITER = '/';


	private static $_instance;

	/**
	 *
	 * 单例模式
	 * 获取前端控制器对象
	 *
	 * @author Snake.L
	 * @return Core_Controller_Front
	 */
	public static function getInstance()
	{
		if (self::$_instance)
		{
			return self::$_instance;
		}
		self::$_instance = new self();
		return self::$_instance;
	}

	/**
	 * 私有的构造函数，不允许new
	 * @author Snake.L
	 */
	private function __construct()
	{

	}

	/**
	 * 设置Application的目录 以 / 结尾的
	 * @param string $path
	 * @author Snake.L
	 */
	public function setApplicationPath($path)
	{
		$this->_applicationpath = $path;
	}

	public function setPluginPath($path)
	{
		$this->_pluginpath = $path;
	}

	/**
	 * 设置允许的Model列表
	 * @param array $models
	 * @author Snake.L
	 */
	public function registerModels($models)
	{
		$this->_models = $models;
	}

	/**
	 * 设置框架的Model/Controller/Action以及请求参数用于重新分发
	 * @param string $action	Action名称
	 * @param string $controller	Controller名称
	 * @param string $model	Model名称
	 * @param array|null $params	请求参数
	 * @author Snake.L
	 */
	public function setdparams($action, $controller=null, $model=null, $params=null)
	{
		$action && $this->_action = $action;
		$controller && $this->_controller = $controller;
		$model && $this->_model = $model;
		$params && $this->_params += $params;
	}

	/**
	 * 分发请求到控制器
	 * @throw Core_Exception
	 * @author Snake.L
	 */
	public function dispatch()
	{
		$pathinfo = $this->getPathInfo();
		$this->match($pathinfo);
		if( 'swfupload' == $this->_model)
		{
			//进入上传文件分支
			$controller = array_map('ucfirst', explode('_', $this->_controller));
			$className = '\\' . 'Controller' . '\\' . ucfirst($this->_model) . '\\' . implode('_', $controller);
			if (class_exists($className))
			{
				$class = new $className($this->_params);
				if (!$class instanceof \Core\Controller\SAction)
				{
					throw new \Core\Exception('Controller "' . $className . '" is not an instance of Core_Controller_Action', 404, $this->_params);
				}
				$method = strtolower($this->_action) . 'Action';
				$class->dispatch($method);
			}
			else
			{
				throw new \Core\Exception('Controller "' . $className . '" is not correct', 404, $this->_params);
			}
		}
		else
		{
			$controller = array_map('ucfirst', explode('_', $this->_controller));
			$className = '\\' . 'Controller' . '\\' . ucfirst($this->_model) . '\\' . implode('_', $controller);
			if (class_exists($className))
			{
				$class = new $className($this->_params);
				if (!$class instanceof \Core\Controller\Action)
				{
					throw new \Core\Exception('Controller "' . $className . '" is not an instance of Core_Controller_Action', 404, $this->_params);
				}
				$method = strtolower($this->_action) . 'Action';
				$class->dispatch($method);
			}
			else
			{
				throw new \Core\Exception('Controller "' . $className . '" is not correct', 404, $this->_params);
			}
		}
	}

	/**
	 * 匹配Pathinfo，分析Model/Controller/Action 和请求参数
	 * @param string $path	Pathinfo
	 * @return Core_Controller_Front
	 * @author Snake.L
	 */
	public function match($path)
	{		
		$path = trim($path, self::URI_DELIMITER);
		//忽略 后缀
		$hasExt = strrpos($path, '.');
		if(substr($path, -6) == 'uc.php')	//fix uc.php
		{
			$path = substr($path, 0, -4);
		}
		$params = array();
		$model = $this->routeModel();
		$controller = $this->routeController();
		$view = $this->routeView();
		if($model != '' && $controller != '' && $view != '')
		{
			$this->_model = $params[$this->_modelKey] = $model;
			$this->_controller = $params[$this->_controllerKey] = $controller;
			$this->_action = $params[$this->_actionKey] = $view;
		}
		else
		{
			if ($path)
			{
				$path = explode(self::URI_DELIMITER, $path);
				if (count($path) && !empty($path[0]) && in_array($path[0], $this->_models))
				{
					$this->_model = $params[$this->_modelKey] = array_shift($path);
				}
				if (count($path) && !empty($path[0]))
				{
					$this->_controller = $params[$this->_controllerKey] = array_shift($path);
				}
				if (count($path) && !empty($path[0]))
				{
					$this->_action = $params[$this->_actionKey] = array_shift($path);
				}
				if ($numSegs = count($path))
				{
					for ($i = 0; $i < $numSegs; $i = $i + 2)
					{
						$key = urldecode($path[$i]);
						$val = isset($path[$i + 1]) ? urldecode($path[$i + 1]) : null;
						$key = \Core\Fun::iurldecode($key);
						$val = \Core\Fun::iurldecode($val);
						$params[$key] = (isset($params[$key]) ? (array_merge((array) $params[$key], array($val))) : $val);
					}
				}
			}
		}
		$this->setParams($params);
		return $this;
	}
	
	/**
	 * 获取模型
	 */
	public function routeModel() 
	{
		$m = $this->getParam('m', '');
		$m = $this->safeDeal($m);
		return is_string($m) ? $m : '';
	}

	/**
	 * 获取控制器
	 */
	public function routeController() 
	{
		$c = $this->getParam('c', '');
		$c = $this->safeDeal($c);
		return is_string($c) ? $c : '';
	}

	/**
	 * 获取action
	 */
	public function routeView() 
	{
		$v = $this->getParam('v', '');
		$v = $this->safeDeal($v);
		return is_string($v) ? $v : '';
	}
	
	/**
	 * 获取当前Model名称
	 * @return string
	 * @author Snake.L
	 */
	public function getModelName()
	{
		return $this->_model;
	}

	/**
	 * 获取当前Controller名称
	 * @return string
	 * @author Snake.L
	 */
	public function getControllerName()
	{
		return $this->_controller;
	}

	/**
	 * 获取当前Action名称
	 * @return string
	 * @author Snake.L
	 */
	public function getActionName()
	{
		return $this->_action;
	}

	/**
	 * 设置请求参数
	 * @param array $params
	 * @author Snake.L
	 */
	public function setParams($params)
	{
		$this->_params = $params;
	}

	/**
	 * 获取请求参数
	 * @param string $name
	 * @param mix $default 默认值
	 * @return string
	 */
	public function getParam($key ,$default = null)
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

	/**
	 * 获取所有请求参数
	 * @return array
	 */
	public function getParams()
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

	/**
	 * 获取Http头信息
	 * @param string $header 浏览器头名称
	 * @return string
	 */
	public function getHeader($header)
	{
		// Try to get it from the $_SERVER array first
		$temp = 'HTTP_' . strtoupper(str_replace('-', '_', $header));
		if (!empty($_SERVER[$temp]))
		{
			return $_SERVER[$temp];
		}

		// This seems to be the only way to get the Authorization header on
		// Apache
		if (function_exists('apache_request_headers'))
		{
			$headers = apache_request_headers();
			if (!empty($headers[$header]))
			{
				return $headers[$header];
			}
		}

		return false;
	}

	/**
	 * 判断请求是否来自AJAX
	 * @return bool
	 */
	public function inAjax()
	{
		$_return = false;
		if ($this->getHeader('X_REQUESTED_WITH') == 'XMLHttpRequest')
		{
			$_return = 1;
		}
		if ($_tmp = $this->getParam('inajax'))
		{
			$_return = $_tmp;
		}
		return $_return;
	}

	/**
	 * 获取BaseUrl
	 *
	 * @return string
	 * @author Snake.L
	 */
	public function getBaseUrl()
	{
		if (null === $this->_baseUrl)
		{
			$this->setBaseUrl();
		}

		return $this->_baseUrl;
	}

	/**
	 * 设置BaseUrl
	 * @param string $baseUrl
	 * @return Core_Controller_Front
	 * @author Snake.L
	 */
	public function setBaseUrl($baseUrl = null)
	{
		if ((null !== $baseUrl) && !is_string($baseUrl))
		{
			return $this;
		}

		if ($baseUrl === null)
		{
			$filename = (isset($_SERVER['SCRIPT_FILENAME'])) ? basename($_SERVER['SCRIPT_FILENAME']) : '';

			if (isset($_SERVER['SCRIPT_NAME']) && basename($_SERVER['SCRIPT_NAME']) === $filename)
			{
				$baseUrl = $_SERVER['SCRIPT_NAME'];
			}
			elseif (isset($_SERVER['PHP_SELF']) && basename($_SERVER['PHP_SELF']) === $filename)
			{
				$baseUrl = $_SERVER['PHP_SELF'];
			}
			elseif (isset($_SERVER['ORIG_SCRIPT_NAME']) && basename($_SERVER['ORIG_SCRIPT_NAME']) === $filename)
			{
				$baseUrl = $_SERVER['ORIG_SCRIPT_NAME']; // 1and1 shared hosting compatibility
			}
			else
			{
				// Backtrack up the script_filename to find the portion matching
				// php_self
				$path = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : '';
				$file = isset($_SERVER['SCRIPT_FILENAME']) ? $_SERVER['SCRIPT_FILENAME'] : '';
				$segs = explode('/', trim($file, '/'));
				$segs = array_reverse($segs);
				$index = 0;
				$last = count($segs);
				$baseUrl = '';
				do
				{
					$seg = $segs[$index];
					$baseUrl = '/' . $seg . $baseUrl;
					++$index;
				}
				while (($last > $index) && (false !== ($pos = strpos($path, $baseUrl))) && (0 != $pos));
			}

			// Does the baseUrl have anything in common with the request_uri?
			$requestUri = $this->getRequestUri();
			if (0 === strpos($requestUri, $baseUrl))
			{
				// full $baseUrl matches
				$this->_baseUrl = $baseUrl;
				return $this;
			}
			$dirname = str_replace(DIRECTORY_SEPARATOR , '/', dirname($baseUrl));
			if (0 === strpos($requestUri, $dirname))
			{
				// directory portion of $baseUrl matches
				$this->_baseUrl = rtrim($dirname, '/');
				return $this;
			}

			if (!strpos($requestUri, basename($baseUrl)))
			{
				// no match whatsoever; set it blank
				$this->_baseUrl = '';
				return $this;
			}

			// If using mod_rewrite or ISAPI_Rewrite strip the script filename
			// out of baseUrl. $pos !== 0 makes sure it is not matching a value
			// from PATH_INFO or QUERY_STRING
			if ((strlen($requestUri) >= strlen($baseUrl))
					&& ((false !== ($pos = strpos($requestUri, $baseUrl))) && ($pos !== 0)))
			{
				$baseUrl = substr($requestUri, 0, $pos + strlen($baseUrl));
			}
		}

		$this->_baseUrl = rtrim($baseUrl, '/');
		return $this;
	}

	/**
	 * 获取REQUEST_URI
	 * 兼容Apache 和 IIS
	 *
	 * @return string
	 * @author Snake.L
	 */
	public function getRequestUri()
	{
		if (empty($this->_requestUri))
		{
			$this->setRequestUri();
		}

		return $this->_requestUri;
	}

	/**
	 * 设置REQUEST_URI
	 *
	 * @param string $requestUri
	 * @return Core_Controller_Front
	 * @author Snake.L
	 */
	public function setRequestUri($requestUri = null)
	{
		$parseUriGetVars = false;
		if ($requestUri === null)
		{
			if (isset($_SERVER['HTTP_X_REWRITE_URL']))
			{ // check this first so IIS will catch
				$requestUri = $_SERVER['HTTP_X_REWRITE_URL'];
			}
			elseif (isset($_SERVER['REQUEST_URI']))
			{
				$requestUri = $_SERVER['REQUEST_URI'];
			}
			elseif (isset($_SERVER['ORIG_PATH_INFO']))
			{ // IIS 5.0, PHP as CGI
				$requestUri = $_SERVER['ORIG_PATH_INFO'];
				if (!empty($_SERVER['QUERY_STRING']))
				{
					$requestUri .= '?' . $_SERVER['QUERY_STRING'];
				}
			}
			else
			{
				return $this;
			}
		}
		elseif (!is_string($requestUri))
		{
			return $this;
		}
		else
		{
			if (false !== ($pos = strpos($requestUri, '?')))
			{
				$parseUriGetVars = substr($requestUri, $pos + 1);
			}
		}

		if ($parseUriGetVars)
		{
			// Set GET items, if available
			parse_str($parseUriGetVars, $_GET);
		}
        //fix nginx
		if('?' == \Core\Fun::getPathinfoPre())
		{
			$requestUri = str_replace("index.php?","index.php/",$requestUri);
		}
		$_url = parse_url($requestUri);
		$requestUri = $_url['path'];
		$this->_requestUri = $requestUri;
		$this->_ext = str_replace($requestUri, '', $_url['path']);
		return $this;
	}

	/**
	 * 获取Pathinfo
	 * @return string
	 * @author Snake.L
	 */
	public function getPathInfo()
	{
		if (empty($this->_pathInfo))
		{
			$this->setPathInfo();
		}

		return $this->_pathInfo;
	}

	/**
	 * 设置Pathinfo
	 * @param string $pathInfo
	 * @return Core_Controller_Front
	 * @author Snake.L
	 */
	public function setPathInfo($pathInfo = null)
	{
		if ($pathInfo === null)
		{
			$baseUrl = $this->getBaseUrl();

			if (null === ($requestUri = $this->getRequestUri()))
			{
				return $this;
			}

			// Remove the query string from REQUEST_URI
			if ($pos = strpos($requestUri, '?'))
			{
				$requestUri = substr($requestUri, 0, $pos);
			}

			if ((null !== $baseUrl)
					&& (false === ($pathInfo = substr($requestUri, strlen($baseUrl)))))
			{
				// If substr() returns false then PATH_INFO is set to an empty string
				$pathInfo = '';
			}
			elseif (null === $baseUrl)
			{
				$pathInfo = $requestUri;
			}
		}
		//fix iis url gbk
		if(isset($_SERVER['SERVER_SOFTWARE']) && FALSE!==strpos($_SERVER['SERVER_SOFTWARE'],"Microsoft-IIS"))
		{
			$pathInfo = iconv("GBK","UTF-8",$pathInfo);
		}
		$this->_pathInfo = (string) $pathInfo;
		return $this;
	}

	/**
	 * 全局Cache 变量
	 * @var array
	 */
	private static $data = null;

	/**
	 * 获取网站根目录
	 * @return string
	 * @author Snake.L
	 */
	public static function getWebRoot()
	{
		if (!isset(self::$data['webroot']))
		{
			$front = self::getInstance();
			self::$data['webroot'] =
					preg_match('!index\.php$!i', $_tmp = $front->getBaseUrl()) ? substr($_tmp, 0, -9) : $_tmp . '/';
		}
		return self::$data['webroot'];
	}
	
	private function safeDeal($str) 
	{
		return str_replace(array('/', '.'), '', $str);
	}
}