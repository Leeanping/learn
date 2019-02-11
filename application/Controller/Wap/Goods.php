<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/**
 * vpcvcms
 * 商品
 */
class Goods extends WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
		$this->assign('current', 'good');
	}
    
	public function indexAction()
	{
		$catid = $this->getParam('catid');
		if($catid)
		{
			$_search = array(
				array('catarr', 'FIND_IN_SET', $catid),
				array('useable', '', 1)
			);
		}
		else
		{
			$_search = array(array('useable', '', 1));
		}
		$_searchArr = $this->setWhereCondition($_search);
		
		$_orderby = "sort ASC,addtime DESC";
		
		$Num = M('goods')->getCount($_searchArr['where']);
		
		$perpage = C('page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = '/wap/goods/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$goods = M('goods')->queryAll($_searchArr['where'], $_orderby, array($perpage, $perpage * ($curpage - 1)));
		foreach($goods AS $idx => $good)
		{
			$goods[$idx]['price'] = M('goodspec')->getPriceGoodsId($good['id']);
			$goods[$idx]['unit'] = M('goodspec')->getUnitGoodsId($good['id']);
		}
        $this->assign ('multipage', $multipage);
		$this->assign('goods', $goods);
		$this->assign('categories', M('category')->getCategory(0, 2));
		$this->assign('catname', M('category')->getCatNameByCatId($catid));
		$this->assign('curr', '分类');
		$this->display('wap/goods.tpl');
	}
	
	public function showAction()
	{
		$id = $this->getParam('id');
		$good = M('goods')->find($id);
		if(!$good['id'])
			$this->showmsg('此商品不存在', 'wap/goods');
		$good['spec'] = M('goodspec')->getSpecByGoodsId($id);
		$this->assign('feeds', M('feedback')->getFeedList($id, 'goods', 20));
		$this->assign('good', $good);
		$this->assign('curr', '商品详情');
		$this->display('wap/good_show.tpl');
	}
	
	public function priceAction()
	{
		$attrid = $this->getParam('attrid');
		$goodsid = $this->getParam('goodsid');
		$num = $this->getParam('num');
		
		$price = M('goodspec')->getPriceByGoodsId($goodsid, $attrid);
		$unit = M('goodspec')->getPriceByGoodsId($goodsid, $attrid, 'unit');
		if($price)
		{
			$arr['msg'] = 1;
			$arr['price'] = $price;
			$arr['amount'] = $price * $num;
			$arr['unit'] = $unit;
		}
		else
		{
			$arr['msg'] = 0;
		}
		echo \Core\Fun::array2json($arr);
	}
	
	public function orderAction()
	{
		$user = $this->getUser();
		$goodsid = $this->getParam('goodsid');
		if(!$user['uid'])
		{
			$arr['msg'] = -1;
		}
		else
		{
			$attrid = $this->getParam('attrid');
			$num = $this->getParam('num');
			$price = M('goodspec')->getPriceByGoodsId($goodsid, $attrid);
			$score = M('goodspec')->getPriceByGoodsId($goodsid, $attrid, 'score');
			$attrname = M('goodspec')->getPriceByGoodsId($goodsid, $attrid, 'attrname');
			$goodsname = M('goods')->getOne('goodsname', array(array('id', $goodsid)));
			$ordersn = \Core\Fun::getOrdersn('ht');
			
			$data = array(
				'ordersn' => $ordersn,
				'goodsid' => $goodsid,
				'goodsname' => $goodsname,
				'uid' => $user['uid'],
				'attrid' => $attrid,
				'attrname' => $attrname,
				'price' => $price,
				'goodsnum' => $num,
				'amount' => $price * $num,
				'score' => $score,
				'state' => 1,
				'addtime' => \Core\Fun::time()
			);
			if(M('order')->addOrder($data))
			{
				$arr['msg'] = 1;
			}
			else
			{
				$arr['msg'] = 0;
			}
		}
		echo \Core\Fun::array2json($arr);
	}
	
	public function getnumAction()
	{
		$user = $this->getUser();
		$num = M('order')->getCount(array(array('uid', $user['uid']), array('state', 1)));
		echo \Core\Fun::array2json(array('num' => $num)); 
	}
	
	public function catAction()
	{
		$catid = $this->getParam('catid');
		$categories = M('category')->getCategoryList($catid, 2);
		$html = '';
		foreach($categories AS $cat)
		{
			$html .= '<li><a href="' . \Core\Fun::getPathroot() . 'wap/goods/index/catid/' . $cat['id'] . '">' . $cat['catname'] . '</a></li>';
		}
		echo $html;
	}
}