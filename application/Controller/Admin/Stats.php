<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*
 * vpcvcms
 * 访问管理
 * @author Snake.L
 */
class Stats extends Action
{
	
	public function __construct($params)
	{
		parent::__construct($params);
	}
	
    public function indexAction()
    {
		$_orderby = "accesstime DESC";
		
		$Num = M('stats')->getCount();
		$perpage = C('admin_page_size', 'basic', 20);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$mpurl = 'admin/stats/index/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$stats = M('stats')->order('$_orderby')->limit($perpage * ($curpage - 1), $perpage)->select();
		$this->assign('stats', $stats);
		$this->assign ('multipage', $multipage);
		$this->display('admin/stats_index.tpl');
    }
	
	public function deleteAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            M('stats')->remove ($ids);
        }
		echo $this->returnJson(1, '操作成功，正在返回...');
	}
}