<?php
namespace Core\Language\Admin;
/*
 * 后台语言文件
 * 
 * author snake.L
 *
 * @site http://www.vpcv.cpm
 */
class Admin
{
	public function Lang()
	{
		return array(
		  'login_info' => '请填写登陆信息',
		  'login_username' => '用户名',
		  'login_password' => '密码',
		  'login_gdkey' => '验证码',
		  'login_gdkey_tip' => '看不清？换一张',
		  'login_gdkey_fail' => '验证码不正确',
		  'login_user_empty' => '用户名或密码不能为空',
		  'login_user_fail' => '用户名或密码不正确',
		  'login_failed' => '登陆系统失败',
		  'login_succed' => '登陆系统成功',
		  'login_exit' => '退出系统',
		  'login_exit_failed' => '退出系统失败'
		);
	}
}
?>