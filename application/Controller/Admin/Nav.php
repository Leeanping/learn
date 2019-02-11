<?php
namespace Controller\Admin;

use Core\Controller\Action;
/**
 * 导航栏管理
 *
 */
class Nav extends Action
{

    private $_navObj;

    public function __construct ($params)
    {
        parent::__construct ($params);
        $this->_navObj = new \Model\Nav();
    }

    /**
     * 列表
     */
    public function indexAction ()
    {
        //新增
        $_type = strlen ($this->getParam ('type')) > 0 ? intval ($this->getParam ('type')) : 0;
        //查询条件
        $whereArr = array ();
        $conditions = array ();
        //类型
        $this->assign ("type", $_type);
        $navs = $this->_navObj->getNavTree ($_type, 0, false);

        foreach ($navs as $nav)
        {
            if ($nav['parentid']) {
                $subnavlist[$nav['parentid']][] = $nav;
            } else {
                $navlist[$nav['id']] = $nav;
            }
        }

        $this->assign ('navs', $navlist);
        $this->assign ('subnavs', $subnavlist);
        $this->assign ('nav_type', $this->_navObj->TYPE);
        $this->display ('admin/nav_index.tpl');
    }

    public function moreAction ()
    {
        //新增
        $_type = strlen ($this->getParam ('type')) > 0 ? intval ($this->getParam ('type')) : 0;
        if ($this->getParam ('newname')) {
            $_newparentids = $this->getParam ('newparentid');
            $_newnames = $this->getParam ('newname');
            $_newdisplayorders = $this->getParam ('newdisplayorder');
            $_newperpages = $this->getParam('newperpage');
            $system = 0;
            foreach ($_newparentids as $i => $_newparentid)
            {
                $pinyin = \Core\Util\Tutil::getPinyin($_newnames[$i], 1);
                $hasid = $this->_navObj->where("pinyin = '$pinyin'")->getField('id');
                if($hasid){
                    $random = \Core\Comm\Token::randomchar(4);
                    $pinyin = $pinyin . $random;
                }
                $_nav = array (
                    'parentid' => intval ($_newparentid),
                    'name' => trim ($_newnames[$i]),
                    'type' => intval($_type),
                    'displayorder' => intval($_newdisplayorders[$i]),
                    'system' => intval($system),
                    'useable' => 1,
                    'isview' => 0,
                    'newwindow' => 0,
                    'pinyin' => $pinyin,
                    'perpage' => intval($_newperpages[$i])
                );
                if($_newparentid != 0)
                {
                    $_navp = $this->_navObj->where('id', $_newparentid)->find ();
                    $_nav['moduleid'] = $_navp['moduleid'];
                    $_nav['style'] = $_navp['style'];
                    $_nav['icon'] = $_navp['icon'];
                    $_nav['tempindex'] = $_navp['tempindex'];
                    $_nav['templist'] = $_navp['templist'];
                    $_nav['temparticle'] = $_navp['temparticle'];
                    
                }
                $this->_navObj->addNav ($_nav);
            }
            //$this->showmsg ('添加成功');
        }

        //修改
        if ($this->getParam ('id')) {
            $_ids = $this->getParam ('id');
            $_parentids = $this->getParam ('parentid');
            $_displayorders = $this->getParam ('displayorder');
            $_newwindows = $this->getParam ('newwindow');
            $_useables = $this->getParam ('useable');
            $_perpages = $this->getParam ('perpage');
            foreach ($_ids as $i => $_id)
            {
                $_nav = array (
                    'id' => intval ($_id),
                    'parentid' => intval ($_parentids[$_id]),
                    'type' => intval($_type),
                    'displayorder' => intval($_displayorders[$_id]),
                    'newwindow' => intval($_newwindows[$_id]),
                    'useable' => intval($_useables[$_id]),
                    'perpage' => intval($_perpages[$_id])
                );
                $this->_navObj->editNav ($_nav);
            }
        }
        echo $this->returnJson(1, '操作成功，正在返回...');
    }

    public function deleteAction ()
    {
        //删除
        if ($this->getParam ('id')) {
            $ids = (array)$this->getParam ('id');
            $this->_navObj->deleteNav ($ids);
        }
        echo $this->returnJson(1, '操作成功，正在返回...');
    }
	
	public function editAction()
	{
		$_id = (int) $this->getParam('id');    //获取编辑的分类ID.
        if ($_id <= 0)
        {
            echo $this->returnJson(0, '请正确操作');
        }
		$nav = $this->_navObj->where('id', $_id)->find();
		$action = $this->getParam('action');
		if($action && $action == 'edit')
		{
            $name = $this->getParam('name');
            $pinyin = $this->getParam('pinyin');
            if(empty($pinyin))
            {
                $pinyin = \Core\Util\Tutil::getPinyin($name, 1);
            }

			$Data = array(
				'id'             => $this->getParam('id'),
                'name'        => $name,
                'ename'        => $this->getParam('ename'),
				'seotitle'     => htmlspecialchars($this->getParam('seotitle')),
				'keywords'     => htmlspecialchars($this->getParam('keywords')),
				'description'     => htmlspecialchars($this->getParam('description')),
				'body'         => $this->getParam('body'),
                'moduleid'             => $this->getParam('moduleid'),
                'style'             => intval($this->getParam('style')),
                'tempindex'             => $this->getParam('tempindex'),
                'templist'             => $this->getParam('templist'),
                'temparticle'             => $this->getParam('temparticle'),
				'newwindow'         => intval($this->getParam('newwindow')),
                'useable'         => intval($this->getParam('useable')),
                'isview'         => intval($this->getParam('isview')),
                'pinyin' => $pinyin
            );

            if('' != $this->getParam('icon') && $this->getParam('icon') != $nav['icon'])
            {
                \Core\Fun\File::delete(BASEROOT . $nav['icon']);
                $Data['icon'] = $this->getParam('icon');
            }
			
			if($this->_navObj->editNav($Data))
			{
				echo $this->returnJson(1, '导航信息更新成功');
			}
			else 
			{
				echo $this->returnJson(0, '导航信息更新失败');
			}
		}
		else
		{
			if (!$nav)
			{
				echo $this->returnJson(0, '信息不存在');
                exit;
			}
            $nav['moduleid'] = $nav['moduleid'] ? $nav['moduleid'] : 'article';
            $nav['style'] = $nav['style'] ? $nav['style'] : 1;
			$this->assign('body', \Core\Fun::getEditor('body', $nav['body'], 220));
			$this->assign('nav', $nav);
            $this->assign('picdom', 'icon');
			$this->display('admin/nav_info.tpl');
		}
	}
}