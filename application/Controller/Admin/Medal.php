<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*

 * 勋章管理

 * @author Snake.L

 */

class Medal extends Action

{

	private $_medalModel = null;

	

	public function __construct($params)

	{

		parent::__construct($params);

		$this->_medalModel = new \Model\User\Medal();

	}

	

	/**

     * 分类首页

     */

    public function indexAction()

    {		

		$_orderby = "sort DESC";

		

		$Num = $this->_medalModel->getMedalCount();

		

		$perpage = C('admin_page_size', 'basic', 20);

        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;

        $_c = \Core\Comm\Util::map2str ($_searchArr['conditions'], '/', '/');

        $_c = empty ($_c) ? '' : '/' . $_c;

		$mpurl = '/admin/medal/index' . $_c . '/';

        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);

		$medals = $this->_medalModel->getMedalList('', $_orderby, array($perpage, $perpage * ($curpage - 1)));

        $this->assign ('multipage', $multipage);

		$this->assign('medals', $medals);

		$this->display('admin/medal_index.tpl');

    }

	

	public function moreAction()

	{

		//删除

        if ($this->getParam ('delete')) 

		{

            $ids = (array)$this->getParam ('delete');

            $this->_medalModel->deleteMedal ($ids);

        }

		

		//修改

        if ($this->getParam ('name')) 

		{

            $_ids = $this->getParam ('id');

			$_sorts = $this->getParam('sort');

			$_useables = $this->getParam ('useable');

			$_names = $this->getParam('name');

			$_descriptions = $this->getParam('description');

			$_images = $this->getParam('image');

            foreach ($_ids as $i => $_id)

            {

                $_data = array (

                    'id' => intval ($_id),

					'sort' => $_sorts[$i],

					'name' => $_names[$i],

					'description' => $_descriptions[$i],

					'image' => $_images[$i],

					'useable' => intval ($_useables[$i])

                );

                $this->_medalModel->editMedal ($_data);

            }

            $this->showmsg ('操作成功，正在返回...');

        }

	}

}