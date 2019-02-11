<?php
namespace Model;

use Core\Model;
/**
 * ST
 * 图片模型
 * @author: Snake
 */
class Gallery extends Model
{
    /**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'product_gallery';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'itemid', 'belong', 'kindid', 'imgurl', 'thumburl', 'imginfo', 'addtime');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	public function getGalleryList($itemid = 0, $belong = 0, $kindid = 0, $num = 0)
    {
		$itemid = (int) $itemid;
		$limit = array();
		$where = "itemid = '$itemid'";
        if($belong){
            $where .= " and belong = '$belong'";
        }
        if($kindid){
            $where .= " and kindid = '$kindid'";
        }

        if($num){
            return $this->where($where)->limit(0, $num)->select();
        }else{
            return $this->where($where)->select();
        }
    }
	
	public function getGalleryidByItemId($itemid = 0)
    {
		$itemid = (int) $itemid;
        $where = "itemid = '$itemid'";
        return $this->where($where)->order('`addtime` ASC')->select();
    }
	
	/**
     * 根据ID获取图片内容，返回一条记录
     * 
     * @param: (int) $galleryid
     * @return: (mixed), 返回ID对应的分类内容, 或为false.
     */
    public function getGalleryByGId($galleryid)
    {
        $galleryid = (int) $galleryid;
		return $this->where('id', $galleryid)->find();
    }
	
	/**
     * 添加图片
     *
     * @param: (array) $img
     * @return: link to Core_Model::add().
     */
    public function addGallery(array $img = array())
    {
        return $this->add($img);
    }
	
	/**
     * 修改图片
     * @param array $img
     * @return bool
     */
    public function editGallery (array $img = array())
    {
        return $this->update ($img);
    }
	
	
	/**
     * 删除图片(多条)
     * 
     * @param: (array) $galleryIds, 删除的附件ID.
     * @return: link to Core_Model::remove().
     */
    public function deleteGallery(array $galleryIds = array())
    {
        return $this->remove($galleryIds);
    }
	
	/**
     * 删除图片(单条)
     * 
     * @param: (array) $galleryId, 删除的附件ID.
     * @return: link to Core_Model::remove().
     */
    public function deleteGalleryOne($galleryId = 0)
    {
		$galleryId = (int) $galleryId;
        return $this->remove($galleryId);
    }
	
	/**
     * 删除图片__删除所属时
     * 
     * @param: (array) $hotelIds, 删除的酒店ID.
     * @return: link to Core_Model::remove().
     */
	public function deleteGalleryByItemId(array $itemIds = array(), $belong)
	{
		foreach($itemIds AS $itemid)
		{
			$gIds = $this->getGalleryidByItemId($itemid);
			foreach($gIds AS $gArr)
			{
				Core_Fun_File::delete(BASEROOT . $gArr['imgurl']);
				Core_Fun_File::delete(BASEROOT . $gArr['thumburl']);
			} 
			
			$where = "itemid = '$itemid' and belong IN (" . $belong . ")";
			$this->removeall($where);
		}
		return true;
	}
	
	public function getPicNum($itemid, $belong, $kindid = 0)
	{
		$whereArr = array(
			array('itemid', $itemid),
			array('belong', $belong)
		);
		$kindid && $whereArr[] = array('kindid', $kindid);
		return $this->where('itemid', $itemid)->where('belong', $belong)->getCount();
	}
}