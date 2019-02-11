<?php
namespace Core\Util;
/**
 * Upload上传 封装
 * @author Snake.L
 */
class Upload
{
	const EXT = 'txt,rar,zip,jpg,jpeg,JPG,JPEG,gif,png,swf,wmv,avi,wma,mp3,mp4,mid,flv,rm,rmvb';
	const upUrl = 'uploadfile';
	const thumbUrl = 'thumbfile';
	
	private static $fileField; //文件域名
    private static $file; //文件上传对象
    private static $base64; //文件上传对象
    private static $config; //配置信息
    private static $oriName; //原始文件名
    private static $fileName; //新文件名
    private static $fullName; //完整文件名,即从当前配置目录开始的URL
    private static $filePath; //完整文件名,即从当前配置目录开始的URL
    private static $fileSize; //文件大小
    private static $fileType; //文件类型
    private static $stateInfo; //上传状态信息,
    private static $stateMap = array( //上传状态映射表，国际化用户需考虑此处数据的国际化
        "SUCCESS", //上传成功标记，在UEditor中内不可改变，否则flash判断会出错
        "文件大小超出 upload_max_filesize 限制",
        "文件大小超出 MAX_FILE_SIZE 限制",
        "文件未被完整上传",
        "没有文件被上传",
        "上传文件为空",
        "ERROR_TMP_FILE" => "临时文件错误",
        "ERROR_TMP_FILE_NOT_FOUND" => "找不到临时文件",
        "ERROR_SIZE_EXCEED" => "文件大小超出网站限制",
        "ERROR_TYPE_NOT_ALLOWED" => "文件类型不允许",
        "ERROR_CREATE_DIR" => "目录创建失败",
        "ERROR_DIR_NOT_WRITEABLE" => "目录没有写权限",
        "ERROR_FILE_MOVE" => "文件保存时出错",
        "ERROR_FILE_NOT_FOUND" => "找不到上传文件",
        "ERROR_WRITE_CONTENT" => "写入文件内容错误",
        "ERROR_UNKNOWN" => "未知错误",
        "ERROR_DEAD_LINK" => "链接不可用",
        "ERROR_HTTP_LINK" => "链接不是http链接",
        "ERROR_HTTP_CONTENTTYPE" => "链接contentType不正确"
    );

	/**
	 * 上传文件工具
	 * useage Core_Utile_Upload::upload('file')
	 * useage Core_Utile_Upload::upload('file','jpg,png,gif')支持类型检查
	 * 返回数组
	 * 成功：array('code'=>0,'link'=>'不带域名的文件相对路径');
	 * 失败：array('code'=>'非0', 'msg' => '错误原因')
	 * @param string $inputFiled 文件上传的表单名
	 * @return int
	 * @author Icehu
	 */
	public static function upload( $inputFiled , $urlExt = '', $allowExt=FALSE, $maxsize=FALSE, $thumb=TRUE, $water = TRUE)
	{
		$attachdir = self::upUrl . $urlExt;//上传文件保存路径，结尾不要带/
		$dirtype=1;//1:按天存入目录 2:按月存入目录 3:按扩展名存目录  建议使用按天存
		$maxattachsize=$maxsize?$maxsize:104857600;//最大上传大小，默认是20M
		
		$rt = array(
			'code' => 0,
			'msg' => 'success',
			'link' => '',
			'thumb' => ''
		);

		$upfile=@$_FILES[$inputFiled];
		if(!isset($upfile))	
		{
			$rt['code'] = 10;
			$rt['msg'] = 'file_empty';
		}
		elseif(!empty($upfile['error']))
		{
			$rt['code'] = $upfile['error'];
			switch ($rt['code'])
			{
				case UPLOAD_ERR_INI_SIZE:
					$rt['msg'] = 'File_too_large';
					break;
				case UPLOAD_ERR_FORM_SIZE:
					$rt['msg'] = 'UPLOAD_ERR_FORM_SIZE';
					break;
				case UPLOAD_ERR_PARTIAL:
					$rt['msg'] = 'UPLOAD_ERR_PARTIAL';
					break;
				case UPLOAD_ERR_NO_FILE:
					$rt['msg'] = 'UPLOAD_ERR_NO_FILE';
					break;
				case UPLOAD_ERR_NO_TMP_DIR:
					$rt['msg'] = 'UPLOAD_ERR_NO_TMP_DIR';
					break;
				case UPLOAD_ERR_CANT_WRITE:
					$rt['msg'] = 'UPLOAD_ERR_CANT_WRITE';
					break;
			}
		}
		elseif(empty($upfile['tmp_name']) || $upfile['tmp_name'] == 'none')
		{
			$rt['msg'] = 10;
			$rt['msg'] = 'upload_error';
		}
		else
		{
			$temppath=$upfile['tmp_name'];
			$fileinfo=pathinfo($upfile['name']);
			$extension=$fileinfo['extension'];
			// 类型检查
			if($allowExt){
				if(strrpos($allowExt,strtolower($extension)) === FALSE){
					$rt['msg'] = '该类型文件无法上传,仅支持 '.$allowExt.' ';
					$rt['code'] = 10;
					return $rt;
				}
			}
			// end
			if( in_array(strtolower($extension), explode(',', self::EXT)) )
			{
				$bytes=filesize($temppath);
				if($bytes > $maxattachsize)
				{
					$rt['msg'] = '请不要上传大小超过' . \Core\Fun::formatBytes($maxattachsize) . '的文件';
					$rt['code'] = 10;
				}
				else
				{
					$waterenable = \Core\Config::get('enable', 'water', '0');
					$attach_subdir = 'day_' . \Core\Fun::date('ymd');
					$attach_dir = $attachdir . '/' . $attach_subdir;
					if(!file_exists(HTDOCS_ROOT . $attach_dir))
					{
						\Core\Fun\File::makeDir(HTDOCS_ROOT . $attach_dir);
						fclose(fopen(HTDOCS_ROOT . $attach_dir . '/index.htm', 'w'));
					}
					$filename=\Core\Fun::date("YmdHis") . mt_rand(1000,9999) . '.' . $extension;
					$target = HTDOCS_ROOT . $attach_dir . '/' . $filename; //完全地址

					rename($upfile['tmp_name'], $target);
					@chmod($target,0755);
					$_webroot = \Core\Fun::getWebroot();
					
					$link = $_webroot . $attach_dir . '/'.$filename; //大图地址
					
					$rt['link'] = $link;
					
					$imginfo = self::getImageInfo($target);
					$rt['width'] = $imginfo[0];
					$rt['height'] = $imginfo[1];
					$rt['size'] = ceil(filesize($target)/1024);
					$rt['imgname'] = $upfile['name'];
					
					if($thumb)
					{
						//生成缩略图
						self::getThumbPic($target, \Core\Config::get('thumb_width', 'basic', '240'), \Core\Config::get('thumb_height', 'basic', '180'), $urlExt);
						$rt['thumb'] =  $_webroot . self::thumbUrl . $urlExt . "/image/". \Core\Fun::date('Ymd') . '/' . $filename;
					}
					if($water)
					{
						if($waterenable)
						{
							self::setWater($target); //原图水印
							self::setWater(HTDOCS_ROOT . self::thumbUrl . $urlExt . "/image/". \Core\Fun::date('Ymd') . '/' . $filename);//缩略图水印
						}
					}
				}
			}
			else
			{
				$rt['msg'] = '该类型不允许!';
				$rt['code'] = 11;
			}
			@unlink($temppath);
		}

		return $rt;
	}
	
	public static function webuploader($fileField, $config, $thumb=TRUE, $water = TRUE)
    {
		self::$fileField = $fileField;
		self::$config = $config;
        $file = self::$file = $_FILES[self::$fileField];
        
		if (!$file) {
            self::$stateInfo = self::getStateInfo("ERROR_FILE_NOT_FOUND");
            return;
        }
        if (self::$file['error']) {
            self::$stateInfo = self::getStateInfo($file['error']);
        } else if (!file_exists($file['tmp_name'])) {
            self::$stateInfo = self::getStateInfo("ERROR_TMP_FILE_NOT_FOUND");
        } else if (!is_uploaded_file($file['tmp_name'])) {
            self::$stateInfo = self::getStateInfo("ERROR_TMPFILE");
        }else{
		
			$_webroot = \Core\Fun::getWebroot();
			$waterenable = \Core\Config::get('enable', 'water', '0');
	
			self::$oriName = $file['name'];
			self::$fileSize = $file['size'];
			self::$fileType = self::getFileExt();
			self::$fullName = self::getFullName();
			self::$filePath = HTDOCS_ROOT . self::upUrl . '/' . self::$fullName;
			self::$fileName = self::getFileName();
			$dirname = dirname(self::$filePath);
	
			//检查文件大小是否超出限制
			if (!self::checkSize()) {
				self::$stateInfo = self::getStateInfo("ERROR_SIZE_EXCEED");
			}
			
			if (!self::checkType()) {
				self::$stateInfo = self::getStateInfo("ERROR_TYPE_NOT_ALLOWED");
			}
	
			//创建目录失败
			if (!file_exists($dirname) && !mkdir($dirname, 0777, true)) {
				self::$stateInfo = self::getStateInfo("ERROR_CREATE_DIR");
			} else if (!is_writeable($dirname)) {
				self::$stateInfo = self::getStateInfo("ERROR_DIR_NOT_WRITEABLE");
			}
	
			if (!(move_uploaded_file($file["tmp_name"], self::$filePath) && file_exists(self::$filePath))) { //移动失败
				self::$stateInfo = self::getStateInfo("ERROR_FILE_MOVE");
			} else { //移动成功
				self::$stateInfo = self::$stateMap[0];
			}
			
			if($thumb)
			{
				self::getThumbPic(self::$filePath, \Core\Config::get('thumb_width', 'basic', '240'), \Core\Config::get('thumb_height', 'basic', '180'), '/' . self::$config['ext']);
				//生成缩略图
				$ext = self::$config['ext'] ? '/' . self::$config['ext'] : '';
				$thumburl =  $_webroot . self::thumbUrl . $ext . '/image/' . \Core\Fun::date('Ymd') . '/' . self::$fileName;
			}
			if($water)
			{
				if($waterenable)
				{
					self::setWater(self::$filePath);
				}
			}
		}
        return array(
            "state" => self::$stateInfo,
            "title" => self::$fileName,
            "original" => self::$oriName,
			"link" => $_webroot . self::upUrl . '/' . self::$fullName,
			"thumb" => $thumburl,
            "type" => self::$fileType,
            "size" => self::$fileSize
        );

    }
	
	private static function getStateInfo($errCode)
    {
        return !self::$stateMap[$errCode] ? self::$stateMap["ERROR_UNKNOWN"] : self::$stateMap[$errCode];
    }

    /**
     * 获取文件扩展名
     * @return string
     */
    private static function getFileExt()
    {
        return strtolower(strrchr(self::$oriName, '.'));
    }

    /**
     * 重命名文件
     * @return string
     */
    private static function getFullName()
    {
        //替换日期事件
        $t = time();
        $d = explode('-', date("Y-y-m-d-H-i-s"));
        $format = self::$config["pathFormat"];
        $format = str_replace("{yyyy}", $d[0], $format);
        $format = str_replace("{yy}", $d[1], $format);
        $format = str_replace("{mm}", $d[2], $format);
        $format = str_replace("{dd}", $d[3], $format);
        $format = str_replace("{hh}", $d[4], $format);
        $format = str_replace("{ii}", $d[5], $format);
        $format = str_replace("{ss}", $d[6], $format);
        $format = str_replace("{time}", $t, $format);

        //过滤文件名的非法自负,并替换文件名
        $oriName = substr(self::$oriName, 0, strrpos(self::$oriName, '.'));
        $oriName = preg_replace("/[\|\?\"\<\>\/\*\\\\]+/", '', $oriName);
        $format = str_replace("{filename}", $oriName, $format);

        //替换随机字符串
        $randNum = mt_rand(1, 100000);
        $format = str_replace("{rand}", $randNum, $format);

        $ext = self::getFileExt();
        return $format . $ext;
    }

    /**
     * 获取文件名
     * @return string
     */
    private static function getFileName () {
        return substr(self::$filePath, strrpos(self::$filePath, '/') + 1);
    }
	
    /**
     * 文件类型检测
     * @return bool
     */
    private static function checkType()
    {
        return in_array(self::getFileExt(), self::$config["allowFiles"]);
    }

    /**
     * 文件大小检测
     * @return bool
     */
    private static function  checkSize()
    {
        return self::$fileSize <= (self::$config["maxSize"]);
    }
	
	public static function getThumbPic($src, $w, $h, $urlExt = '')
	{
		$attachdir_thumb = self::thumbUrl . $urlExt;//上传文件保存路径，结尾不要带/
		$attach_thumb_subdir = 'image/' . \Core\Fun::date('Ymd');
		$attach_dir_thumb = $attachdir_thumb . '/' . $attach_thumb_subdir;
		if(!file_exists(HTDOCS_ROOT . $attach_dir_thumb))
		{
			\Core\Fun\File::makeDir(HTDOCS_ROOT . $attach_dir_thumb);
			fclose(fopen(HTDOCS_ROOT . $attach_dir_thumb . '/index.htm', 'w'));
		}
		
		$temp = pathinfo($src);
		$name = $temp["basename"];//文件名
		$dir = $temp["dirname"];//文件所在的文件夹
		$extension = $temp["extension"];//文件扩展名
		
		$savepath = HTDOCS_ROOT . $attach_dir_thumb. "/" . $name;//缩略图保存路径,新的文件名为*.thumb.jpg
		
		//获取图片的基本信息
		$info = self::getImageInfo($src);
		$width = $info[0];//获取图片宽度
		$height = $info[1];//获取图片高度
		$per1 = round($width/$height,2);//计算原图长宽比
		$per2 = round($w/$h,2);//计算缩略图长宽比
	
		//计算缩放比例
		if($per1>$per2 || $per1 == $per2)
		{
			//原图长宽比大于或者等于缩略图长宽比，则按照宽度优先
			$per = $w/$width;
		}
		if($per1<$per2)
		{
			//原图长宽比小于缩略图长宽比，则按照高度优先
			$per = $h/$height;
		}
		$temp_w = intval($width*$per);//计算原图缩放后的宽度
		$temp_h = intval($height*$per);//计算原图缩放后的高度
		$temp_img = imagecreatetruecolor($temp_w, $temp_h);//创建画布
		$im = self::create($src);
		imagecopyresampled($temp_img, $im, 0, 0, 0, 0, $temp_w, $temp_h, $width, $height);
		if($width<$w && $height<$h) //如果原图的宽度和高度都小于需要缩放的宽度高度,则直接复制过去.
		{
			@copy($src,$savepath);
			return $savepath;
		}
		if($per1>$per2)
		{
			imagejpeg($temp_img,$savepath, 100);
			imagedestroy($im);
			//return $savepath;
			return self::addBg($savepath,$w,$h,"w");
			//宽度优先，在缩放之后高度不足的情况下补上背景
		}
		if($per1==$per2)
		{
			imagejpeg($temp_img,$savepath,100);
			imagedestroy($im);
			return $savepath;
			//等比缩放
		}
		if($per1<$per2)
		{
			imagejpeg($temp_img,$savepath,100);
			imagedestroy($im);
			//return $savepath;
			return self::addBg($savepath,$w,$h,"h");
			//高度优先，在缩放之后宽度不足的情况下补上背景
		}
	}
	
	//获取图像基本信息
	public static function getImageInfo($src)
	{
		return getimagesize($src);
	}
	
	/**
	 * 创建图片，返回资源类型
	 * @param string $src 图片路径
	 * @return resource $im 返回资源类型 
	 */
	public static function create($src)
	{
		$info = self::getImageInfo($src);
		switch ($info[2])
		{
			case 1:
				$im = imagecreatefromgif($src);
				break;
			case 2:
				$im = imagecreatefromjpeg($src);
				break;
			case 3:
				$im = imagecreatefrompng($src);
				break;
			case 6:
				$im = imagecreatefromwbmp($src);
				break;
		}
		return $im;
	}
	
	/**
	 * 添加背景
	 * @param string $src 图片路径
	 * @param int $w 背景图像宽度
	 * @param int $h 背景图像高度
	 * @param String $first 决定图像最终位置的，w 宽度优先 h 高度优先 wh:等比
	 * @return 返回加上背景的图片
	 */
	public static function addBg($src, $w, $h, $fisrt="w")
	{
		$bg = imagecreatetruecolor($w, $h);
		$white = imagecolorallocate($bg, 255, 255, 255);
		imagefill($bg, 0, 0, $white);//填充背景
	
		//获取目标图片信息
		$info = self::getImageInfo($src);
		$width = $info[0];//目标图片宽度
		$height = $info[1];//目标图片高度
		$img = self::create($src);
		if($fisrt == "wh")
		{
			//等比缩放
			return $src;
		}
		else
		{
			if($fisrt == "w")
			{
				$x = 0;
				$y = ($h-$height)/2;//垂直居中
			}
			if($fisrt == "h")
			{
				$x = ($w-$width)/2;//水平居中
				$y = 0;
			}
			
			imagecopymerge($bg, $img, $x, $y, 0, 0, $width, $height, 100);
			imagejpeg($bg, $src, 100);
			imagedestroy($bg);
			imagedestroy($img);
			return $src;
		}
	}
	
	/*----
	$imgSrc：目标图片，可带相对目录地址，
	$markImg：水印图片，可带相对目录地址，支持PNG和GIF两种格式
	$markText：给图片添加的水印文字
	$TextColor：水印文字的字体颜色
	$markPos：图片水印添加的位置，取值范围：0~9
	0：随机位置，在1~8之间随机选取一个位置
	1：顶部居左 2：顶部居中 3：顶部居右 4：左边居中
	5：图片中心 6：右边居中 7：底部居左 8：底部居中 9：底部居右
	$fontType：具体的字体库，可带相对目录地址
	$markType：图片添加水印的方式，image代表以图片方式，text代表以文字方式添加水印
	------*/
	public static function setWater($imgSrc)
	{
		$markImg = \Core\Config::get('markimg', 'water', 'resource/images/water.png');
		$markText = \Core\Config::get('marktext', 'water', 'HST');
		$markPos = \Core\Config::get('markpos', 'water', '0');
		$fontSize = \Core\Config::get('fontsize', 'water', '12');
		$markType = \Core\Config::get('marktype', 'water', 'text');
		$markDiaphaneity = \Core\Config::get('diaphaneity', 'water', '90');
		$TextColor = '58,11,165';
		$srcInfo = @getimagesize($imgSrc);
		$srcImg_w    = $srcInfo[0];
		$srcImg_h    = $srcInfo[1];
		if($srcImg_w < 300) return;
		
		switch ($srcInfo[2]) 
		{ 
			case 1: 
				$srcim =imagecreatefromgif($imgSrc); 
				break; 
			case 2: 
				$srcim =imagecreatefromjpeg($imgSrc); 
				break; 
			case 3: 
				$srcim =imagecreatefrompng($imgSrc); 
				break; 
			default: 
				die("不支持的图片文件类型"); 
				exit; 
		}
		if(!strcmp($markType,"image")) //使用图片加水印.
		{
			$markImg = HTDOCS_ROOT . $markImg;
		   
			if(!file_exists($markImg) || empty($markImg))
			{
				return;
			}
				
			$markImgInfo = @getimagesize($markImg);
			$markImg_w    = $markImgInfo[0];
			$markImg_h    = $markImgInfo[1];
			
			switch ($markImgInfo[2]) 
			{ 
				case 1: 
					$markim =imagecreatefromgif($markImg); 
					break; 
				case 2: 
					$markim =imagecreatefromjpeg($markImg); 
					break; 
				case 3: 
					$markim =imagecreatefrompng($markImg); 
					break; 
				default: 
					die("不支持的水印图片文件类型"); 
					exit; 
			}
				
			$logow = $markImg_w;
			$logoh = $markImg_h;
		}
		if(!strcmp($markType,"text"))
		{
		   	$fontType = HTDOCS_ROOT . "data/elephant.ttf";
			if(!empty($markText))
			{
				if(!file_exists($fontType))
				{
					 echo " fonttype not exist";
					return;
				}
			}
			else {
				return;
			}
			
			$box = @imagettfbbox($fontSize, 0, $fontType, $markText);
			
			$logow = max($box[2], $box[4]) - min($box[0], $box[6]);
			$logoh = max($box[1], $box[3]) - min($box[5], $box[7]);
		}
		if($markPos == 0)
		{
			$markPos = rand(1, 9);
		}
		switch($markPos)
		{
			case 1:
				$x = +5;
				$y = +20;
				break;
			case 2:
				$x = ($srcImg_w - $logow) / 2;
				$y = +20;
				break;
			case 3:
				$x = $srcImg_w - $logow - 5;
				$y = +20;
				break;
			case 4:
				$x = +5;
				$y = ($srcImg_h - $logoh) / 2;
				break;
			case 5:
				$x = ($srcImg_w - $logow) / 2;
				$y = ($srcImg_h - $logoh) / 2;
				break;
			case 6:
				$x = $srcImg_w - $logow - 5;
				$y = ($srcImg_h - $logoh) / 2;
				break;
			case 7:
				$x = +5;
				$y = $srcImg_h - $logoh - 5;
				break;
			case 8:
				$x = ($srcImg_w - $logow) / 2;
				$y = $srcImg_h - $logoh - 5;
				break;
			case 9:
				$x = $srcImg_w - $logow - 5;
				$y = $srcImg_h - $logoh -5;
				break;
			default: 
				die("此位置不支持"); 
				exit;
		}
		$dst_img = @imagecreatetruecolor($srcImg_w, $srcImg_h);
		imagecopy ( $dst_img, $srcim, 0, 0, 0, 0, $srcImg_w, $srcImg_h);
			
		if(!strcmp($markType,"image"))
		{
			//imagecopymerge($dst_img, $markim, $x, $y, 0, 0, $logow, $logoh, $markDiaphaneity);
			imagecopyresampled($dst_img, $markim, $x, $y, 0, 0, $logow, $logoh, $logow, $logoh);
			imagedestroy($markim);
	
		}
			
		if(!strcmp($markType,"text"))
		{
			$rgb = explode(',', $TextColor);
			$waterText = \Core\Fun::iconv('GB2312', 'UTF-8', $markText);
			$color = imagecolorallocate($dst_img, $rgb[0], $rgb[1], $rgb[2]);
			imagettftext($dst_img, $fontSize, 0, $x, $y, $color, $fontType,$waterText);
		}
		switch ($srcInfo[2]) 
		{ 
			case 1:
				imagegif($dst_img, $imgSrc); 
				break; 
			case 2: 
				imagejpeg($dst_img, $imgSrc); 
				break; 
			case 3: 
				imagepng($dst_img, $imgSrc); 
				break;
			default: 
				die("不支持的水印图片文件类型"); 
				exit; 
		}
			
		imagedestroy($dst_img);
		imagedestroy($srcim);
	}
	
	public static function thumbPic($img, $x, $y, $w, $h)
	{
		$image = $img;
		if( $image == '' )
		{
			$ret['result_code'] = 101;
			$ret['result_des'] = "图片不存在";
		} else {
			$image = HTDOCS_ROOT . $image;
			$info = self::getImageInfos( $image);
			if( !$info ){
				$ret['result_code'] = 102;
				$ret['result_des'] = "图片信息不存在";
			} else {
				$width = $srcWidth = $info['width'];
				$height = $srcHeight = $info['height'];
				$type = empty($type)?$info['type']:$type;
				$type = strtolower($type);
				unset($info);
				// 载入原图
				$createFun = 'imagecreatefrom'.($type=='jpg'?'jpeg':$type);
				$srcImg     = $createFun($image);
				//创建缩略图
				if($type!='gif' && function_exists('imagecreatetruecolor'))
					$thumbImg = imagecreatetruecolor($width, $height);
				else
					$thumbImg = imagecreate($width, $height);
				// 复制图片
				if(function_exists("imagecopyresampled"))
					imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth,$srcHeight);
				else
					imagecopyresized($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height,  $srcWidth,$srcHeight);
				if('gif'==$type || 'png'==$type) {
		
					$background_color  =  imagecolorallocate($thumbImg,  0,255,0);
					imagecolortransparent($thumbImg,$background_color);
				}
				// 对jpeg图形设置隔行扫描
				if('jpg'==$type || 'jpeg'==$type) 
					imageinterlace($thumbImg,1);
				// 生成图片
				$imageFun = 'image'.($type=='jpg'?'jpeg':$type);
				$thumbname01 = str_replace("ori", "150", $image);
				$thumbname02 = str_replace("ori", "50", $image);
				$thumbname03 = str_replace("ori", "30", $image);
				$imageFun($thumbImg,$thumbname01,100);
				$imageFun($thumbImg,$thumbname02,100);
				$imageFun($thumbImg,$thumbname03,100);
				$thumbImg01 = imagecreatetruecolor(150,150);
				imagecopyresampled($thumbImg01,$thumbImg,0,0,$x,$y,150,150,$w,$h);
				
				$thumbImg02 = imagecreatetruecolor(50,50);
				imagecopyresampled($thumbImg02,$thumbImg,0,0,$x,$y,50,50,$w,$h);
				
				$thumbImg03 = imagecreatetruecolor(30,30);
				imagecopyresampled($thumbImg03,$thumbImg,0,0,$x,$y,30,30,$w,$h);
				
				$imageFun($thumbImg01,$thumbname01,100);
				$imageFun($thumbImg02,$thumbname02,100);
				$imageFun($thumbImg03,$thumbname03,100);
				imagedestroy($thumbImg01);
				imagedestroy($thumbImg02);
				imagedestroy($thumbImg03);
				imagedestroy($thumbImg);
				imagedestroy($srcImg);
				$ret['result_code'] = 1;
				$ret['result_des'] = array(
					"big"   => str_replace(HTDOCS_ROOT, \Core\Fun::getWebroot(), $thumbname01),
					"middle"=> str_replace(HTDOCS_ROOT, \Core\Fun::getWebroot(), $thumbname02),
					"small" => str_replace(HTDOCS_ROOT, \Core\Fun::getWebroot(), $thumbname03),
					"normal" => \Core\Fun::getWebroot() . $img
				);
			}
		}
		return $ret;
	}
	
	public static function getImageInfos( $img )
	{
		$imageInfo = getimagesize($img);
		if( $imageInfo!== false) {
			$imageType = strtolower(substr(image_type_to_extension($imageInfo[2]),1));
			$info = array(
					"width"		=>$imageInfo[0],
					"height"	=>$imageInfo[1],
					"type"		=>$imageType,
					"mime"		=>$imageInfo['mime'],
			);
			return $info;
		}else {
			return false;
		}
	}
}
