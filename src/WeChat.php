<?php
namespace Lawechat;

use Illuminate\Container\Container;

class WeChat
{

    public static function make($name, $config = null)
    {
        return Container::getInstance()->make($name);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}