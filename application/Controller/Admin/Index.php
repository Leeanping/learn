<?php
namespace Controller\Admin;

use Core\Controller\Action;
/**
 * 后台首页
 *
 * @author Snake.L
 */
class Index extends Action
{
	private $_userModel = null;
	private $cUser;
	
	public function __construct($params)
	{
		parent::__construct($params);
		$this->_userModel = new \Model\User\Member();
	}
	
	public function indexAction()
	{
		$menulist = include CONFIG_PATH . 'menu.php';
		$usermenu = $this->getUserMenu($menulist);
		$this->assign('CHARSET', 'UTF-8');
		define('BASESCRIPT', \Core\Fun::getPathroot().'admin/');
		$this->assign('mainurl', BASESCRIPT.'index/home');
		$this->assign('version', VERSION);
		$this->assign('menulist', $_SESSION['isadmin'] == 1 ? $menulist : $usermenu);
		$this->assign('adminname', $_SESSION['adminname']);
		$this->assign('groupname', M('User_Group')->getGroupName($_SESSION['admingid']));
		if($_SESSION['isadmin'] == 1){
			$this->assign('modules', M('base_module')->select());
		}
		$this->display('admin/index_index.tpl');
	}

	public function homeAction()
	{
		$_articleModel = new \Model\Article();
		$this->assign('CHARSET', 'UTF-8');
		$this->assign('BASESCRIPT', 'index');
		$serverinfo = PHP_OS.' / PHP v'.PHP_VERSION;
		$serverinfo .= @ini_get('safe_mode') ? ' Safe Mode' : '';
		$this->assign('serverinfo', $serverinfo);
        if( false === strpos($_SERVER['SERVER_SOFTWARE'],"Apache"))
        {
           	$this->assign('phpversion',PHP_OS.' PHP/'.phpversion()); 
        }
		$this->assign('fileupload', @ini_get('file_uploads') ? ini_get('upload_max_filesize') : '<font color="red">不能上传</font>');
		$this->assign('magic_quote_gpc',MAGIC_QUOTE_GPC ? 'On' : 'Off');
		$this->assign('allow_url_fopen',ini_get('allow_url_fopen') ? 'On' : 'Off');

		$dbsize = 0;
		$query = \Core\Db::fetchAll("Show Table Status Like '##__%'");
		foreach($query AS $table)
		{
			$dbsize += $table['Data_length'] + $table['Index_length'];
		}
		$dbsize = $dbsize ? \Core\Fun::formatBytes($dbsize) : 'unknow';
		$version = \Core\Db::fetchOne("select VERSION() as version;");
		$statOn = \Core\Config::get('stat', 'basic', 0);
		$visits = M('stats')->getTodayStats();
		$ip = M('stats')->getTodayIP();
		$time = \Core\Fun::time();
		$this->assign('visits', $visits);
		$this->assign('ip', $ip);
		$this->assign('stat', $statOn);
		$this->assign('dbsize', $dbsize);
		$this->assign('dbversion', $version['version']);
		$this->assign('adminname', $_SESSION['adminname']);
		
		$this->display('admin/index_home.tpl');
	}

	//在线更新操作未完善版
	/*public function downloadAction(){
        $url = 'http://www.download.com/20171010.zip';
        ob_start();  
        readfile($url);  
        $content = ob_get_contents();  
        ob_end_clean();
        $size = strlen($content);  
        //文件大小  
        $save_dir = ROOT . 'upgrade/';
        $fp2 = @fopen($save_dir . 'down2017.zip', 'a');  
        fwrite($fp2, $content);  
        fclose($fp2);  
        unset($content, $url);

        $zip = new ZipArchive;
        if ($zip->open($save_dir . 'down2017.zip') === TRUE){  
			$zip->extractTo($save_dir . 'zip/');
			$zip->close();
		}  
    }*/
	
	private function getUserMenu($menulist)
	{
		$usermenu = array();
		$menu = M('User_Access')->getAccess($_SESSION['isadmin']);
		foreach($menulist AS $key => $value)
		{
			$menuson = array();
			foreach($value AS $idx => $val)
			{
				if(in_array($val['auth'], $menu))
				{
					$menuson[$idx]['url'] = $val['url'];
					$menuson[$idx]['name'] = $val['name'];
					$menuson[$idx]['auth'] = $val['auth'];
				}
			}
			$usermenu[$key] = $menuson;
		}
		return $usermenu;
	}
}
