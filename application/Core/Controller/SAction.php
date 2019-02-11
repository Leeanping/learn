<?php
namespace Core\Controller;

/**

 * Core_Controller_SAction 基类

 * Swfupload Controller继承自此类

 *

 * @author Snake.L

 */

class SAction

{



    protected $_classMethods;

    protected $_params;



    /**

     * 构造函数

     * @param array $params Pathinfo中附带的请求参数

     * @author Icehu

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

     * @author Icehu

     */

    public function getParam ($key, $default = null)

    {

		if (isset($this->_params[$key]))

		{

			return $this->_params[$key];

		}

		elseif (isset($_GET[$key]))

		{

			return $_GET[$key];

		}

		elseif (isset($_POST[$key]))

		{

			return $_POST[$key];

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

     * @author Icehu

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

     * @author Icehu

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

     * @author Icehu

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

     * @author Icehu

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

     * @author Icehu

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

     * @author Icehu

     */

    protected function getModelName ()

    {

        return \Core\Controller\Front::getInstance ()->getModelName ();

    }



    /**

     * 获得Controller Name

     * @return string

     * @author Icehu

     */

    protected function getControllerName ()

    {

        return \Core\Controller\Front::getInstance ()->getControllerName ();

    }



    /**

     * 获得Action Name

     * @return string

     * @author Icehu

     */

    protected function getActionName ()

    {

        return \Core\Controller\Front::getInstance ()->getActionName ();

    }



    /**

     * 获取一个Cookie值

     * @param string $name

     * @return mix

     * @author Icehu

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

     * @author Icehu

     */

    protected function setCookie ($name, $value, $kptime=0, $httponly=false)

    {

        \Core\Fun::setcookie ($name, $value, $kptime, $httponly);

    }



    /**

     * 获取SERVER变量

     * @param string $name

     * @return string

     * @author Icehu

     */

    protected function getServer ($name)

    {

        return $_SERVER[$name];

    }



    /**

     * 分发前执行的操作

     * 如有需要请重载

     * @author Icehu

     */

    public function preDispatch ()

    {

    	

    }



    /**

     * 分发完成后执行的操作

     * 如有需要请重载

     * @author Icehu

     */

    public function postDispatch ()

    {



    }



    /**

     * 分发请求到Action

     * @param string $action

     * @author Icehu

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

     * @author Icehu

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

     * @author Icehu

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

        @include(CONFIG_PATH.'version.php');		

		\Core\Template::assignvar(array(

			'_modelName' => $_front->getModelName(),

			'_controllerName' => $_front->getControllerName(),

			'_actionName' => $_front->getActionName (),

			'_gdurl' => 'index.php'.\Core\Fun::getPathinfoPre().'gd',

			'_resource' => SITEURL,

			'_pathroot' => \Core\Fun::getPathroot(),	

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

     * @author Icehu

     */

    public function display ($tpl)

    {

        $this->_setDefaultTplParams ();

		header('Content-Type: text/html; charset=utf-8');

        \Core\Template::render ($tpl);

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

     * @author Icehu

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

     * @author Icehu

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

     * @author lvfeng

     */

    public static function multipage ($num, $perpage, $curpage, $mpurl, $page=5)

    {

		$mpurlArr = explode('/', $mpurl);

		foreach ($mpurlArr as $k=>$v)

			$mpurlArr[$k] = \Core\Fun::iurlencode($v);

		$mpurl = implode('/', $mpurlArr);



        $returnArr = array ();

        $returnArr[] = array ('总记录数:' . $num);

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



            ($curpage > 1) && $returnArr[] = array ('上一页', $mpurl . 'page/' . ($curpage - 1), 'prev');

            ($curpage - $offset > 1 && $pages > $page) && $returnArr[] = array ('1 ...', $mpurl . 'page/1', 'first');

            for ($i = $from; $i <= $to; $i++)

            {

                $returnArr[] = ($i == $curpage) ? array ($i, '', '') : array ($i, $mpurl . 'page/' . $i, '');

            }

            ($to < $pages) && $returnArr[] = array ('... ' . $realpages, $mpurl . 'page/' . $pages, 'last');

            ($curpage < $pages) && $returnArr[] = array ('下一页', $mpurl . 'page/' . ($curpage + 1), 'next');

        }

        return $returnArr;

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



}

