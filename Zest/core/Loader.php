<?php
/**
 * Created by arangda.
 * Date: 2019/2/28
 * Time: 16:53
 */
namespace Zest\core;
class Loader
{
    public static function loadClass()
    {

    }

    public static function loadLibClass($class)
    {
        echo $class;
        $classFile = $class.'.php';
        require_once $classFile;
    }
}