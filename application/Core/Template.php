<?php
namespace Core;
/**
 *
 * Template 封装
 *
 * @author Snake.L
 * @version $Id: Core_Template.php $
 * @package Model
 * @time 2013/01/28
 */
class Template
{
    /**
     * 存储模板变量的全局变量
     * @var array
     */
    private static $_VAR = array();

    /**
     * 以引用的方式，注册一个模板变量
     * 在PHP5中几乎无用
     * @param string $key
     * @param mix $value
     * @author Snake.L
     */
    public static function assignvarByref($key, &$value)
    {
        self::$_VAR[$key] = &$value;
    }

    /**
     * 注册一个模板变量
     *
     * @param string $key
     * @param mix $value
     * @author Snake.L
     */
    public static function assignvar($key, $value = null)
    {
        if(is_array($key))
        {
            foreach((array)$key as $_k => $_v)
            {
                self::assignvar($_k, $_v);
            }
        }
        else
        {
            self::$_VAR[(string)$key] = $value;
        }
    }

    /**
     * 获取一个已经注册的模板变量
     *
     * @param string $key
     * @param mix $default
     * @return mix
     * @author Snake.L
     */
    public static function getvar($key, $default = null)
    {
        if(isset(self::$_VAR[$key]))
        {
            return self::$_VAR[$key];
        }
        else
        {
            if($default)
            {
                return $default;
            }
            else
            {
                return null;
            }
        }
    }

    /**
     * Smarty对象
     * @var Smarty
     */
    private static $SMARTY = null;

    /**
     * 获取Smarty对象并且初始化
     * 只会获取一次
     *
     * @return Smarty
     * @author Snake.L
     */
    protected static function getSmarty()
    {
        if(null === self::$SMARTY)
        {
            require_once INCLUDE_PATH . 'Smarty/Smarty.class.php';
            $smarty = new \Smarty();
			$model = \Core\Controller\Front::getInstance()->getModelName();
            //一些设置
            $smarty->left_delimiter = '{{';
            $smarty->right_delimiter = '}}';
            $smarty->config_dir = CONFIG_PATH . 'Config';
            $smarty->compile_dir = CACHEDIR . '_templates_c';
            $smarty->cache_dir = CACHEDIR . '_view_c';
            $smarty->register_object('TO', new \Core\Template\Object());
            $smarty->template_dir = self::getTemplateDirs();
			$iscaching = \Core\Config::get('site_cache', 'site', false);
			if($iscaching)
			{
				if($model != 'admin')
				{
					$smarty->caching = true;
				}
			}
			
            //支持 &lt;!--{ 、 }--&gt; 、 -&gt;	在 可见可得的情况下友好
            $smarty->register_prefilter(array(__CLASS__, 'prefilter'));
			
            if(! file_exists($smarty->compile_dir))
            {
                \Core\Fun\File::makeDir($smarty->compile_dir);
            }
            if(! file_exists($smarty->cache_dir))
            {
                \Core\Fun\File::makeDir($smarty->cache_dir);
            }
			
            self::$SMARTY = $smarty;
        }
        return self::$SMARTY;
    }
	
    /**
     * 对Smarty模板编译前的处理
     * 支持 &lt;--{	}--&gt;	--&gt;
     *
     * @param string $source_content
     * @param Smarty $smarty
     * @return string
     * @author Snake.L
     */
    public static function prefilter($source_content, &$smarty)
    {
        return preg_replace_callback('/{{(.*)}}/U', function($match){
            return self::replacegt($match[1]);
        }, $source_content);
    }

    public static function replacegt($str)
    {
        return '{{' . stripcslashes(str_replace('-&gt;', '->', $str)) . '}}';
    }
	
	
    /**
     * 显示/解析模板
     * @param string $resource_name 模板路径
     * @author Snake.L
     */
    public static function render($resource_name, $type = false, $seo = true)
    {
        $smarty = self::getSmarty();
        $tDirs = self::getTemplateDirs();
        $compile_id = $tDirs[0];
        $_smarty_results = self::dealSmarty($smarty, $resource_name, $compile_id ,$seo );
        if($type)
        {
            return $_smarty_results;
        }
        else
        {
            echo $_smarty_results;
        }
    }

    public static function dealSmarty($smarty, $resource_name, $compile_id , $seo)
    {
        foreach(self::$_VAR as $key => $value)
        {
            $smarty->assign($key, $value);
        }

        //使用风格作为 $compile_id
        $_smarty_results = $smarty->fetch($resource_name, null, $compile_id);
		
        if($seo)
        {
            $_smarty_results = preg_replace_callback("!action=\"/([^\"]*)\"!iU", function($match){
                return 'action="' . \Core\Template::seoChange($match[1]) . '"';
            }, $_smarty_results);
            $_smarty_results = preg_replace_callback("!href=\"/([^\"]*)\"!iU", function($match){
                return 'href="' . \Core\Template::seoChange($match[1]) . '"';
            }, $_smarty_results);
            $_smarty_results = preg_replace_callback("!href=\'/([^\']*)\'!iU", function($match){
                return 'href="' . \Core\Template::resourceChange($match[1]) . '"';
            }, $_smarty_results);
            $_smarty_results = preg_replace_callback("!src=\"/([^\"]*)\"!iU", function($match){
                return 'src="' . \Core\Template::resourceChange($match[1]) . '"';
            }, $_smarty_results);
        }
		
        return $_smarty_results;
    }
	
    /**
     * 对Url进行Seo转换
     *
     * @param string $url
     * @return string
     * @author Snake.L
     */
    public static function seoChange($url)
    {
        //考虑 admin
        $front = \Core\Controller\Front::getInstance();
        $webroot = \Core\Controller\Front::getWebRoot();
		$weburl = \Core\Fun::getPathroot();
        if(! $url)
        {
            //return $webroot;
			return $weburl;
        }
		
		$hostname = \Core\Comm\Util::getHostname();
		$domin = \Core\Comm\Util::getDomin();
		if(in_array($hostname, $domin) && $hostname != 'www')
		{
			$url = preg_replace('/-/', '/', $url, 1);
			$url = str_replace($hostname . '/', $hostname . '-', $url);
		}
        //return $webroot . $url;
		
		return $weburl . $url;
    }

    /**
     * 对resource 目录自动加上资源配置目录
     *
     * @param string $url
     * @return string
     * @author Snake.L
     */
    public static function resourceChange($url)
    {
		if(preg_match('/^resource\//',$url) || preg_match('/^view\//',$url))
		{
			return SITEURL . $url;
		}
		return '/' . $url;
    }

    /**
     * 自己的实例
     * @var Core_Template
     */
    public static $_instance = null;

    /**
     * 获取单例对象
     * @return Core_Template
     * @author Snake.L
     */
    public static function getInstance()
    {
        if(null === self::$_instance)
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * 私有的构造函数
     * 禁止new
     */
    private function __construct()
    {

    }

    /**
     * 魔术方法钩子
     * 已移动到 Core_Template_*
     * 请不要使用
     * @param string $methodName
     * @return mix
     * @author Snake.L
     */
    public function __get($methodName)
    {
        if(preg_match('/_/', $methodName))
        {
            $_temp = array_map('ucfirst', $_t = explode('_', $methodName));
            $_class = 'Core_' . implode('_', array_splice($_temp, 0, - 1));
            $_call = array($_class, array_pop($_t));
            if(class_exists($_call[0], true))
            {
                if(method_exists($_call[0], $_call[1]))
                {
                    return @call_user_func($_call);
                }
            }
        }
        return '';
    }

    /**
     * 获取模板目录
     * @param string $style 风格
     * @return string
     * @author Snake.L
     * @todo 考虑风格设置
     */
    public static function getTemplateDirs()
    {
        $_return = array();
        $defStyle = 'default'; //默认皮肤
        $template = \Core\Config::get('template', 'template', 'default');
		$model = \Core\Controller\Front::getInstance()->getModelName();
		if($model == 'admin' || $model == 'business')
		{
			$_return[] = TEMPLATE_PATH;
		}
        else
		{
        	if(isset($template) && $template != $defStyle)
			{
            	$_return[] = TEMPLATE_PATH . 'show/' . $template;
			}
			else
			{
        		$_return[] = TEMPLATE_PATH . 'show/' . $defStyle;
			}
		}
        return $_return;
    }

}
