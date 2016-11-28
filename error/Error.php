<?php
/**
 * 异常类基础
 *
 * @copyright   Copyright &copy; 2014 Vipshen
 * @author      Vipshen <shen200621@126.com>
 * @version     $Id: hyena.php 406 2014-09-01 06:28:04Z Vipshen $
 * @package     system
 */

namespace hyena;

class Error extends \Exception
{
    const FILE_NOT_WRITABLE = 1001;

    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }

    public static function fileNotFound($file)
    {
        return new static(t("{$file} is not exist or readable"));
    }

    public static function fileNotWritable($file)
    {
        return new static(t("{$file} is not writable"), self::FILE_NOT_WRITABLE);
    }

    public static function requireExtension($extension)
    {
        return new static("Require {$extension} extension");
    }
}
