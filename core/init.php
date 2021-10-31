<?php
session_start();

$GLOBALS['config'] = array(
    "mysql" => array(
        'host' => '127.0.0.1',
        "username" => 'root',
        'password' => '',
        'db' => 'alina'
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);


spl_autoload_register(function ($class) {
    // try {
    //     require_once './classes/' . $class . ".php";
    // } catch (Error) {
    //     //throw $th;
    // }

    if (file_exists('./classes/' . $class . '.php')) {
        require_once './classes/' . $class . ".php";
    } else {
        require_once '../classes/' . $class . ".php";
    }
});

function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
