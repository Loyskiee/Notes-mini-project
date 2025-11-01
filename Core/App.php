<?php

namespace Core;

/* static shortcut for container
*give a class and give a static property called container
* create a static function container that returns the container
*bind and resolve it
*/

class App {
    protected static $container;

    public static function setContainer($container)
    {
        static::$container;
    }

    public static function container() 
    {
        return static::$container;
    }

    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }
}