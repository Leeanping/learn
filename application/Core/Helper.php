<?php
namespace Core;
/**
 * 自定义函数库
 *
 * @author Snake.L
 */
class Helper
{
    public static function getShow($id){
        $shownum = M('article')->where('id', $id)->getField('shownum');
        return $shownum;
    }

    public static function showBriefOne($params){
    	return 'catid:' . $params['catid'];
    }

    public static function showBriefTwo($params){
    	return 'params:' . $params;
    }

    public static function cutStr($paramstr)
    {
        return $paramstr;
    }
}