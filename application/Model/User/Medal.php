<?php
namespace Model\User;

use Core\Model;
/**

 * 用户勋章操作类

 *

 * @author Snake.L

 */

class Medal extends Model

{

	/**

	 * 表名

	 * 

	 * @var string

	 */

	public $_tableName = 'user_medal';

	

	/**

	 * 字段列表

	 * 

	 * @var array

	 */

	public $_fields = array('id', 'name', 'useable', 'image', 'type', 'sort', 'description', 'expiration', 'permission', 'credit', 'price');

	

	/**

	 * 主键字段名

	 * 

	 * @var string

	 */

	public $_idkey = 'id';

	

	public function addMedal($medalInfo)

	{

		return $this->add($medalInfo);

	}

	

	public function editMedal ($medalInfo)

    {

        $update = $this->update ($medalInfo);

        return $update;

    }

	

	public function deleteMedal ($medalid)

    {

        return $this->remove ($medalid);

    }

	

	 public function getMedalList ($whereArr=array (), $orderByArr=array (), $limitArr=array ())

    {

        return $this->queryAll ($whereArr, $orderByArr, $limitArr);

    }



    public function getMedalCount ($whereArr=array ())

    {

        return $this->getCount ($whereArr);

    }

}

