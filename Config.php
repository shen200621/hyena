<?php
/**
 * 框架配置管理
 *
 * @copyright   Copyright &copy; 2014 Vipshen
 * @author      Vipshen <shen200621@126.com>
 * @version     $Id: Config.php 406 2014-09-01 06:28:04Z Vipshen $
 * @package     system
*/ 

namespace hyena;

class Config
{
    private static $_config = array();

    public static function import(array $config)
    {
        self::$_config = array_merge(self::$_config, $config);
    }

    public static function get($name = null, $default = null) {}

    public static function set($name, $value) {}
}

// 载入框架默认配置
if (file_exists(__DIR__ . '/_config/default.php'))
{
    Config::import(require(__DIR__ . '/_config/default.php'));
}
