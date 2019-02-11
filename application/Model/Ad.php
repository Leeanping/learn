<?php
namespace Model;

use Core\Model;
/*
 * 广告模型
 */
class Ad extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'base_ad';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'typeid', 'tagname', 'adname', 'linkurl', 'imgurl', 'addtime', 
							   'outurl', 'starttime', 'endtime', 'bigurl', 'shownum', 'sort');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ('shownum');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function editAd($info)
	{
		return $this->update($info, $this->_fields, $this->UnsetColumu);
	}
	
	public function updateShow($id)
	{
		$data['id'] = $id;
		$data['shownum'] = 1;
		return $this->editAd($data);
	}
	
	public function checkAd($tagname, $isfocus = false)
	{
		$num = $this->where('tagname', $tagname)->getCount();
		if($num > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function getAdIdByTagName($tagname)
	{
		$id = $this->where('tagname', $tagname)->getField('id');
		return $id;
	}
	
	public function getAdList($tagname, $num, $typeid = 0)
	{
		$where = "tagname = '$tagname'";
		if($typeid){
			$where .= " and typeid = '$typeid'";
		}
		$fieldArr = array('id', 'adname', 'linkurl', 'imgurl', 'outurl');
		if(empty($num))
		{
			return $this->field($fieldArr)->where($where)->order('sort asc')->select();
		}
		else
		{
			return $this->field($fieldArr)->where($where)->order('sort asc')->limit(0, $num)->select();
		}
	}
}
?>