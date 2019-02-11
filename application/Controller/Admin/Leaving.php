<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*
 * vpcv-cms
 * 留言管理
 * @author snake.L
 */
class Leaving extends Action
{
	public function __construct($params)
	{
		parent::__construct($params);
	}

    public function indexAction()
    {
    	$conditions = array();
    	$where = '1=1';
		
		$_orderby = "addtime DESC";
		
		$Num = M('leaving')->where($where)->getCount();
		
		$perpage = C('admin_page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($conditions, '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/leaving/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$leavings = M('leaving')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		
        $this->assign ('multipage', $multipage);
		$this->assign('leavings', $leavings);
		$this->display('admin/leaving_index.tpl');
    }
	

	public function deleteAction()
	{
        if ($this->getParam ('id')) 
		{
            $ids = (array)$this->getParam ('id');
            M('leaving')->remove ($ids);
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
}