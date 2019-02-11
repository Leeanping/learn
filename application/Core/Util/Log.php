<?php
namespace Core\Util;
/**

 * 

 * Log 日志处理方法

 *

 * @author Snake.L

 * 

 */

class Log

{

    /**

     * 日志存放目录

     * 以根目录为起点

     */

    const LOGDIR = 'logs';





    public static $apiRequstUrl = '';



    /**

     * 文件日志方法

     * @param string $filename 日志文件，会自动按日期分卷

     * @param string $logs 日志内容

     * @author Snake.L

     */

    public static function setFile($filename, $logs)

    {

		$filename = substr(md5($filename), 0, 2);

        $dir = ROOT . self::LOGDIR.'/_' . $filename . '/';

        $file = $dir . date('Ymd') . FILE_LOG;

		\Core\Fun\File::write($file, $logs, true);

    }

}

