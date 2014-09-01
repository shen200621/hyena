<?php
/**
 * 自动加载器
 *
 * @copyright   Copyright &copy; 2014 Vipshen
 * @author      Vipshen <shen200621@126.com>
 * @version     $Id: Autoload.php 406 2014-09-01 06:28:04Z Vipshen $
 * @package     system
*/ 

namespace hyena;

class Autoload
{
    private static $_paths = array();
    private static $_registered = false;

    public static function import($dir, $ns_prefix = null, $force_import = false) {}

    public static function autoload($class_name) {}

    public static function register($enabled = true) {}

    public static function isRegistered()
    {
        return self::$_registered === true;
    }
}
