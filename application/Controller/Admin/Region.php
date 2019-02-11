<?php
namespace Controller\Admin;

use Core\Controller\Action;
/**
 * vpcv-cms
 * 地区分类管理
 * @author: snake.L
 */
class Region extends Action
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
		//增加
		if ($this->getParam ('newregionname')) {
            $_newparentids = $this->getParam ('newpid');
            $_newregionnames = $this->getParam ('newregionname');
            foreach ($_newparentids as $i => $_newparentid)
            {
                $_cat = array (
                    'pid' => intval ($_newparentid),
                    'regionname' => htmlspecialchars(trim ($_newregionnames[$i]))
                );
                M('region')->add ($_cat);
            }
        }
		
		//删除
        if ($this->getParam ('delete')) {
            $ids = (array)$this->getParam ('delete');
            M('region')->remove ($ids);
        }
		
		//修改
        if ($this->getParam ('regionname')) {
            $_ids = $this->getParam ('id');
            $_parentids = $this->getParam ('pid');
            $_names = $this->getParam ('regionname');
            foreach ($_parentids as $i => $_parentid)
            {
                $_cat = array (
                    'id' => intval ($_ids[$i]),
                    'pid' => intval ($_parentid),
                    'regionname' => htmlspecialchars(trim ($_names[$i]))
                );
                M('region')->update ($_cat);
            }
        }
		
        $regionlist = M('region')->getRegionArea();
		
        $this->assign('regionlist', $regionlist);
		
		$this->display('admin/region_index.tpl');
    }
}