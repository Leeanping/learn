<?php
class Loader
{
	private static $_obj;
	
	public static function M($name){
		return self::_make($name, 'model');
	}
	
	public static function T($name){
		return self::_make($name, 'tag');
	}
	
	protected static function _make($name, $type) {
		if($type == 'model'){
			$cname = ucfirst($type) . '_' . ucfirst($name);
			if(file_exists(INCLUDE_PATH . 'Model/' . str_replace('_', DIRECTORY_SEPARATOR, ucfirst($name)) . '.php')){
				if(!isset(self::$_obj[$cname])) {
					list($mod, $mname) = explode('_', $name);
					if($mod && $mname){
						$className = '\\' . 'Model' . '\\' . ucfirst($mod) . '\\' . ucfirst($mname);
					}else{
						$className = '\\' . 'Model' . '\\' . ucfirst($name);
					}
					
					self::$_obj[$cname] = new $className();
				}
				return self::$_obj[$cname];
			}else{
				$model = new \Core\Model();
				return $model->getTableName($name);
			}
		}else{
			$cname = ucfirst($type) . '_' . ucfirst($name);
			if(!isset(self::$_obj[$cname])) {
				$className = '\\' . 'Tag' . '\\' . ucfirst($name);
				self::$_obj[$cname] = new $className();
			}
			return self::$_obj[$cname];
		}
	}
	
	public static function autoload($class){
		$path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	    $file = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
	    if (file_exists($file)) {
	        require_once $file;
	    }
	}

	public static function _loadfile($filename){
		require_once(INCLUDE_PATH . 'Helper' . DIRECTORY_SEPARATOR . $filename);
	}
}
?>