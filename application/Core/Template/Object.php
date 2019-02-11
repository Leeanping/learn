<?php
namespace Core\Template;
/**
 * Smarty Template Object
 * 注册的Smarty 对象 TO
 * 
 * @author Snake.L
 */
class Object
{
	/**
	 * <pre>
	 * Smarty获取配置文件钩子
	 * useage：
	 * <!--{TO->cfg key="key" group="basic"}-->
	 * </pre>
	 * @param array $params	获取的Smarty属性
	 * @return mix
	 * @author Snake.L
	 */
	public function cfg($params)
	{
		$key = $params['key'];
		$group = $params['group'] ? $params['group'] : 'basic';
		$default = isset($params['default']) ? $params['default'] : '';
		$isreplace = isset($params['isreplace']) ? 1 : 0;
		$value = \Core\Config::get($key, $group, $default, $isreplace);
		if($isreplace == 1){
			if($key == 'site_powerby'){
				$value = str_replace(' <a href="http://www.vpcv.com" target="_blank">致茂网络</a>技术支持', '', $value);
			}
			if($key == 'site_beian'){
				$value = str_replace('<a href="http://www.miitbeian.gov.cn" target="_blank">', '', $value);
				$value = str_replace("</a>", '', $value);
			}
		}
		return $value;
	}
	
	public function language($params)
	{
		$key = $params['key'];
		return \Core\Fun::Lang($key);
	}
	
	public function i18n($params)
	{
		$key = $params['key'];
		$group = $params['group'] ? $params['group'] : 'basic';
		return \Core\I18n::get($key, $group);
	}
	
	public function ad($params)
	{
		$_adModel = new \Model\Ad();
		$now = \Core\Fun::time();
		$tag = $params['tag'];
		$default = \Core\Fun::getPathroot() . $params['default'];
		$whereArr = array(
			array('tagname', $tag)
		);
		if(!empty($params['typeid']))
		{
			$whereArr[] = array('typeid', $params['typeid']);
		}
		$ad = $_adModel->queryOne('*', $whereArr);
		$imgurl = $ad['outurl'] != '' ? $ad['outurl'] : $ad['imgurl'];
		$href = $ad['linkurl'] == '' ? 'javascript:;' : $ad['linkurl'];
		$width = isset($params['width']) ? ' width="' . $params['width'] . '"' : 'width=100%;';
		$height = isset($params['height']) ? ' height="' . $params['height'] . '"' : '';
		return $ad ? '<a href="' . $href . '" target="_blank"><img style="float:left;" src="' . $imgurl . '"' . $width . $height . ' /></a>' : '';
	}
	
	/**
	 * <pre>
	 * Smarty获取插件钩子方法
	 * useage：
	 * <!--{TO->hack name="index"}-->
	 * </pre>
	 * @param array $params	获取的Smarty属性
	 * @return string
	 * @author Snake.L
	 */
	public function hack($params)
	{
		$name = (string)$params['name'];
		if($name)
		{
			return \Core\Fun::pluginHack($name);
		}
	}
}
