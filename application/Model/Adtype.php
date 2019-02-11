<?php
namespace Model;

use Core\Model;
/*
 * 广告分类模型
 */
class Adtype extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'base_ad_type';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'name', 'tag', 'isslide', 'useable');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ();
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';

    public function deleteById($ids)
    {
    	if(empty($ids))
    	{
    		return fasle;
    	}
    	else
    	{
    		foreach($ids AS $id)
	    	{
	    		$tag = $this->where('id', $id)->getField('tag');
	    		$ads = M('ad')->where('tagname', $tag)->select();
	    		foreach($ads AS $ad)
	    		{
	    			\Core\Fun\File::delete(BASEROOT . $ad['imgurl']);
	    			M('ad')->remove($ad['id']);
	    		}
	    		M('adtype')->remove ($id);
	    	}

	    	return true;
    	}
    }

    public function getAdTypeList()
    {
    	return $this->where('useable', 1)->select();
    }

    public function getAdTypeOption()
    {
    	$types = $this->getAdTypeList();
    	$_optionArr = array();
    	foreach($types AS $type)
    	{
    		$_optionArr[$type['tag']] = addslashes($type['name']);
    	}

    	return $_optionArr;
    }

    public function getAdTypeOne($field, $tag)
    {
    	$type = $this->where('tag', $tag)->getField($field);

    	return $type;
    }

    public function isCheck($tag)
    {
    	$num = $this->where('tag', $tag)->getCount();
    	$r = true;
    	if($num > 0)
    	{
    		$r = false;
    	}

    	return $r;
    }
}
?>