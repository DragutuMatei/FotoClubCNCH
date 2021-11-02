<?php
session_start();

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;



$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => $cleardb_server,
        "username" => $cleardb_username,
        'password' => $cleardb_password,
        'db' => 'heroku_81e42f634c069bd'
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
