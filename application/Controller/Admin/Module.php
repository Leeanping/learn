<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*
 * 模块管理
 * @author Snake.L
 */
class Module extends Action
{
	
	public function __construct($params)
	{
		parent::__construct($params);
	}
	
	public function indexAction()
	{
		$kind = $this->getParam('kind');
		if(!$kind)
		{
			echo $this->returnJson(0, '模块不正确');
			exit;
		}
		$columns = M('module')->mtable($kind)->getColumnList();
		$this->assign('columns', $columns);
		$this->assign('kind', $kind);

		$this->display('admin/module_index.tpl');
	}

	public function addAction()
	{
		$kind = $this->getParam('kind');
		$action = $this->getParam('action');

		if($action && $action == 'add')
		{
			if(!$kind)
			{
				echo $this->returnJson(0, '模块不正确');
				exit;
			}

			$comment = $this->getParam('comment'); 
			$field = $this->getParam('field'); 
			$type = $this->getParam('type'); 

			if(empty($comment))
			{
				echo $this->returnJson(0, '请填写描述');
				exit;
			}

			if(empty($field))
			{
				echo $this->returnJson(0, '请填写字段');
				exit;
			}

			if(empty($type))
			{
				echo $this->returnJson(0, '请选择类型');
				exit;
			}

			$length = $isunsigned = '';
			if($type == 'int')
			{
				$length = 10;
				$isunsigned = 1;
			}
			elseif($type == 'tinyint')
			{
				$length = 4;
				$isunsigned = 1;
			}
			elseif($type == 'varchar')
			{
				$length = 255;
				$isunsigned = 0;
			}
			elseif($type == 'char')
			{
				$length = 100;
				$isunsigned = 0;
			}
			elseif($type == 'text')
			{
				$length = 0;
				$isunsigned = 0;
			}
			elseif($type == 'picture')
			{
				$length = 255;
				$isunsigned = 0;
			}
			else
			{
				echo $this->returnJson(0, '类型不正确');
				exit;
			}

			$r = M('module')->mtable($kind)->addColumn($field, $type, $length, $isunsigned, $comment);

			if($r)
			{
				echo $this->returnJson(1, '字段添加成功');
				exit;
			}
			else
			{
				echo $this->returnJson(0, '字段添加失败');
				exit;
			}
		}
		else
		{
			$this->assign('kind', $kind);
			$this->assign('_postName', 'add');
			$this->display('admin/module_info.tpl');
		}
	}

	public function deleteAction()
	{
		$kind = $this->getParam('kind');
		$field = $this->getParam('field');
		if(!$kind)
		{
			echo $this->returnJson(0, '模块不正确');
			exit;
		}
		if(!$field)
		{
			echo $this->returnJson(0, '删除失败');
			exit;
		}

		$r = M('module')->mtable($kind)->dropColumn($field);

		if($r)
		{
			echo $this->returnJson(1, '字段删除成功');
			exit;
		}
		else
		{
			echo $this->returnJson(0, '字段删除失败');
			exit;
		}
	}

	public function listAction(){
		$modules = M('base_module')->select();
		$this->assign('modules', $modules);
		$this->display('admin/module_list.tpl');
	}

	public function moreAction(){
		//增加
		if ($this->getParam ('newtitle')) {
            $_newtitles = $this->getParam ('newtitle');
            $_newmarks = $this->getParam ('newmark');
            $_newcomments = $this->getParam ('newcomment');
            foreach ($_newtitles as $i => $_newtitle){
                $_data = array (
                    'title' => htmlspecialchars(trim ($_newtitles[$i])),
                    'mark' => htmlspecialchars(trim ($_newmarks[$i])),
                    'comment' => htmlspecialchars(trim ($_newcomments[$i])),
                );
                M('module')->addModule($_data);
            }
        }

        echo $this->returnJson (1, '操作成功，正在返回...');
    }

    public function deletemoduleAction(){
    	$id = $this->getParam('id');
    	if(!$id){
    		echo $this->returnJson (0, '系统错误');
    		exit;
    	}

    	$mark = M('base_module')->where('id', $id)->getField('mark');
    	//删除模型表
    	$res = M('module')->dropModule($mark);
    	if($res){
    		//删除模型数据
    		M('base_module')->where('id', $id)->delete();
    		//删除包含该模型的导航
    		$navs = M('base_nav')->where('moduleid', $mark)->select();
    		if(count($navs) > 0){
    			foreach($navs as $nav){
    				$nav['icon'] && \Core\Fun\File::delete(BASEROOT . $nav['icon']);
    				M('base_nav')->where('id', $nav['id'])->delete();
    			}
    		}
    		//删除包含该模型的内容
    		$articles = M('article_article')->where('moduleid', $mark)->select();
    		if(count($articles) > 0){
    			foreach($articles as $article){
	        		$galleries = M('gallery')->getGalleryList($article['id'], BELONG_ARTICLE);
		        	if($galleries){
		        		foreach($galleries AS $gallery){
			        		\Core\Fun\File::delete(BASEROOT . $gallery['imgurl']);
							\Core\Fun\File::delete(BASEROOT . $gallery['thumburl']);
			        		M('gallery')->where('id', $gallery['id'])->delete();
			        	}
		        	}

		        	$article['articlepic'] && \Core\Fun\File::delete(BASEROOT . $article['articlepic']);
					$article['articlethumb'] && \Core\Fun\File::delete(BASEROOT . $article['articlethumb']);
    				M('article_article')->where('id', $article['id'])->delete();
    			}
    		}
    		echo $this->returnJson (1, '操作成功，正在返回...');
    	}else{
    		echo $this->returnJson (0, '删除失败');
    	}
    }
}