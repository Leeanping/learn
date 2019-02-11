<?php
namespace Model;

use Core\Model;
/**
 * ST
 * 分类模型
 * @author: Snake.L
 */
class Category extends Model
{
	var $_pre = '--';
	var $_options;
	var $_cato;
	var $_sono;
	
    /**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'base_category';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'pid', 'catname', 'sort', 'useable', 'itemid');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
    public function getCategoryList($catid = 0, $itemid = 1, $num = '', $useable = true)
    {
		$catid = (int) $catid;
		$whereArr[] = array('pid', $catid);
		$whereArr[] = array('itemid', $itemid);
		$useable && $whereArr[] = array('useable', 1);
		if(empty($num))
		{
			return $this->queryAll($whereArr, '`sort` ASC');
		}
		else
		{
			return $this->queryAll($whereArr, '`sort` ASC', array($num, 0));
		}
    }
	
	public function getnCategoryList($itemid = 1, $num = '', $useable = true)
    {
		$whereArr[] = array('itemid', $itemid);
		$useable && $whereArr[] = array('useable', 1);
		if(empty($num))
		{
			return $this->queryAll($whereArr, '`sort` ASC');
		}
		else
		{
			return $this->queryAll($whereArr, '`sort` ASC', array($num, 0));
		}
    }

    /**
     * 根据ID获取分类内容，返回一条记录
     * 
     * @param: (int) $catid
     * @return: (mixed), 返回ID对应的分类内容, 或为false.
     */
    public function getCategoryByCatId($catid)
    {
        $catid = (int) $catid;
		return $this->find($catid);
    }
	
	/**
     * 根据ID获取分类名称，返回一条记录
     * 
     * @param: (int) $catid
     * @return: (mixed), 返回ID对应的分类内容, 或为false.
     */
    public function getCatNameByCatId($catid)
    {
		$fieldArr = $whereArr = array();
        $catid = (int) $catid;
		$fieldArr = array('catname');
		$whereArr[] = array('id', $catid);
		return $this->getOne($fieldArr, $whereArr);
    }

    /**
     * 添加分类
     *
     * @param: (array) $cat
     * @return: link to Core_Model::add().
     */
    public function addCategory(array $cat = array())
    {
        return $this->add($cat);
    }
	
	/**
     * 修改
     * @param array $cat
     * @return bool
     */
    public function editCategory (array $cat = array())
    {
        return $this->update ($cat);
    }
	
	/**
     * ajax
     * @param array $cat
     * @return bool
     */
    public function getCategory ($catid = 0, $itemid = 1, $useable = true, $num = '')
    {
		$catid = (int) $catid;
		$catArr = $this->getCategoryList($catid, $itemid, $num, $useable);
		foreach($catArr AS $idx => $cat)
		{
			$catArr[$idx]['son'] = $this->getCategory($cat['id'], $itemid, $useable, $num);
		}
		return $catArr;
    }

    /**
     * 删除分类
     * 
     * @param: (array) $catIds, 删除的分类ID.
     * @return: link to Core_Model::remove().
     */
    public function deleteCategory(array $catIds = array())
    {
        return $this->remove($catIds);
    }
	
	/*
	 * 返回递归分类
	 * return string
	 */
	public function getCategoryTree($catid, $itemid, $selid, $pre, $useable = true)
	{
		$_cat = $this->getCategoryList($catid, $itemid, '', $useable);
		$this->_options = '';
		foreach($_cat AS $cat)
		{
			$_sel = $cat['id'] == $selid ? ' selected="selected"' : '';
			$this->_options .= '<option value="' . $cat['id'] . '"' . $_sel . '>' . $pre . $cat['catname'] . '</option>';
			$this->getCateforyTreeSon($cat['id'], $itemid, $selid, $pre . $this->_pre, $useable);
		}
		return $this->_options;
	}
	
	public function getCateforyTreeSon($catid, $itemid, $selid, $pre, $useable = true)
	{
		$_cat = $this->getCategoryList($catid, $itemid, '', $useable);
		foreach($_cat AS $cat)
		{
			$_sel = $cat['id'] == $selid ? ' selected="selected"' : '';
			$this->_options .= '<option value="' . $cat['id'] . '"' . $_sel . '>' . $pre . $cat['catname'] . '</option>';
			$this->getCateforyTreeSon($cat['id'], $itemid, $selid, $pre . $this->_pre, $useable);
		}
	}
	
	public function getSonId($pid)
	{
		$son = $this->getCategoryList($pid, 3);
		$ids = '';
		foreach($son AS $s)
		{
			$ids .= $s['id'] . ',';
		}
		return $ids . $pid;
	}
	
	public function getParendIds($catid)
	{
		$parent = $this->getCategoryByCatId($catid);
		$this->_cato = '';
		$this->_cato .= ',' . $parent['pid'];
		$this->getParendId($parent['pid']);
		return $catid . $this->_cato;
	}
	
	public function getParendId($catid)
	{
		$parent = $this->getCategoryByCatId($catid);
		if($parent['pid'] != 0)
		{
			$this->_cato .= ',' . $parent['pid'];
			$this->getParendId($parent['pid']);
		}
	}
}
