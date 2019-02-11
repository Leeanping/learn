<?php
namespace Model;

use Core\Model;
/*
 * 预约模型
 */
class Booking extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'user_booking';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'kind', 'destination', 'starttime', 'day', 'people', 'money', 'content', 'realname', 'telephone', 'company', 'qq', 'addtime', 'useable');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';

    public function isBooking($dermid, $year, $month, $day)
    {
        $isbooking = $this->getOne('isbooking', array(array('dermid', $dermid), array('year', $year), array('month', $month), array('day', $day)));
        if($isbooking)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function myBooking($dermid, $uid, $year, $month, $day)
    {
        $id = $this->getOne('id', array(array('dermid', $dermid), array('year', $year), array('month', $month), array('day', $day), array('uid', $uid)));
        if($id)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}
?>