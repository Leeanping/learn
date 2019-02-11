<?php
namespace Controller\Admin;

use Core\Controller\Action;

/**
 * 工具
 *
 * @author snake.L
 */
class Tool extends Action
{

    /**
     * 更新缓存
     */
    public function updatecacheAction ()
    {
        if ($this->getParam ('updatecache')) 
		{
            \Core\Cache::updateAllCache ();
			echo $this->returnJson(1, '缓存清理成功');
        }
		else
		{
        	$this->display ('admin/tool_updatecache.tpl');
		}
    }
}