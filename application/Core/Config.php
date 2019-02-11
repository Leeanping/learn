<?php

namespace Core;

/**

 *

 * 统一配置文件管理方法

 *

 * @author Snake.L

 */

class Config

{



	public static $_data = null;



	/**

	 * 获取一个或者一组配置项

	 * @param string $key	配置key

	 * @param string $group	配置组

	 * @param mix $default	默认值

	 * @return mix

	 * @author Snake.L

	 */

	public static function get($key=null, $group='basic', $default=null)

	{
		if (!isset(self::$_data[$group]))

		{

			$file = self::_getcachefile($group);

			if (null === ($include = \Core\Cache::read($file)))

			{
				//if($group == 'basic' || $group == 'site')
				//{
					$include = array();

					$sql = "Select `cfgname`, `config` from ##__base_config where `group`='$group'";

					$_config = \Core\Db::fetchAll($sql, false);

					foreach($_config AS $_cfg)
					{
						$include[$_cfg['cfgname']] = $_cfg['config'];
					}
				//}
				//else
				//{
					//$sql = "Select `config` from ##__base_config where `group`='$group' limit 1";

					//$include = unserialize(Core_Db::getOne($sql, false));
				//}

				#rwrite to file;

				\Core\Cache::write($file, $include);

			}

			self::$_data[$group] = $include;

		}

		if (null === $key && isset(self::$_data[$group]))

		{

			return self::$_data[$group];

		}

		elseif ($key && isset(self::$_data[$group][$key]))

		{
			$config = self::$_data[$group][$key];
			return $config;

		}

		return $default;

	}



	/**

	 * 更新一组配置

	 * @param string $group 配置组

	 * @author Snake.L

	 */

	public static function updatecache($group='basic')

	{

		\Core\Cache::remove(self::_getcachefile($group), 'php');

	}



	/**

	 * 获取组配置的Cache文件

	 *

	 * @param string $group	配置组

	 * @return string

	 * @author Snake.L

	 */

	public static function _getcachefile($group)

	{

		return '_settings/_config/' . $group . '.php';

	}



	/**

	 * 更新/删除一个配置

	 * 只更新当前运行进程

	 *

	 * @param string $key	配置项的key

	 * @param string $value	配置项的值，当传入null的时候，表示删除配置项

	 * @param string $group	配置组

	 * @author Snake.L

	 */

	public static function set($key, $value=null, $group='basic')

	{

		if ( strlen($key) > 0 && strlen($group) > 0 )

		{

			if (null === $value)

			{

				unset(self::$_data[$group][$key]);

			}

			else

			{

				self::$_data[$group][$key] = $value;

			}

		}

	}



	/**

	 * 向一个配置组中增加一批配置

	 *

	 * @param array $configs	一批配置项，关联数组

	 * @param string $group		配置组

	 * @author Snake.L

	 */

	public static function add($configs=array(), $group='basic')

	{

		foreach ((array) $configs as $_key => $_value)

		{

			self::set($_key, $_value, $group);

		}

	}



	/**

	 * 更新一组配置到数据库

	 * 使用前需要先载入旧的配置项，否则旧的配置会丢失

	 * @param string $group 配置组

	 * @author Snake.L

	 */

	public static function update($group='basic')

	{

		//if($group == 'basic' || $group == 'site')
		//{
			$config = (array) self::get(null, $group);

			foreach($config AS $key => $cfg)
			{
				$hascfg = \Core\Db::fetchOne("select `config` from ##__base_config where `group`='$group' and `cfgname` = '$key'");
				if(isset($hascfg['config'])){
					$cfg = \Core\Db::sqlescape($cfg);
					$sql = "update ##__base_config Set `config`='$cfg' where `group`='$group' and `cfgname` = '$key' ";
					\Core\Db::execute($sql, true);
				}else{
					$cfg = \Core\Db::sqlescape($cfg);
					$sql = "insert ##__base_config Set `config`='$cfg', `group`='$group', `cfgname` = '$key' ";
					\Core\Db::execute($sql, true);
				}
			}
		//}
		//else
		//{
			//$config = serialize((array) self::get(null, $group));

			//$config = Core_Db::sqlescape($config);

			//$sql = "Replace Into ##__base_config Set `config`='$config' , `group`='$group' ";

			//Core_Db::query($sql, true);
		//}

		self::updatecache($group);

		unset(self::$_data[$group]);

	}



	/**

	 * 魔术方法，根据属性名称自动载入配置项

	 * 暂时没有用到

	 * @param string $_key

	 * @return mix

	 */

	public function __get($_key)

	{

		$_args = explode('_', $_key);

		if (count($_args) == 1)

		{

			return self::get(null, $_args[0]);

		}

		else if (count($_args) >= 2)

		{

			return self::get(implode('_', array_splice($_args, 1)), $_args[0]);

		}

	}



}