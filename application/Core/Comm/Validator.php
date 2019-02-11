<?php
namespace Core\Comm;
/**

 * 验证类

 *

 * @author Snake.L

 * @version $Id: Core_Comm_Validator.php $

 * @package Controller

 * @time 2013/01/28

 */

class Validator

{



    /**

     * 判断是否是通过手机访问

     * @return bool 是否是移动设备    

     */

    public static function isMobile()

    {

        $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

        //判断手机发送的客户端标志

        if(isset($_SERVER['HTTP_USER_AGENT']))

        {

            $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 

            'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 

            'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'opera mobi', 'openwave', 'nexusone', 'cldc', 'midp', 

            'wap', 'mobile');

            // 从HTTP_USER_AGENT中查找手机浏览器的关键字

            if(preg_match("/(" . implode('|', $clientkeywords) . ")/i", $userAgent) && strpos($userAgent,'ipad') == 0)

            {

                return true;

            }

        }



        return false;

    }

    /**

     * 判断是否是微信访问

     * @return bool 是否是微信客户端    

     */

    public static function isWeiXin()

    {

        $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

        //判断手机发送的客户端标志

        if(isset($_SERVER['HTTP_USER_AGENT']))

        {

            // 从HTTP_USER_AGENT中查找微信的关键字

            if(strpos($userAgent,'micromessenger') !== false)

            {

                return true;

            }

        }



        return false;

    }



    /**

     * 验证json回调函数名

     * @param $callback

     * @

     */

    public static function checkCallback($callback)

    {

        if(empty($callback))

        {

            return false;

        }

        if(preg_match("/^[a-zA-Z_][a-zA-Z0-9_\.]*$/", $callback))

        {

            return true;

        }

        return false;

    }

    

	/**

	 * 检验email

	 *

	 *@access   public

	 *@param    str $str

	 *@return   bool

	 **/

	public function isEmail($str){

		return filter_var($str, FILTER_VALIDATE_EMAIL);

		//return preg_match ( "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $str );

	}

	public function isTelephone($str){
		return preg_match("/^1[3456789]\d{9}$/", $str) ? true : false;
	}

    /**

     * 检查上传文件的合法性

     * @param $file

     * return 未上传文件 false

     *        上传文件成功 ture

     *        上传文件失败 <0

     */

    public static function checkUploadFile(&$file)

    {

        if(empty($file) || empty($file['name']) )

        {

            return false;

        }

        if($file['error']!==0)//上传失败

         {

             switch ($file['error'])

            { 

                case UPLOAD_ERR_INI_SIZE: //文件超php大小

                    $code = \Core\Comm\Modret::RET_T_UPLOAD_ERR_INI_SIZE;

                    break; 

                case UPLOAD_ERR_FORM_SIZE: //文件超form大小

                    $code = \Core\Comm\Modret::RET_T_UPLOAD_ERR_FORM_SIZE;

                    break; 

                case UPLOAD_ERR_PARTIAL: //上传不完整

                    $code = \Core\Comm\Modret::RET_T_UPLOAD_ERR_PARTIAL;

                    break; 

                case UPLOAD_ERR_NO_FILE: //没有上传

                    $code = false;

                    break; 

                case UPLOAD_ERR_NO_TMP_DIR: //服务器文件夹错误

                    $code = \Core\Comm\Modret::RET_T_UPLOAD_ERR_NO_TMP_DIR;

                    break; 

                case UPLOAD_ERR_CANT_WRITE: //服务器写权限错误

                    $code = \Core\Comm\Modret::RET_T_UPLOAD_ERR_CANT_WRITE;

                    break; 

                case UPLOAD_ERR_EXTENSION: //上传异常

                    $code = \Core\Comm\Modret::RET_T_UPLOAD_ERR_EXTENSION;

                    break; 

                default: //上传异常

                    $code = \Core\Comm\Modret::RET_T_UPLOAD_ERR_EXTENSION;

                    break; 

            }



        }else{

            $code = true;//上传成功

        }

        

         return $code;

    }

    /**

     * 检查上传文件的合法性

     * @param $file

     * @

     */

    public static function isUploadFile(&$file)

    {

        if(empty($file) || empty($file['tmp_name']))

        {

            return false;

        }

        if( is_uploaded_file($file['tmp_name']))

        {

            $fileSize = intval($file['size']);

            $tmpFile = $file['tmp_name'];

            

            if($fileSize < 0 || $file['error'] > 0 || empty($tmpFile))

            {

                return false;

            }

            return true;

        }

        

        return false;

    }

}

?>