<?php
namespace Controller\Index;

use Core\Controller\Action;
/*
 * 验证码
 */
 
class Gd extends Action
{

	public function indexAction()
	{
		$width = $this->getParam('width');
		$width = $width ? $width : 100;
		$height = $this->getParam('height');
		$height = $height ? $height : 50;
		$gdcheck = new \Core\Lib\Gdcheck();
		$gdcheck->Img_x = $width;
		$gdcheck->Img_y = $height;
		$gdcheck->createImg();
	}

}