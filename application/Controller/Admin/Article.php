<?php
namespace Controller\Admin;

use Core\Controller\Action;
/*
 * vpcv-cms
 * 文章管理
 * @author snake.L
 */
class Article extends Action
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
    	$title = $this->getParam('title');
    	$catid = $this->getParam('catid');
    	$moduleid = $this->getParam('moduleid');
    	$conditions = array();
    	$where = "1=1";
    	if($title)
    	{
    		$where .= " and title like '%$title%'";
    		$conditions['title'] = $title;
    	}
    	if($catid)
    	{
    		$where .= " and FIND_IN_SET('$catid', catarr)";
    		$conditions['catid'] = $catid;
    	}
    	if($moduleid)
    	{
    		$where .= " and moduleid = '$moduleid'";
    		$conditions['moduleid'] = $moduleid;
    	}
		$_orderby = "addtime DESC,sort ASC";
		
		$Num = M('article')->where($where)->getCount();
		$perpage = C('admin_page_size', 'basic', 20);
        $curpage = $this->getParam ('page') ? intval ($this->getParam ('page')) : 1;
        $_c = \Core\Comm\Util::map2str ($conditions, '/', '/');
        $_c = empty ($_c) ? '' : '/' . $_c;
		$mpurl = 'admin/article/index' . $_c . '/';
        $multipage = $this->multipage ($Num, $perpage, $curpage, $mpurl);
		$articles = M('article')->where($where)->order($_orderby)->limit($perpage * ($curpage - 1), $perpage)->select();
		foreach($articles AS $idx => $article)
		{
			$articles[$idx]['catname'] = M('nav')->where('id', $article['catid'])->getField('name');
			$articles[$idx]['modulename'] = M('base_module')->where('mark', $article['moduleid'])->getField('title');
		}
		
        $this->assign ('multipage', $multipage);
		$this->assign('articles', $articles);
		$this->assign('conditions', $conditions);
		$this->display('admin/article_index.tpl');
    }
	
	public function moreAction()
	{
        if($this->getParam('id'))
		{
			$_ids = $this->getParam ('id');
			$_istops = $this->getParam ('istop');
			$_isspecials = $this->getParam ('isspecial');
			$_isindexs = $this->getParam ('isindex');
			$_sorts = $this->getParam ('sort');
			$_useables = $this->getParam ('useable');
			foreach($_ids AS $i => $_id)
			{
				$_data = array (
                    'id' => intval ($_id),
					'istop' => intval($_istops[$_id]),
					'isspecial' => intval($_isspecials[$_id]),
					'isindex' => intval($_isindexs[$_id]),
					'sort' => intval($_sorts[$_id]),
					'useable' => intval($_useables[$_id])
                );

				M('article')->update ($_data);
			}
		}

		echo $this->returnJson(1, '操作成功，正在返回...');
	}

	public function deleteAction()
	{
        if ($this->getParam ('id')) 
		{
            $ids = (array)$this->getParam ('id');

            M('article')->deleteByIds($ids);
        }

		echo $this->returnJson(1, '操作成功，正在返回...');
	}
	
	public function addAction()
	{
		$action = $this->getParam('action');
		if($action && 'add' == $action)
		{
			if(empty($this->getParam('title'))){
				echo $this->returnJson(0, '请输入标题');
				exit;
			}
			$catid = $this->getParam('catid');
			if(empty($catid)){
				echo $this->returnJson(0, '请选择栏目');
				exit;
			}
			$shownum = $this->getParam('shownum');
			$shownum = $shownum ? $shownum : 1;
			$isview = $this->getParam('isview');
			$isview = $isview ? $isview : 0;
			$content = \Core\Util\Tutil::contentKeywords($this->getParam('content'));
			$cutstr = \Core\Comm\Util::utfSubstr(\Core\Comm\Util::Html2text($content), 100);
			$attachlist = \Core\Comm\Util::getAttchList($content);
			
			$catarr = M('nav')->getParendIds($catid);
			$moduleid = $this->getParam('moduleid');
			$classid = array_filter($this->getParam('classid'));
			$_Data = array(
				'title' => $this->getParam('title'),
				'catid' => intval($catid),
				'catarr' => $catarr,
				'classid' => implode(',', $classid),
				'shownum' => intval($shownum),
				'feednum' => intval($this->getParam('feednum')),
				'bestnum' => intval($this->getParam('bestnum')),
				'tagword' => $this->getParam('tagword'),
				'seotitle' => $this->getParam('seotitle'),
				'keywords' => $this->getParam('keywords'),
				'description' => $this->getParam('description'),
				'fileurl' => $this->getParam('fileurl'),
				'useable' => intval($this->getParam('useable')),
				'isview' => intval($isview),
				'content' => $content,
				'cutstr' => $cutstr,
				'moduleid' => $moduleid,
				'attachlist' => implode(',', $attachlist),
				'uid' => intval($_SESSION['isadmin']),
				'realname' => $_SESSION['adminrealname'],
				'sort' => intval($this->getParam('sort')),
				'updatetime' => CURTIME,
				'comefrom' => C('site_name', 'basic', 'vpcvcms'),
				'addtime' => CURTIME
			);
			if('' != $this->getParam('articlepic'))
			{
				$_Data['articlepic'] = $this->getParam('articlepic');
				$_Data['articlethumb'] = $this->getParam('articlethumb');
			}
			/*else
			{
				$attach = Core_Comm_Util::getAttch($content);
				$_Data['articlepic'] = $attach;
				$_Data['articlethumb'] = $attach;
			}*/
			$Id = M('article')->add($_Data);
			
			if($Id > 0)
			{
				if ($this->getParam('newfile_id'))
				{
					$_file_ids = $this->getParam('newfile_id');
					foreach ($_file_ids as $i => $file_id)
					{
						$galleryData = array(
								'id' => $file_id,
								'itemid' => $Id);
						M('gallery')->editGallery($galleryData);
					}
				}

				$columns = M('module')->mtable($moduleid)->getColumnList();
				$set = "`aid` = '$Id'";
				foreach($columns AS $column)
				{
					if($column['field'] != 'id' && $column['field'] != 'aid')
					{
						$value = $this->getParam($column['field']);
						$set .= ", `" . $column['field'] . "` = '$value'";
					}
				}

				\Core\Db::execute("INSERT INTO ##__base_module_" . $moduleid . " SET " . $set);

				\Core\Cache::del('_autosave/_article.php');
				echo $this->returnJson(1, '内容添加成功');
			}
			else
			{
				echo $this->returnJson(0, '内容添加失败');
			}
		}
		else
		{
			$_swfParams = array(
				'item_id' => 0, 
				'belong' => BELONG_ARTICLE,
				'm' => 'article'
			);
			$this->assign('swfupload', \Core\Fun\Swfupload::_build_upload($_swfParams)); //构建swfupload
			$galleries = M('gallery')->getGalleryList(0, BELONG_ARTICLE);
			$this->assign('gallerylist', $galleries);

			//获取联动信息
			$this->assign('classid', $this->getCategoryKind());

			$autosave = $this->getautosave();
			if(!empty($autosave)){
				$this->assign('content', \Core\Fun::getEditor('content', $autosave['content']));
				$article = $autosave;
				if($article['moduleid']){
					$extends = M('module')->mtable($article['moduleid'])->getExetendList($Id);
					foreach ($extends as $k => $v) {
						if($v['type'] == 'text'){
							$extends[$k]['value'] = \Core\Fun::getEditor($v['field'], $v['value'], 100, 700, 'bbs');
						}
					}

					$this->assign('extends', $extends);
				}
			}else{
				$this->assign('content', \Core\Fun::getEditor('content', $autosave['content']));
				$article['useable'] = 1;
				$article['moduleid'] = 'article';
			}
			
			$this->assign('picdom', 'articlepic');
			$this->assign('thumbdom', 'articlethumb');
			$this->assign('article', $article);
			$this->assign('_postName', 'add');
			$this->display('admin/article_info.tpl');
		}
	}
	
	public function editAction()
	{
		$Id = $this->getParam('id');
		if($Id <= 0)
		{
			echo $this->returnJson(0, '请正确操作');
		}
		$article = M('article')->where('id', $Id)->find();
		$action = $this->getParam('action');
		if($action && 'edit' == $action)
		{
			if(empty($this->getParam('title'))){
				echo $this->returnJson(0, '请输入标题');
				exit;
			}
			$catid = $this->getParam('catid');
			if(empty($catid)){
				echo $this->returnJson(0, '请选择栏目');
				exit;
			}
			$shownum = $this->getSafeParam('shownum');
			$shownum = $shownum ? $shownum : 1;
			$isview = $this->getParam('isview');
			$isview = $isview ? $isview : 0;
			$content = \Core\Util\Tutil::contentKeywords($this->getParam('content'));
			$cutstr = \Core\Comm\Util::utfSubstr(\Core\Comm\Util::Html2text($content), 100);
			$attachlist = \Core\Comm\Util::getAttchList($content);
			M('article')->where('id', $Id)->setField('attachlist', '');
			$catid = $this->getParam('catid');
			$catarr = M('nav')->getParendIds($catid);
			$moduleid = $this->getParam('moduleid');
			$classid = array_filter($this->getParam('classid'));
			$_Data = array(
				'id' =>$Id,
				'title' => $this->getParam('title'),
				'catid' => intval($catid),
				'catarr' => $catarr,
				'classid' => implode(',', $classid),
				'shownum' => intval($shownum),
				'feednum' => intval($this->getParam('feednum')),
				'bestnum' => intval($this->getParam('bestnum')),
				'tagword' => $this->getParam('tagword'),
				'seotitle' => $this->getParam('seotitle'),
				'keywords' => $this->getParam('keywords'),
				'description' => $this->getParam('description'),
				'fileurl' => $this->getParam('fileurl'),
				'useable' => intval($this->getParam('useable')),
				'isview' => intval($isview),
				'content' => $content,
				'cutstr' => $cutstr,
				'moduleid' => $moduleid,
				'attachlist' => implode(',', $attachlist),
				'sort' => intval($this->getParam('sort')),
				'updatetime' => CURTIME
			);

			if('' != $this->getParam('articlepic') && $this->getParam('articlepic') != $article['articlepic'])
			{
				\Core\Fun\File::delete(BASEROOT . $article['articlepic']);
				\Core\Fun\File::delete(BASEROOT . $article['articlethumb']);
				$_Data['articlepic'] = $this->getParam('articlepic');
				$_Data['articlethumb'] = $this->getParam('articlethumb');
			}
			/*else
			{
				$attach = Core_Comm_Util::getAttch($content);
				$attach && $_Data['articlepic'] = $attach;
				$attach && $_Data['articlethumb'] = $attach;
				$attach && Core_Fun_File::delete(BASEROOT . $article['articlepic']);
				$attach && Core_Fun_File::delete(BASEROOT . $article['articlethumb']);
			}*/
			$update = M('article')->update($_Data);
			
			if($update)
			{
				if ($this->getParam('newfile_id'))
				{
					$_file_ids = $this->getParam('newfile_id');
					foreach ($_file_ids as $i => $file_id)
					{
						$galleryData = array(
								'id' => $file_id,
								'itemid' => $Id);
						M('gallery')->editGallery($galleryData);
					}
				}
				if ($this->getParam('file_id'))
				{
					$_file_ids = $this->getParam('file_id');
					foreach ($_file_ids as $i => $file_id)
					{
						$galleryData = array(
								'id' => $file_id,
								'itemid' => $Id);
						M('gallery')->editGallery($galleryData);
					}
				}

				$columns = M('module')->mtable($moduleid)->getColumnList();

				$set = "`aid` = '$Id'";

				foreach($columns AS $column)

				{

					if($column['field'] != 'id' && $column['field'] != 'aid')

					{

						$value = $this->getParam($column['field']);

						$set .= ", `" . $column['field'] . "` = '$value'";

					}

				}
				$modulevalue = \Core\Db::fetchOne("SELECT id FROM ##__base_module_" . $moduleid . " WHERE aid = '$Id'");
				if($modulevalue['id'])
				{
					\Core\Db::execute("UPDATE ##__base_module_" . $moduleid . " SET " . $set . " WHERE aid = '$Id'");
				}
				else
				{
					\Core\Db::execute("INSERT INTO ##__base_module_" . $moduleid . " SET " . $set);
				}

				\Core\Cache::del('_autosave/_article.php');
				echo $this->returnJson(1, '内容修改成功');
			}
			else
			{
				echo $this->returnJson(0, '内容修改失败');
			}
		}
		else
		{
			$_swfParams = array(
				'item_id' => $Id, 
				'belong' => BELONG_ARTICLE,
				'm' => 'article'
			);
			$this->assign('swfupload', \Core\Fun\Swfupload::_build_upload($_swfParams)); //构建swfupload
			$galleries = M('gallery')->getGalleryList($Id, BELONG_ARTICLE);
			$this->assign('gallerylist', $galleries);

			//获取联动信息
			$this->assign('classid', $this->getCategoryKind($article['classid'], 'edit'));

			if($article['moduleid'])
			{
				$extends = M('module')->mtable($article['moduleid'])->getExetendList($Id);
				foreach ($extends as $k => $v) {
					if($v['type'] == 'text'){
						$extends[$k]['value'] = \Core\Fun::getEditor($v['field'], $v['value'], 100, 700, 'bbs');
					}
				}

				$this->assign('extends', $extends);
			}

			$this->assign('content', \Core\Fun::getEditor('content', $article['content']));
			$this->assign('picdom', 'articlepic');
			$this->assign('thumbdom', 'articlethumb');
			$this->assign('article', $article);
			$this->assign('_postName', 'edit');
			$this->display('admin/article_info.tpl');
		}
	}

	public function autosaveAction()
	{
		$data = $this->getParam('data');
		\Core\Cache::write('_autosave/_article.php', $data);
	}

	private function getautosave()
	{
		$data = \Core\Cache::read('_autosave/_article.php');
		parse_str($data, $arr);
		
		return $arr;
	}

	public function moduleAction()
	{
		$id = $this->getParam('id');
		$aid = $this->getParam('aid');
		$aid = $aid ? $aid : 0;
		$nav = M('nav')->where('id', $id)->find();

		$modelname = 'module' . $nav['moduleid'];
		$extends = M('module')->mtable($nav['moduleid'])->getExetendList($aid);
		$html = '';
		foreach($extends AS $extend)
		{
			$html .= '<tr class="noborder"><td class="first">' . $extend['comment'] . '</td><td class="vtop next" colspan="3">' . $this->setModuleType($extend) . '</td></tr>';
		}

		echo \Core\Fun::array2json(array('moduleid' => $nav['moduleid'], 'html' => $html));
	}

	public function softuploadAction()
	{
		$config = array(
            "pathFormat" => 'soft/{yyyy}{mm}{dd}/{time}{rand:6}',
            "maxSize" => 2048000000,
            "allowFiles" => array(".doc", ".docx", ".pdf", ".ppt"),
			"ext" => ''
        );
        $fieldName = 'file';
		
        $ret = array(); // 返回到客户端的信息
		
		$file_path = \Core\Util\Upload::webuploader($fieldName, $config, false, false);
		$json = array(
			"file_id" => $file_id,
            "state" => $file_path['state'],
            "url" => $file_path['link'],
			"thumb" => $file_path['thumb'],
            "title" => $file_path['title'],
            "original" => $file_path['original'],
            "type" => $file_path['type'],
            "size" => $file_path['size']
        );
        echo json_encode($json);
	}

	public function categoryAction(){
		$pid = $this->getParam('pid');
		$categories = M('category')->where('pid', $pid)->where('useable', 1)->select();

		echo \Core\Fun::array2json($categories);
	}

	private function getCategoryKind($classid = '', $action = 'add'){
		$categories = M('base_category')->where("pid = '0' and useable = '1'")->select();
		$html = '';
		if($categories){
			foreach ($categories as $key => $value) {
				$childs = M('base_category')->where("pid = '$value[id]' and useable = '1'")->select();
				$childhtml = '';
				foreach($childs as $child){
					if(strpos($classid, $child['id']) !== false){
						$selected = ' selected';
					}else{
						$selected = '';
					}
					$childhtml .= '<option value="' . $child['id'] . '"' . $selected . '>' . $child['catname'] . '</option>';

					$childrens = M('base_category')->where("pid = '$child[id]' and useable = '1'")->select();
					$childrenhtml = '';
					if($childrens && $action == 'edit'){
						$childrenhtml .= '<select name="classid[]"><option value="">请选择</option>';
						foreach($childrens as $children){
							if(strpos($classid, $children['id']) !== false){
								$selected = ' selected';
							}else{
								$selected = '';
							}
							$childrenhtml .= '<option value="' . $children['id'] . '"' . $selected . '>' . $children['catname'] . '</option>';
						}
						$childrenhtml .= '</select>';
					}
				}
				$html .= '<tr class="noborder">' .
				            '<td class="first">' .
				                '<span>' . $value['catname'] . '：</span>' .
				            '</td>' . 
				            '<td class="next" colspan="3">' .
				                '<span>' .
				                    '<select name="classid[]" onchange="getSonClass(this, ' . $value['id'] . ')">' .
				                        '<option value="">请选择</option>' . $childhtml .
				                    '</select>' .
				                '</span>' .
				                '<span id="sonclass' . $value['id'] . '">' . $childrenhtml . '</span>' .
				            '</td>' .
				        '</tr>';
			}
		}

		return $html;
	}

	private function setModuleType($extend)
	{
		if($extend['type'] == 'int' || $extend['type'] == 'tinyint' || $extend['type'] == 'char')
		{
			return '<input name="' . $extend['field'] . '" value="' . $extend['value'] . '" type="text" class="txt"  />';
		}
		elseif($extend['type'] == 'varchar')
		{
			return '<textarea rows="20" cols="80" name="' . $extend['field'] . '">' . $extend['value'] . '</textarea>';
		}
		elseif($extend['type'] == 'text')
		{
			return \Core\Fun::getEditor($extend['field'], $extend['value'], 100, 700, 'bbs');
		}
		elseif($extend['type'] == 'picture')
		{
			return '<div id="uploader-single">' .
	                    '<div id="fileList' . $extend['field'] . '" class="uploader-list">' .
	                        '<img width="120" height="90" src="' . $extend['value'] . '" />' .
	                    '</div>' .
	                    '<div id="filePicker' . $extend['field'] . '">选择图片</div>' .
	                '</div>' . 
	                '<input type="hidden" id="' . $extend['field'] . '" name="' . $extend['field'] . '" value="' . $extend['value'] . '">' . 
	                "<script type=\"text/javascript\">" . 
						"var picdom" . $extend['field'] . " = '" . $extend['field'] . "';" . 
						"\$list" . $extend['field'] . " = $('#fileList" . $extend['field'] . "');" . 
						"var singleuploader" . $extend['field'] . " = WebUploader.create({" . 
						    "auto: true," . 
						    "swf: SITE_URL + 'resource/webuploader/Uploader.swf'," . 
						    "server: SITE_URL + 'admin/ajax/pic'," . 
						    "pick: '#filePicker" . $extend['field'] . "'," . 
						    "accept: {" . 
						        "title: 'Images'," . 
						        "extensions: 'gif,jpg,jpeg,bmp,png'," . 
						        "mimeTypes: 'image/gif,image/jpg,image/jpeg,image/png'" . 
						    "}," . 
						    "fileNumLimit: 1," . 
						    "compress: false" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'fileQueued', function( file ) {" . 
						    "var \$li" . $extend['field'] . " = \$(" . 
						            "'<div id=\"' + file.id + '\" class=\"file-item thumbnail\">' +" . 
						                "'<img>' +" . 
						                "'<div class=\"info\">' + file.name + '</div>' +" . 
						            "'</div>'" . 
						            ")," . 
						        "\$img" . $extend['field'] . " = \$li" . $extend['field'] . ".find('img');" . 
						    "\$list" . $extend['field'] . ".html( \$li" . $extend['field'] . " );" . 
						    "singleuploader" . $extend['field'] . ".makeThumb( file, function( error, src ) {" . 
						        "if ( error ) {" . 
						            "\$img" . $extend['field'] . ".replaceWith('<span>不能预览</span>');" . 
						            "return;" . 
						        "}" . 

						        "\$img" . $extend['field'] . ".attr( 'src', src );" . 
						    "}, 120, 90 );" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'uploadProgress', function( file, percentage ) {" . 
						    "var \$li" . $extend['field'] . " = \$( '#'+file.id )," . 
						        "\$percent" . $extend['field'] . " = \$li" . $extend['field'] . ".find('.progress span');" . 
						    "if ( !\$percent" . $extend['field'] . ".length ) {" . 
						        "\$percent" . $extend['field'] . " = $('<p class=\"progress\"><span></span></p>')" . 
						                ".appendTo( \$li" . $extend['field'] . " )" . 
						                ".find('span');" . 
						    "}" . 
						    "\$percent" . $extend['field'] . ".css( 'width', percentage * 100 + '%' );" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'uploadSuccess', function( file, ret ) {" . 
						    "\$('#' + picdom" . $extend['field'] . ").val(ret.url);" . 
						    "\$( '#'+file.id ).addClass('upload-state-done');" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'uploadError', function( file ) {" . 
						    "var \$li" . $extend['field'] . " = $( '#'+file.id )," . 
						        "\$error" . $extend['field'] . " = \$li" . $extend['field'] . ".find('div.error');" . 
						    "if ( !\$error" . $extend['field'] . ".length ) {" . 
						        "\$error" . $extend['field'] . " = $('<div class=\"error\"></div>').appendTo( $li" . $extend['field'] . " );" . 
						    "}" . 

						    "\$error" . $extend['field'] . ".text('上传失败');" . 
						"});" . 
						"singleuploader" . $extend['field'] . ".on( 'uploadComplete', function( file ) {" . 
						    "\$( '#'+file.id ).find('.progress').remove();" . 
						"});" . 
						"<\/script>";
		}
		else
		{
			return '';
		}
	}
}