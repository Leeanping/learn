<?php
namespace Core\Controller;

use Core\Controller\TAction;
/** 

 * 用户模块控制器基类

 *

 * @version $Id: Core_Controller_MAction.php $

 * @package Core

 * @time 2013/01/28

 */

class MAction extends TAction

{
    protected $user;
    /**

     * 分发前执行的操作

     * 如有需要请重载

     */

    public function preDispatch()
    {
        parent::preDispatch();

        if(!$this->checkLogged())
            $this->showmsg('', 'u/login', 0);
        $this->user = $this->userInfo;
    }
}