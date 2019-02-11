<?php
namespace Model;

use Core\Model;
/*
 * 商品模型
 */
class Goods extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'goods_goods';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'uid', 'catid', 'catarr', 'kind', 'goodsname', 'goodsbrief', 'goodsthumb', 'goodspic', 'price', 'marketprice', 'attr', 'color', 'size', 'ml', 'sellnum', 'feednum', 'bestnum', 'stownum', 'tags', 'service', 'content', 'ishot', 'isnew', 'isspecial', 'isonsale', 'sort', 'useable', 'addtime');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ('sellnum', 'feednum', 'bestnum', 'stownum');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function getGoodsList($num, $kind = 1, $catid = '', $limit = 0, $orderby = 'addtime DESC')
	{
		$whereArr = array(
			array('kind', $kind),
			array('useable', 1)
		);
		$catid && $whereArr[] = array('catarr', $catid, 'FIND_IN_SET');
		$goods = $this->queryAll($whereArr, $orderby, array($num, $limit));
		return $goods;
	}
	
	public function addGoods(array $goods = array())
    {
        return $this->add($goods);
    }
	
	public function editGoods($goods)
	{
		return $this->update($goods, $this->_fields, $this->UnsetColumu);
	}
	
	public function deleteGoods(array $goodsIds = array())
    {
        return $this->remove($goodsIds);
    }
	
    public function updateNum($id, $field)
	{
		$data['id'] = $id;
		$data[$field] = 1;
		return $this->editGoods($data);
	}
	
	public function checkGoodsname($goodsname)
	{
		$num = $this->getCount(array(array('goodsname', $goodsname)));
		if($num > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function getGoodsOne($goodsid, $field)
	{
		return $this->getOne(array($field), array(array('id', $goodsid)));
	}
	
	public function getGoodsById($id)
	{
		$good = $this->find($id);
		$good['color'] = explode(',', $good['color']);
		$good['attr'] = explode(',', $good['attr']);
		$good['size'] = explode(',', $good['size']);
		$good['realname'] = M('User_Member')->getInfoByUid('realname', $good['uid']);
		return $good;
	}
}
?>