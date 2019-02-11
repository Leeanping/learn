<?php
namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
/**
 * 发送邮件方法
 * @author Lee
 *
 * 使用配置组：mail
 * 说明如下：
 * array (
	  'open' => '1',	//是否开启
	  'type' => 'smtp',	//类型	smtp or sendmail or mail
	  'smtp_server' => 'smtp.exmail.qq.com',	//smtpserver
	  'smtp_port' => '25',	//smtm端口
	  'sender' => 'xxxx@xxxx.xx',	//发件人地址
	  'auth' => '1',	//是否需要授权
	  'smtp_user' => 'xxxx@xxxx.xx', //smtp 验证用户
	  'smtp_pwd' => '111111',	//smtp 用户密码
	  'sendmail_path' => '',	//sendmail地址
	  'sendmail_args' => '',	//sendmail 参数
	);
 *
 */
class Mail
{
	/**
	 *
	 * 发送邮件方法
	 *
	 * @param string $recipients 收件人
	 * @param string $subject 主题
	 * @param string $body 内容
	 * @param bool $debug 是否调试
	 * @return bool
	 * @author Lee
	 */
	public static function send($recipients, $subject , $body , $debug = 0)
    {
        $config = C(null, 'mail', array());
		$charset = 'utf-8';

		if($config['open'])
		{
			$mail = new PHPMailer;
			$mail->CharSet = $charset;
			$mail->Subject = $subject;
			$mail->IsHTML(true); 
			$type = $config['type'];
			$params = array();
			if($type == 'smtp')
			{
				$mail->isSMTP();
				$mail->SMTPDebug = $debug;
				$mail->Host = $config['smtp_server'];
				$mail->Port = $config['smtp_port'];
				if($config['auth']){
					$mail->SMTPAuth = true;
					$mail->Username = $config['smtp_user'];
					$mail->Password = $config['smtp_pwd'];
				}
				
				$mail->From = $config['smtp_user'];
				$mail->FromName = C('site_name', 'site');
			}
			elseif($type == 'sendmail')
			{
				$mail->isSendmail();
				$mail->From = $config['smtp_user'];
				$mail->FromName = C('site_name', 'site');
			}

			$mail->addAddress($recipients);
			$mail->msgHTML($body);

			$result = $mail->send();
			if ($result){
				return true;
			}else{
				return "Mailer Error: " . $mail->ErrorInfo;
			}
		}
    }
}
