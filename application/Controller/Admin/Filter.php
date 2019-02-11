<?php
namespace Controller\Admin;

use Core\Controller\Action;
/**

 * 词语过滤管理

 *

 * @author Gavin <yaojungang@comsenz.com>

 */

class Filter extends Action

{



    private $_filterObj;



    public function __construct ($params)

    {

        parent::__construct ($params);

        $this->_filterObj = new \Model\Filter();

    }



    /**

     * 列表

     */

    public function indexAction ()

    {

        //新增

        if ($this->getParam ('newword')) {

            $_word = trim ($this->getParam ('newword'));

            $_newreplacement = $this->getParam ('newreplacement') ? trim ($this->getParam ('newreplacement')) : '**';

            $_filter = array (

                'word' => $_word,

                'replacement' => $_newreplacement

            );

            if ($this->_filterObj->checkWorkExists ($_word)) {

                $this->showmsg ('<font color="red">添加失败:</font>关键词 '.$_word.' 已存在');

            } else {

                $this->_filterObj->addFilter ($_filter);

                $this->showmsg ('添加成功');

            }

        }

        //删除

        if ($this->getParam ('delete')) {

            $ids = (array)$this->getParam ('delete');

            $this->_filterObj->deleteFilter ($ids);

            $this->showmsg ('删除成功');

        }

        //修改

        if ($this->getParam ('word') && $this->getParam ('replacement')) {

            $_words = (array)$this->getParam ('word');

            $_replacements = (array)$this->getParam ('replacement');

            foreach ($_words as $_word_key => $_word_value)

            {

                $_filter = array (

                    'id' => $_word_key,

                    'word' => trim($_word_value),

                    'replacement' => trim($_replacements[$_word_key])

                );

                $this->_filterObj->updateFilter ($_filter);

            }

            $this->showmsg ('修改成功');

        }

         //查询条件

        $whereArr = array ();

        $conditions = array ();

        //总数量

        $count = $this->_filterObj->getCount ($whereArr);

        $this->assign ('count', $count);

        //分页

        $perpage = C('admin_page_size', 'basic', 20);

        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;

        $_c = \Core\Comm\Util::map2str ($conditions, '/', '/');

        $_c = empty ($_c) ? '' : '/' . $_c;

        $mpurl = '/admin/filter/index' . $_c . '/';

        $multipage = $this->multipage ($count, $perpage, $curpage, $mpurl);



        $this->assign ('multipage', $multipage);

        $filters = $this->_filterObj->queryAll ($whereArr, 'id DESC', array ($perpage, $perpage * ($curpage - 1)));



        $this->assign ('filters', $filters);

        $this->assign ('stateOption', array(1=>'审核',2=>'禁止'));



        $this->display ('admin/filter_index.tpl');

    }



}