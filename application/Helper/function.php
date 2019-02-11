<?php

function M($name){
	return Loader::M($name);
}

function T($name){
	return Loader::T($name);
}

function C($key, $group, $default = ''){
	return \Core\Config::get($key, $group, $default);
}

function P($key){
	return \Core\Controller\Front::getInstance()->getParam($key);
}

function L($key){
	return \Core\Fun::Lang($key);
}

function isWenXin(){
	return \Core\Comm\Validator::isWeixin();
}

function isMobile(){
	return \Core\Comm\Validator::isMobile();
}

function isEmail(){
	return \Core\Comm\Validator::isEmail();
}

function isTelephone(){
	return \Core\Comm\Validator::isTelephone();
}
?>