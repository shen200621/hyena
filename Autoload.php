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

    public static function import($dir, $ns_prefix = null, $force_import = false)
    {
        $dir = rtrim(realpath($dir), '\//') . DIRECTORY_SEPARATOR;
        if (! isset(self::$_paths[$dir]) || $force_import = false)
        {
            self::$_paths[$dir] = ltrim($ns_prefix, '\\');
        }
    }

    public static function autoload($class_name)
    {
        // when class name == class dir
        $real_class_name = ltrim(strrchr($class_name, '\\'), '\\');
        $real_class_path = strtolower(str_replace('\\', '/', substr($class_name, 0, strrpos($class_name, '\\'))) . '/' . $real_class_name);
        if ($class_name{0} == '\\')
        {
            $class_name = ltrim($class_name, '\\');
        }
        if (strpos($class_name, '\\') !== false)
        {
            $filename = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
        }
        else
        {
            $filename = $class_name . '.php';
        }
        
        foreach (self::$_paths as $dir => $ns_prefix)
        {
            if ($ns_prefix)
            {
                $prefix_len = strlen($ns_prefix);
                if (strncasecmp($class_name, $ns_prefix, $prefix_len) !== 0)
                {
                    continue;
                }
                $tmp_class_name = substr($class_name, $prefix_len);
        
                $tmp_filename = str_replace('\\', DIRECTORY_SEPARATOR, $tmp_class_name) . '.php';
                $tmp_filename = ltrim($tmp_filename, '/');
                $path = $dir . $tmp_filename;
                $tmp_real_class_path = substr($real_class_path, $prefix_len);
                $path_extra = $dir . $tmp_real_class_path . '/' . $real_class_name . '.php';
            }
            else
            {
                $path = $dir . $filename;
                $path_extra = $dir . $real_class_path . '/' . $real_class_name . '.php';
            }
        
            if (is_file($path))
            {
                require($path);
                return;
            }
            elseif (is_file($path_extra))
            {
                require($path_extra);
                return;
            }
        }
    }

    public static function register($enabled = true)
    {
        if ($enabled)
        {
            if (true === self::isRegistered());
            {
                return;
            }
            self::$_registered = true;
            spl_autoload_register(array('\\potato\\Autoload', 'autoload'));
        }
        else
        {
            self::$_registered = false;
            spl_autoload_unregister(array('\\potato\\Autoload', 'autoload'));
        }
    }

    public static function isRegistered()
    {
        return self::$_registered === true;
    }
}
