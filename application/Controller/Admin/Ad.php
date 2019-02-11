<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*
 * ST
 * 广告管理
 * @author Snake.L
 */
class Ad extends Action
{
	private $_adModel = null;
	private $_categoryModel = null;
	
	public function __construct($params)
	{
		parent::__construct($params);
		$this->_adModel = new \Model\Ad();
	}
	
    public function indexAction()
    {
		//查询条件
		$adname = $this->getParam('adname');
		$_orderby = "addtime DESC";
		$where = "adname like '%$adname%'";
		
		$Num = $this->_adModel->where($where)->getCount();
		$perpage = C('admin_page_size', 'basic', 20);
		$curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
		$_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');
		$_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/ad/index' . $_c . '/';
		$multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$ads = $this->_adModel->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach($ads AS $idx => $ad)
		{
			$ads[$idx]['kname'] = M('adtype')->getAdTypeOne('name', $ad['tagname']);
		}
		$this->assign('ads', $ads);
		$this->assign ('multipage', $multipage);
		$this->display('admin/ad_index.tpl');
    }
	
	public function moreAction()
	{
		if($this->getParam('id'))
		{
			$_ids = $this->getParam('id');
			$_sorts = $this->getParam('sort');
			foreach($_ids AS $i => $_id)
			{
				$data = array(
					'id' => $_id,
					'sort' => intval($_sorts[$_id])
				);
				$this->_adModel->update ($data);
			}
		}
		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deleteAction(){
        if ($this->getParam ('id')) {
            $ids = (array)$this->getParam ('id');
            foreach($ids as $id){
            	$imgurl = M('base_ad')->where('id', $id)->getField('imgurl');
            	$thumburl = str_replace('uploadfile', 'thumbfile', $imgurl);
            	\Core\Fun\File::delete(BASEROOT . $imgurl);
            	\Core\Fun\File::delete(BASEROOT . $thumburl);
            	M('base_ad')->where('id', $id)->delete();
            }
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
	
	public function addAction()
	{
		$_adModel = new \Model\Ad();
		$action = $this->getParam('action');
		if($action && $action == 'add')
		{
			$tagname = $this->getParam('tagname');
			$isslide = M('adtype')->getAdTypeOne('isslide', $tagname);
			if($this->_adModel->checkAd($tagname) && !$isslide)
			{
				$id = $this->_adModel->getAdIdByTagName($tagname);
				$ad = $this->_adModel->find($id);
				$data = array(
					'id' => $id,
					'tagname' => $tagname,
					'adname' => $this->getParam('adname'),
					'typeid' => intval($this->getParam('typeid')),
					//'starttime' => Core_Fun::strtotime($this->getParam('starttime')),
					//'endtime' => Core_Fun::strtotime($this->getParam('endtime')),
					'linkurl' => $this->getParam('linkurl'),
					'outurl' => $this->getParam('outurl'),
					'addtime' => CURTIME
				);
				if('' != $this->getParam('imgurl') && $this->getParam('imgurl') != $ad['imgurl'])
				{
					$data['imgurl'] = $this->getParam('imgurl');
					\Core\Fun\File::delete(BASEROOT . $ad['imgurl']);
				}
				$update = $this->_adModel->update($data);
				if($update)
				{
					echo $this->returnJson(1, '广告添加成功');
				}
				else
				{
					echo $this->returnJson(0, '广告添加失败');
				}
			}
			else
			{
				if(empty($this->getParam('adname'))){
					echo $this->returnJson(0, '请输入广告名称');
					exit;
				}
				if(empty($tagname)){
					echo $this->returnJson(0, '请选择广告分类');
					exit;
				}
				$data = array(
					'tagname' => $tagname,
					'adname' => $this->getParam('adname'),
					'typeid' => intval($this->getParam('typeid')),
					//'starttime' => Core_Fun::strtotime($this->getParam('starttime')),
					//'endtime' => Core_Fun::strtotime($this->getParam('endtime')),
					'linkurl' => $this->getParam('linkurl'),
					'outurl' => $this->getParam('outurl'),
					'addtime' => CURTIME
				);
				if('' != $this->getParam('imgurl'))
				{
					$data['imgurl'] = $this->getParam('imgurl');
				}
				$adid = $this->_adModel->add($data);
				if($adid > 0)
				{
					echo $this->returnJson(1, '广告添加成功');
				}
				else
				{
					echo $this->returnJson(0, '广告添加失败');
				}
			}
		}
		else
		{
			$this->assign('picdom', 'imgurl');
			$this->assign('_postName', 'add');
			$this->assign('adposition', M('adtype')->getAdTypeOption());
			$this->display('admin/ad_info.tpl');
		}
	}
	
	public function editAction()
	{
		$_adModel = new \Model\Ad();
		$action = $this->getParam('action');
		$id = $this->getParam('id');
		$ad = $this->_adModel->where('id', $id)->find();
		if($action && $action == 'edit')
		{
			$data = array(
				'id' => $id,
				'tagname' => $this->getParam('tagname'),
				'adname' => $this->getParam('adname'),
				'typeid' => intval($this->getParam('typeid')),
				//'starttime' => Core_Fun::strtotime($this->getParam('starttime')),
				//'endtime' => Core_Fun::strtotime($this->getParam('endtime')),
				'linkurl' => $this->getParam('linkurl'),
				'outurl' => $this->getParam('outurl'),
				'addtime' => CURTIME
			);
			if('' != $this->getParam('imgurl') && $this->getParam('imgurl') != $ad['imgurl'])
			{
				$data['imgurl'] = $this->getParam('imgurl');
				\Core\Fun\File::delete(BASEROOT . $ad['imgurl']);
			}
			$update = $this->_adModel->update($data);
			if($update)
			{
				echo $this->returnJson(1, '广告修改成功');
			}
			else
			{
				echo $this->returnJson(0, '广告修改失败');
			}
		}
		else
		{
			$this->assign('ad', $ad);
			$this->assign('picdom', 'imgurl');
			$this->assign('_postName', 'edit');
			$this->assign('adposition', M('adtype')->getAdTypeOption());
			$this->display('admin/ad_info.tpl');
		}
	}

	public function typeAction()
	{
        $types = M('adtype')->select();

        $this->assign('types', $types);
		
		$this->display('admin/ad_type.tpl');
	}

	public function tmoreAction()
	{
		if($this->getParam('id'))
		{
			$_ids = $this->getParam('id');
			$_names = $this->getParam('name');
			$_tags = $this->getParam('tag');
			$_isslides = $this->getParam('isslide');
			$_useables = $this->getParam('useable');
			foreach($_ids AS $i => $_id)
			{
				$data = array(
					'id' => $_id,
					'name' => $_names[$_id],
					'tag' => $_tags[$_id],
					'isslide' => intval($_isslides[$_id]),
					'useable' => intval($_useables[$_id])
				);
				M('adtype')->update ($data);
			}
		}

		if($this->getParam('newname'))
		{
			$_newnames = $this->getParam('newname');
			$_newtags = $this->getParam('newtag');
			$_newisslides = $this->getParam('newisslide');
			foreach($_newnames AS $i => $name)
			{
				if(M('adtype')->isCheck($_newtags[$_id]))
				{
					$data = array(
						'name' => $name,
						'tag' => $_newtags[$i],
						'isslide' => intval($_newisslides[$i]),
						'useable' => 1
					);
					M('adtype')->add ($data);
				}
			}
		}
		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function tdeleteAction()
	{
		//删除
        $ids = (array)$this->getParam ('id');
        $r = M('adtype')->deleteById ($ids);

        if($r)
        {
        	echo $this->returnJson(1, '操作成功，正在返回...');
        }
		else
		{
			echo $this->returnJson(0, '操作失败...');
		}
	}
}