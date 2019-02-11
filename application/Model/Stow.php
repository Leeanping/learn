<?php
namespace Model;

use Core\Model;
/**
 * CD
 * 收藏模型
 * @author: Snake.L
 */
class Stow extends Model
{
    /**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'user_stow';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'uid', 'stowid', 'stowtitle', 'addtime', 'stowtype', 'useable', 'ip');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function checkStow($uid, $stowid, $stowtype)
	{
		$num = $this->getCount(array(array('uid', $uid), array('stowid', $stowid), array('stowtype', $stowtype)));
		if($num > 0)
			return false;
		else
			return true;
	}
	
	public function getNumByUid($uid)
	{
		return $this->getCount(array(array('uid', $uid)));
	}
}
