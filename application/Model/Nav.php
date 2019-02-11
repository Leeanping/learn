<?php
namespace Model;

use Core\Model;
/**
 * 导航栏
 * @author snake.L
 */
class Nav extends Model
{

    /**
     * 数据库表名
     * @var type string
     */
    protected $_tableName = 'base_nav';
    /**
     * 数据库字段名
     * @var type array
     */
    protected $_fields = array (
        'id',
        'parentid',
        'name',
        'ename',
        'icon',
        'system',
        'type',
        'displayorder',
        'newwindow',
        'useable',
		'body',
		'seotitle',
		'keywords',
		'description',
        'moduleid',
        'style',
        'tempindex',
        'templist',
        'temparticle',
        'perpage',
        'head',
        'pinyin',
        'isview'
    );
    /**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
    /**
     * 导航类型
     */
    const TYPE_MAIN = 0;
    const TYPE_TOP = 1;
    const TYPE_FOOT = 2;
    public $TYPE = array (
        self::TYPE_MAIN => '主导航',
        self::TYPE_TOP => '顶部导航',
        self::TYPE_FOOT => '底部导航'
    );

    var $_cato;
    var $_topid;
    /**
     * 缓存文件
     * @var type
     */
    public static $_cached_nav = null;

    /**
     * 获取导航栏
     * @param type $type
     */
    public static function getNavByType ($type)
    {
        if (!self::$_cached_nav) {
            self::_makeCache ();
        }
        return isset (self::$_cached_nav[$type]) ? self::$_cached_nav[$type] : null;
    }

    /**
     * 添加
     * @param array $nav
     * @return insertid|true|false 返回insertid or add 里的主键 否则返回 true or false
     */
    public static function addNav ($nav)
    {
        self::updatecache ();
        $obj = new self();
        return $obj->add ($nav);
    }

    /**
     * 切换手机版开关
     * @param bool $onoff
     */
    public static function changeWapNav ($onoff)
    {
        self::updatecache ();
        $obj = new self();
        $wapNav = $obj->queryOne ('*', array (array ('action', 'wap')));
        $nav['id'] = $wapNav['id'];
        $nav['useable'] = $onoff ? true : false;
        $obj->editNav ($nav);
    }

    /**
     * 修改
     * @param array $nav
     * @return bool
     */
    public function editNav ($nav)
    {
        self::updatecache ();
        return $this->update ($nav);
    }

    /**
     * 删除
     * @param array $ids
     * @return bool
     */
    public function deleteNav ($ids)
    {
        self::updatecache ();
        M('article')->deleteByNavIds($ids);
        return $this->remove ($ids);
    }

    /**
     * 获得列表
     *
     * @param array $whereArr
     * @param array $orderByArr
     * @param array $limitArr
     * @return array
     */
    public function getNavList ($type, $pid = 0, $useable = true)
    {
		$pid = (int) $pid;
        $where = "parentid = '$pid'";
        if($type !== false){
            $where .= " and type = '$type'";
        }
        if($useable){
            $where .= " and useable = '1'";
        }

		return $this->where($where)->order('displayorder ASC')->select();
    }
	
	public function getNavTree($type, $pid = 0, $useable = true)
	{
		$navs = $this->getNavList($type, $pid, $useable);
		foreach($navs AS $idx => $nav)
		{
			$navs[$idx]['son'] = $this->getNavList($type, $nav['id'], $useable);
		}
		return $navs;
	}

    public function getParendIds($parentid)
    {
        $parent = $this->where('id', $parentid)->find();
        $this->_cato = '';
        $this->_cato .= ',' . $parent['parentid'];
        $this->getParendId($parent['parentid']);
        return $parentid . $this->_cato;
    }
    
    public function getParendId($parentid)
    {
        $parent = $this->where('id', $parentid)->find();
        if($parent['parentid'] != 0)
        {
            $this->_cato .= ',' . $parent['parentid'];
            $this->getParendId($parent['parentid']);
        }
    }

    public function getTopId($id){
        $parentid = $this->where('id', $id)->value('parentid');
        if($parentid == 0){
            $this->_topid = $id;
        }else{
            $this->getTopId($parentid);
        }

        return $this->_topid;
    }

    /**
     * 写缓存
     */
    public static function _makeCache ()
    {
        $obj = new self();
        $_cache_file = self::_getcachefile ();
        if (null === ($include = \Core\Cache::read ($_cache_file))) {
            $sql = 'SELECT * FROM `' . $obj->getTableName () . '` WHERE `useable` = 1 AND parentid = 0 ORDER BY `displayorder`';
            $_list = $obj->fetchAll ($sql);
			
            $_cacheNav = array ();
            foreach ($_list as $nav)
            {
                $nav['son'] = $obj->getNavList($nav['type'], $nav['id']);
                $_cacheNav[$nav['type']][] = $nav;
            }
            $_expire = 60 * 60;
            \Core\Cache::write ($_cache_file, $_cacheNav, $_expire);
            $include = \Core\Cache::read ($_cache_file);
        }
        self::$_cached_nav = $include;
    }

    /**
     * 更新缓存
     */
    public static function updatecache ()
    {
        \Core\Cache::remove (self::_getcachefile ());
        if (isset (self::$_cached_nav)) {
            unset (self::$_cached_nav);
        }
    }

    /**
     * 获取Cache文件
     */
    public static function _getcachefile ()
    {
        return '_file/_nav_list.php';
    }

    public function getNavByPinyin($pinyin)
    {
        $nav = $this->queryOne('*', array(array('pinyin', $pinyin)));

        return $nav;
    }
}