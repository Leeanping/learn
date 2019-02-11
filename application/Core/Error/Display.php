<?php
namespace Core\Error;

class Display{
    public static function show($exception)
    {
        $exceptionType = get_class($exception);
        $class= $exceptionType."_Error_Show";
        if(!class_exists($class, false))
        {
            $class= "Exception_Error_Show";
        }
        $errorShow = new $class($exception);
        $errorShow->dispatchShow();
    }
}
?>