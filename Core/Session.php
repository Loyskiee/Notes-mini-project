<?php

namespace Core;

class Session
{

   

    public static function has ($key)
    {
        return(bool) self::get($key); //checks if key exists
    }

    public static function put ($key, $value)
    {
        $_SESSION['key'] = $value; //stores a data in the session
    }

     public static function get($key, $default = null)
    {
        return $_SESSION['_flash']['key'] ?? $_SESSION['key'] ?? $default; //retrive data from session
    }   

    public static function flash($key, $value)
    {
        $_SESSION['_flash']['key'] = $value; //store data for one request
    }

    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function flush()
    {
        $_SESSION = []; //clear entire session
    }
    public static function destroy()
    {
        self::flush(); //destroy session

        session_destroy();
    }
}
