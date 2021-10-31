<?php
class Session
{
    public static function put($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        if (Session::exists($name))
            return $_SESSION[$name];
    }

    public static function exists($name)
    {
        if (isset($_SESSION[$name])) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete($name)
    {
        if (Session::exists($name)) {
            unset($_SESSION[$name]);
            return true;
        } else {
            return false;
        }
    }
}
