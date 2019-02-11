<?php
namespace Core\Controller;

use Core\Controller\Action;
/**

 *

 * Core_Controller_PluginAction 基类

 * 所有Plugin继承自此类

 * 

 * @author Icehu

 */

class PluginAction extends Action

{



	/**

     *

     * 调用一个模板并显示

     *

     * @param string $tpl

     * @author Icehu

     */

    public function display ($tpl)

    {

        $this->_setDefaultTplParams ();

        \Core\Template::renderPlugin ($tpl,  $this->getControllerName());

    }



}

