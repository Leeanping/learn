<?php
namespace Controller\Wap;

use Core\Controller\WapAction;
/**
 * vpcvcms
 * 页面
 */
class Article extends WapAction
{
	public function preDispatch() 
	{
        parent::preDispatch();

        $this->crumb = array();
	}
    public function indexAction()
    {
		$this->display('wap/article/index.tpl');
    }

    public function showAction()
    {
    	$id = $this->getParam('id');
        $article = M('article')->where('id', $id)->find();
        if(!$article['id'])
            $this->showmsg('', 'index/index/none', 0);
        if($article['isview'] == 1)
            $this->showmsg('注册访问', 'u/login');
        M('article')->where('id', $id)->setInc('shownum', 1);

        $extends = M('module')->mtable($article['moduleid'])->queryOne('*', array(array('aid', $article['id'])));
        $article['extend'] = $extends;
        $article['seotitle'] = $article['seotitle'] ? $article['seotitle'] : $article['title'];
        $nav = M('nav')->where('id', $article['catid'])->find();
        $template = !empty($nav['temparticle']) ? $nav['temparticle'] : 'show_' . $nav['moduleid'] . '.tpl';
        $this->assign('crumb', $this->getCrumb($article['catid'], $article['title']));
        $this->assign('prevnext', $this->getPrevNext($id));
        $this->assign('galleries', M('gallery')->getGalleryList($id, BELONG_ARTICLE));
        $this->assign('article', $article);
        $this->assign('nav', $nav);
        $this->display('wap/article/' . $template);
    }

    public function listAction()
    {
    	$pinyin = $this->getParam('pinyin');
        $nav = M('nav')->getNavByPinyin($pinyin);
    	if(!$nav['id'])
    		$this->showmsg('', 'index/index/none', 0);
        if($nav['isview'] == 1)
            $this->showmsg('注册访问', 'u/login');

        $nav['style'] = $nav['style'] ? $nav['style'] : 1;
        $nav['seotitle'] = $nav['seotitle'] ? $nav['seotitle'] : $nav['name'];

        $this->assign('nav', $nav);
        $this->assign('crumb', $this->getCrumb($nav['id']));
    	if($nav['style'] == 1)
        {
            $where = "useable = '1'";
            if($nav['id']){
                $where .= " and FIND_IN_SET('$nav[id]', catarr)";
            }

            $_orderby = "addtime DESC,sort ASC";
            
            $Num = M('article')->where($where)->getCount();
            
            $perpage = !empty($nav['perpage']) ? $nav['perpage'] : C('page_size', 'basic', 20);
            $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
            $mpurl = '/wap/article/' . $pinyin . '/';
            $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
            $articles = M('article')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
            foreach($articles AS $idx => $article)
            {
                $pinyin = M('nav')->where('id', $article['catid'])->getField('pinyin');
                $pic = $article['articlethumb'] ? $article['articlethumb'] : \Core\Fun::getPathroot() . 'resource/images/default.jpg';
                $origin = $article['articlepic'] ? $article['articlepic'] : \Core\Fun::getPathroot() . 'resource/images/default.jpg';
                $articles[$idx]['articlethumb'] = $articles[$idx]['image'] = $pic;
                $articles[$idx]['origin'] = $origin;
                $articles[$idx]['catname'] = M('nav')->where('id', $article['catid'])->getField('name');
                $articles[$idx]['url'] = \Core\Fun::getPathroot() . 'wap/article/' . $pinyin . '/' . $article['id'] . '.html';
                $extends = M('module')->mtable($article['moduleid'])->queryOne('*', array(array('aid', $article['id'])));
                $articles[$idx]['extend'] = $extends;
            }

            $template = !empty($nav['templist']) ? $nav['templist'] : 'list_' . $nav['moduleid'] . '.tpl';

            $this->assign ('multipage', $multipage);
            $this->assign('articles', $articles);
            $this->display('wap/article/' . $template);
        }
    	else if($nav['style'] == 2)
        {
            $template = !empty($nav['tempindex']) ? $nav['tempindex'] : 'index_' . $nav['moduleid'] . '.tpl';
            $this->display('wap/article/' . $template);
        }
        else
        {
            $this->showmsg('', 'index/index/none', 0);
        }
    }

    public function getCrumb($navid)
    {
        $nav = M('nav')->where('id', $navid)->find();
        $childs = M('nav')->where('parentid', $navid)->getCount();
        $pathroot = \Core\Fun::getPathroot();
        if($nav['parentid'] == 0)
        {
            return '<span> &raquo; </span><span><a href="' . $pathroot . 'wap/article/' . $nav['pinyin'] . '">' . $nav['name'] . '</a></span>' . ($title ? '<span> &raquo; </span><span>' . $title . '</span>' : '');
        }
        else
        {
            $crumb = implode('', $this->getCrumbTree($navid));
            return $crumb . '<span> &raquo; </span><span><a href="' . $pathroot . 'wap/article/' . $nav['pinyin'] . '">' . $nav['name'] . '</a></span>' . ($title ? '<span> &raquo; </span><span>' . $title . '</span>' : '');
        }
    }

    private function getCrumbTree($navid)
    {
        $nav = M('nav')->where('id', $navid)->find();
        $pathroot = \Core\Fun::getPathroot();
        if($nav['parentid'] != 0)
        {
            $parent = M('nav')->where('id', $nav['parentid'])->find();
            array_push($this->crumb, '<span> &raquo; </span><span><a href="' . $pathroot . 'wap/article/' . $parent['pinyin'] . '">' . $parent['name'] . '</a></span>');
            $this->getCrumbTree($nav['parentid']);
        }

        return array_reverse($this->crumb);
    }

    private function getPrevNext($aid)
    {
        $moduleid = M('article')->where('id', $aid)->getField('moduleid');
        $moduleid = $moduleid ? $moduleid : 'article';
        $mobile = 'wap/';
        $prev = M('article')->queryOne('id,catid,title', array(array('id', $aid, '<'), array('moduleid', $moduleid)), 'id DESC');
        $pinyin = M('nav')->where("id = '$prev[catid]'")->getField('pinyin');
        $prev['url'] = SITEURL . $mobile . 'article/' . $pinyin . '/' . $prev['id'] . '.html';
        $next = M('article')->queryOne('id,catid,title', array(array('id', $aid, '>'), array('moduleid', $moduleid)), 'id ASC');
        $pinyin = M('nav')->where("id = '$next[catid]'")->getField('pinyin');
        $next['url'] = SITEURL . $mobile . 'article/' . $pinyin . '/' . $next['id'] . '.html';

        return array('prev' => $prev, 'next' => $next);
    }
}