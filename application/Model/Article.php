<?php
namespace Model;

use Core\Model;
/*
 * 文章模型
 */
class Article extends Model
{
	/**
     * Database table name.
     * @var (string)
     */
    protected $_tableName = 'article_article';

    /**
     * Database table columns.
     * @var (array), table fields.
     */
    protected $_fields = array('id', 'catid', 'catarr', 'moduleid', 'brandid', 'classid', 'title', 'titlecolor', 'content', 'cutstr', 'articlepic', 'articlethumb', 'attachlist', 'tagword', 'seotitle', 'keywords', 'description', 'sort', 'istop', 'isspecial', 'isindex', 'useable', 'uid', 'realname', 'comefrom', 'addtime', 'updatetime', 'shownum', 'feednum', 'bestnum', 'stownum', 'fileurl', 'isview');
	
	//用户表可操作表达式字段
    protected $UnsetColumu = array ('shownum', 'feednum', 'bestnum', 'stownum');
    
	/**
     * 数据库主键
     * @var type string
     */
    protected $_idkey = 'id';
	
	protected $_repeat = 'title';
	
	public function getArticleById($id)
	{
		$article = $this->find($id);
		$article['attachs'] = explode($article['attachlist']);
		return $article;
	}
	
	public function editArticle($articleInfo)
	{
		return $this->update($articleInfo, $this->_fields, $this->UnsetColumu);
	}
	
	public function updateShow($id)
	{
		$data['id'] = $id;
		$data['shownum'] = 1;
		return $this->editArticle($data);
	}
	
	public function updateNum($id, $field)
	{
		$data['id'] = $id;
		$data[$field] = 1;
		return $this->editArticle($data);
	}
	
	public function addBest($id)
	{
		$data = array(
			'id' => $id,
			'bestnum' => 1
		);
		return $this->editArticle($data);
	}
	
	public function getArticleList($num, $type = 1, $catid = '', $limit = 0, $orderby = 'istop DESC, updatetime DESC, sort ASC, shownum DESC')
	{
		$whereArr = array(
			array('type', $type),
			array('useable', 1)
		);
		$catid && $whereArr[] = array('catarr', $catid, 'FIND_IN_SET');
		$articles = $this->queryAll($whereArr, $orderby, array($num, $limit));
		return $articles;
	}

	public function deleteByIds($ids)
	{
		$ids = (array) $ids;
		if(empty($ids))
		{
			return fasle;
		}
		else
		{

			foreach($ids AS $id)
	        {
	        	$moduleid = $this->where('id', $id)->getField('moduleid');

	        	$articlepic = $this->where('id', $id)->getField('articlepic');

	        	$articlethumb = $this->where('id', $id)->getField('articlethumb');

	        	M('module')->mtable($moduleid)->removeall("aid = '$id'");

	        	$galleries = M('gallery')->getGalleryList($id, BELONG_ARTICLE);
	        	if($galleries)
	        	{
	        		foreach($galleries AS $gallery)
		        	{
		        		\Core\Fun\File::delete(BASEROOT . $gallery['imgurl']);
						\Core\Fun\File::delete(BASEROOT . $gallery['thumburl']);
		        		M('gallery')->remove ($gallery['id']);
		        	}
	        	}

	        	\Core\Fun\File::delete(BASEROOT . $articlepic);
				\Core\Fun\File::delete(BASEROOT . $articlethumb);

	        	$this->remove ($id);
	        }

	        return true;
		}
	}

	public function deleteByNavIds($ids)
	{
		$ids = (array) $ids;
		if(empty($ids))
		{
			return fasle;
		}
		else
		{
			foreach($ids AS $id)
	        {
	        	$articles = $this->queryAll(array(array('catarr', $id, 'FIND_IN_SET')));

	        	foreach($articles AS $article)
	        	{
	        		$this->deleteByIds($article['id']);
	        	}
	        }
	        return true;
		}
	}
}
?>