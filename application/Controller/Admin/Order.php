<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*
 * vpcv-cms
 * 订单管理
 * @author snake.L
 */
class Order extends Action
{
	public function __construct($params)
	{
		parent::__construct($params);
	}
	
	/**
     * 分类首页
     */
    public function indexAction()
    {
		$_search = array(
			array('goodsname', 'LIKE')
		);
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "addtime DESC";
		
		$Num = M('order')->getCount($_searchArr['where']);
		
		$perpage = C('admin_page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/admin/order/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$orders = M('order')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($orders AS $idx => $order)
		{
			$orders[$idx]['username'] = M('User_Member')->getInfoByUid('username', $order['uid']);
			$orders[$idx]['goods'] = M('ordergoods')->queryAll(array(array('orderid', $order['id'])));
		}
        $this->assign ('multipage', $multipage);
		$this->assign('orders', $orders);
		$this->display('admin/order_index.tpl');
    }
	
	public function getShopName($shopid)
	{
		$shopname = array();
		$str = '';
		$shopids = explode(',', $shopid);
		foreach($shopids AS $id)
		{
			$name = M('shop')->getOne('storename', array(array('id', $id)));
			$str .= '<a href="' . \Core\Fun::getPathroot() . 'store/show/' . $id . '" target="_blank">' . $name . '</a>';
			array_push($shopname, $str);
		}
		return implode(',', $shopname);
	}
	
	public function moreAction()
	{
		//删除
        if ($this->getParam ('delete')) 
		{
            $ids = (array)$this->getParam ('delete');
            M('order')->remove ($ids);
        } 
		
		//修改
        if ($this->getParam ('id')) 
		{
            $_ids = $this->getParam ('id');
			$_statuses = $this->getParam ('status');
            foreach ($_ids as $i => $_id)
            {
                $_data = array (
                    'id' => intval ($_id),
					'status' => intval ($_statuses[$i])
                );
                M('order')->update ($_data);
            }
        }
		$this->showmsg('操作成功，正在返回...', 'admin/order/index');
	}
}
?>