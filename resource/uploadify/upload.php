<?php

include 'config.inc.php';

if (!empty($_FILES)) {
    $uid = intval( $_REQUEST['uid'] );
	$script = $_REQUEST['filec'];
    $ext = pathinfo($_FILES['Filedata']['name']);
    $ext = strtolower($ext['extension']);
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath   = ROOT_PATH . '/uploadfile/head/' . $uid . '/';
    if( !is_dir($targetPath) ){
        mkdir($targetPath,0777,true);
		fclose(fopen($targetPath . '/index.htm', 'w'));
    }
	$rand = rand(1,10000).time();
    $new_file_name = 'avatar_ori_'.$rand.'.'.$ext;
    $targetFile = $targetPath . $new_file_name;
    move_uploaded_file($tempFile,$targetFile);
    if( !file_exists( $targetFile ) ){
        $ret['result_code'] = 0;
        $ret['result_des'] = 'upload failure';
    } elseif( !$imginfo=getImageInfo($targetFile) ) {
        $ret['result_code'] = 101;
        $ret['result_des'] = 'File is not exist';
    } else {
        $img = '/uploadfile/head/' . $uid . '/'.$new_file_name;
		$imgurl = $script . 'uploadfile/head/' . $uid . '/'.$new_file_name;
        resize($img);
        $ret['result_code'] = 1;
        $ret['result_des'] = $imgurl;
    }
} else {
    $ret['result_code'] = 100;
    $ret['result_des'] = 'No File Given';
}
exit( json_encode( $ret ) );