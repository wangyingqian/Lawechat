<?php
namespace Lawechat;

use Illuminate\Container\Container;

class WeChat
{
    private static $manager;

    public static function make($name, $config = null)
    {
        if (empty(self::$manager)){
            self::$manager = Container::getInstance()->make('wechat.manager');
        }

        return self::$manager->$name;
    }

    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}