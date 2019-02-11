<?php
namespace Controller\Admin;

use Core\Controller\Action;
/**
 * vpcv-cms
 * 目地分类管理
 * @author: snake.L
 */
class Category extends Action
{
	//分类Model.
    private $_categoryModel = null;

    public function __construct($params)
    {
        parent::__construct($params);
        $this->_categoryModel = new \Model\Category();
    }

    /**
     * 分类首页
     */
    public function indexAction()
    {
		$item = $this->getParam('item');
		
        $categoryList = $this->_categoryModel->getCategory(0, $item, false, '');
		
        $this->assign('categoryList', $categoryList);
		
		$this->assign('itemid', $item);
		
		$this->display('admin/category_index.tpl');
    }

    public function moreAction()
    {
		$item = $this->getParam('item');
		//增加
		if ($this->getParam ('newcatname')) {
            $_newparentids = $this->getParam ('newpid');
            $_newcatnames = $this->getParam ('newcatname');
            $_newdisplayorders = $this->getParam ('newsort');
            foreach ($_newparentids as $i => $_newparentid)
            {
                $_cat = array (
                    'pid' => intval ($_newparentid),
					'itemid' => $item,
                    'catname' => htmlspecialchars(trim ($_newcatnames[$i])),
                    'sort' => intval($_newdisplayorders[$i]),
                    'useable' => 1
                );
                $this->_categoryModel->addCategory ($_cat);
            }
        }
		
		
		//修改
        if ($this->getParam ('id')) {
            $_ids = $this->getParam ('id');
            $_parentids = $this->getParam ('pid');
            $_names = $this->getParam ('catname');
            $_displayorders = $this->getParam ('sort');
            $_useables = $this->getParam ('useable');
            foreach ($_ids as $i => $_id)
            {
                $_cat = array (
                    'id' => intval ($_id),
                    'pid' => intval ($_parentids[$_id]),
                    'catname' => htmlspecialchars(trim ($_names[$_id])),
                    'sort' => intval($_displayorders[$_id]),
                    'useable' => intval($_useables[$_id])
                );
                $this->_categoryModel->editCategory ($_cat);
            }
            
        }

        echo $this->returnJson (1, '操作成功，正在返回...');
    }

    public function deleteAction()
    {
    	$item = $this->getParam('item');
    	if ($this->getParam ('id')) {
            $ids = (array)$this->getParam ('id');
            $this->_categoryModel->deleteCategory ($ids);
        }

        echo $this->returnJson (1, '操作成功，正在返回...');
    }
	
	/*
	 * 修改分类页面
	 * @author Snake
	 */
	public function editAction()
	{
		$_catid = (int) $this->getParam('id');    //获取编辑的分类ID.
        if ($_catid <= 0)
        {
            echo $this->returnJson(0, '请正确操作');
        }
		
		$action = $this->getParam('action');
		$item = $this->getParam('item');
		$item = !isset($item) ? 1 : $item;
		$category = $this->_categoryModel->getCategoryByCatId($_catid);
		if($action && $action == 'edit')
		{
			$catData = array(
				'id'             => $_catid,
                'catname'        => $this->getSafeParam('catname'),
                'sort'     => $this->getSafeParam('sort'),
				'seotitle'     => htmlspecialchars($this->getParam('seotitle')),
				'keywords'     => htmlspecialchars($this->getParam('keywords')),
				'description'     => htmlspecialchars($this->getParam('description')),
                'useable'         => $this->getParam('useable'),
                'catbrief' => $this->getSafeParam('catbrief'),
				'content' => $this->getParam('content')
            );
			if('' != $this->getParam('catpic') && $this->getParam('catpic') != $category['catpic'])
			{
				\Core\Fun\File::delete(BASEROOT . $category['catpic']);
				$catData['catpic'] = $this->getParam('catpic');
			}
			if('' != $this->getParam('catthumb') && $this->getParam('catthumb') != $category['catthumb'])
			{
				Core\Fun\File::delete(BASEROOT . $category['catthumb']);
				$catData['catthumb'] = $this->getParam('catthumb');
			}
			if($this->_categoryModel->editCategory($catData))
			{
				echo $this->returnJson(1, '分类修改成功');
			}
			else 
			{
				echo $this->returnJson(0, '分类修改失败');
			}
		}
		else
		{
			$this->assign('item', $item);
			$this->assign('picdom', 'catpic');
			$this->assign('thumbdom', 'catthumb');
			if (!$category)
			{
				echo '您查看的信息不存在。';
				exit;
			}
			$this->assign('content', \Core\Fun::getEditor('content', $category['content'], 200, 700, 'bbs'));
			$this->assign('category', $category);
			$this->display('admin/category_info.tpl');
		}
	}
}