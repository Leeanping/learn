<?php
/*
 * 收藏管理
 * @author Snake.L
 */
class Controller_Admin_Stow extends Core_Controller_Action
{
	private $_stowModel = null;
	
	public function __construct($params)
	{
		parent::__construct($params);
		$this->_stowModel = new \Model\Stow();
	}
	
	/**
     * 分类首页
     */
    public function indexAction()
    {
		$_userModel = new \Model\User\Member();
		//搜索
		$_search = array(
			array('title', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "addtime DESC";
		
		$Num = $this->_stowModel->getCount($_searchArr['where']);
		
		$perpage = C('admin_page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/admin/stow/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$stows = $this->_stowModel->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($stows AS $idx => $stow)
		{
			$stows[$idx]['realname'] = $_userModel->getInfoByUid('realname', $stow['uid']);
			$stows[$idx]['typename'] = \Core\Fun::getSTypeName($stow['type']);
		}
        $this->assign ('multipage', $multipage);
		$this->assign('stows', $stows);
		$this->display('admin/stow_index.tpl');
    }
	
	public function moreAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            $this->_stowModel->remove ($ids);
        }
		
		//修改
        if ($this->getParam ('useable')) 
		{
            $_ids = $this->getParam ('id');
			$_useables = $this->getParam ('useable');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
					'useable' => intval ($_useables[$i])
                );
                $this->_stowModel->update ($_data);
            }
            $this->showmsg ('操作成功，正在返回...');
        }
	}
}