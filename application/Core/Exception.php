<?php
namespace Core;

class Exception extends \Exception{
	public $params = array();

    public function __construct($msg, $code, $params=array())
    {
        parent::__construct($msg, $code);
        $this->params = (array) $params;
    }

    public function getParams()
    {
        return $this->params;
    }
}
?>