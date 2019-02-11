<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*
 * 友情链接管理
 * Snake.L
 */
class Link extends Action
{
	//分类Model.
    private $_linkModel = null;

    public function __construct($params)
    {
        parent::__construct($params);
        $this->_linkModel = new \Model\Link();
    }
	
	public function indexAction()
	{
		$links = $this->_linkModel->order('addtime desc')->select();
		$this->assign('links', $links);
		$this->display('admin/link_index.tpl');
	}

    public function moreAction()
    {
        //增加
        if ($this->getParam ('newname')) {
            $_newnames = $this->getParam ('newname');
            $_newlinks = $this->getParam ('newlink');
            $time = \Core\Fun::time();
            foreach ($_newnames as $i => $_newname)
            {
                $_data = array (
                    'name' => htmlspecialchars(trim ($_newname)),
                    'link' => $_newlinks[$i],
                    'useable' => 1,
                    'addtime' => $time
                );
                $this->_linkModel->add ($_data);
            }
        }
        
        if ($this->getParam ('id')) {
            $_ids = $this->getParam ('id');
            $_names = $this->getParam ('name');
            $_links = $this->getParam ('link');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => $_id,
                    'name' => htmlspecialchars(trim ($_names[$_id])),
                    'link' => $_links[$_id]
                );
                $this->_linkModel->update ($_data);
            }
        }
        
        echo $this->returnJson(1, '操作成功，正在返回...');
    }

    public function deleteAction()
    {
        if($this->getParam('id'))
        {
            $ids = (array)$this->getParam('id');
            $this->_linkModel->remove($ids);
        }
        
        echo $this->returnJson(1, '操作成功，正在返回...');
    }

    public function editAction()
    {
        $Id = $this->getParam('id');
        if($Id <= 0)
        {
            echo $this->returnJson(0, '请正确操作');
        }
        $link = M('link')->where('id', $Id)->find();
        $action = $this->getParam('action');
        if($action && 'edit' == $action)
        {
            $_Data = array(
                'id' =>$Id,
                'name' => $this->getParam('name'),
                'link' => $this->getParam('link'),
                'useable' => $this->getParam('useable')
            );
            if('' != $this->getParam('linkpic') && $this->getParam('linkpic') != $link['linkpic'])
            {
                \Core\Fun\File::delete(BASEROOT . $link['linkpic']);
                $_Data['linkpic'] = $this->getParam('linkpic');
            }

            $update = M('link')->update($_Data);
            
            if($update)
            {
                echo $this->returnJson(1, '友情链接修改成功');
            }
            else
            {
                echo $this->returnJson(0, '友情链接修改失败');
            }
        }
        else
        {
            $this->assign('picdom', 'linkpic');
            $this->assign('link', $link);
            $this->assign('_postName', 'edit');
            $this->display('admin/link_info.tpl');
        }
    }
}
?>