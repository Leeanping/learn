<?php
namespace Controller\Swfupload;

use Core\Controller\SAction;

/**
 *    swfupload批量上传控制器
 *
 *    @author    Snake.L
 *    @usage    none
 */

class Swfupload extends SAction
{
    private $_upload; //上传文件模型
    private $item_id = 0; //所属模型的ID
	private $belong = 0; 
	private $kindid = 0;
	private $m;
    public function __construct($params)
    {
		parent::__construct($params);
		
        if (isset($_GET['item_id']))
        {
            $this->item_id = $_GET['item_id'];
        }
		
		if (isset($_GET['belong']))
        {
            $this->belong = $_GET['belong'];
        }
		
		if (isset($_GET['kindid']))
        {
            $this->kindid = $_GET['kindid'];
        }
		
		if (isset($_GET['m']))
        {
            $this->m = $_GET['m'];
        }
		
        $this->_upload = new \Model\Gallery();
    }
	
    public function uploadAction()
    {
		$config = array(
            "pathFormat" => $this->m . '/image/{yyyy}{mm}{dd}/{time}{rand}',
            "maxSize" => 2048000,
            "allowFiles" => array(".png", ".jpg", ".jpeg", ".gif", ".bmp"),
			"ext" => $this->m
        );
        $fieldName = 'upfile';
        $ret_info = array(); // 返回到客户端的信息
		
		$file_path = \Core\Util\Upload::webuploader($fieldName, $config);
       
        /* 文件入库 */
        $data = array(
            'imginfo' => $file_path['title'],
			'imgurl'   => $file_path['link'],
            'thumburl' => $file_path['thumb'],
            'itemid'   => $this->item_id,
			'belong'   => $this->belong,
			'kindid'   => $this->kindid,
            'addtime'  => \Core\Fun::time(),
        );
        $file_id = $this->_upload->addGallery($data); //即gallery的id

        /* 返回客户端 */
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
	
	public function dropAction()
	{
		if ($this->getParam ('file_id')) 
		{
            $id = (int)$this->getParam ('file_id');
			$gallery = $this->_upload->getGalleryByGId($id);
			
			\Core\Fun\File::delete(BASEROOT . $gallery['imgurl']);
			\Core\Fun\File::delete(BASEROOT . $gallery['thumburl']);
			
            $this->_upload->deleteGalleryOne ($id);
			
			$json = array('msg' => 'ok');
			echo \Core\Fun::array2json($json);
        }
		else
		{
			$json = array('msg' => 'error');
			echo \Core\Fun::array2json($json);
		}
	}
	
	public function setindexAction()
	{
		if ($this->getParam ('m')) 
		{
            $model = $this->getParam ('m');
			$modelArr = explode('_', $model);
			$modeltrue = count($modelArr) == 1 ? $model : $modelArr[1];
			$pic = $this->getParam ('img_url');
			$thumb = $this->getParam ('thumb');
			$id = $this->getParam ('mid');
			
			$modelName = 'Model_' . ucfirst($model);
			$datamodel = strtolower($modeltrue);
			$_model = new $modelName();
			$data = array(
				'id' => $id,
				$datamodel . 'pic' => $pic,
				$datamodel . 'thumb' => $thumb
			);
			$update = $_model->update($data);
			
			if($update)
			{
				$json = array('msg' => 'ok');
				echo \Core\Fun::array2json($json);
			}
			else
			{
				$json = array('msg' => 'error');
				echo \Core\Fun::array2json($json);
			}
        }
		else
		{
			$json = array('msg' => 'error');
			echo \Core\Fun::array2json($json);
		}
	}
}

?>