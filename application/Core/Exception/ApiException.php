<?php
namespace Core\Exception;

use Core\Exception;

class ApiException extends Exception{
	public $params = array();

    public function __construct($msg, $code, $params=array())
    {
        parent::__construct($msg, $code, $params);

    }
}
?>