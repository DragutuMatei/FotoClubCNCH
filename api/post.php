<?php
// require_once '../core/init.php';
require_once '../initCloudinary.php';

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

// require_once '../core/init.php';
require_once '../classes/Config.php';

require_once '../classes/DB.php';

require_once '../classes/Input.php';
require_once '../classes/Redirect.php';
require_once '../classes/User.php';
require_once '../classes/Session.php';

require_once '../classes/Admin.php';

require_once '../initCloudinary.php';
use Cloudinary\Api\Upload\UploadApi;


if (isset($_POST['submit'])) {

    $admin = new Admin();


    $r = new UploadApi();
    $r = $r->upload($_FILES['img']['tmp_name'], ['folder' => 'alina']);
    
    
    print_r($r['secure_url']);

    try {
        $rez =   $admin->addPost(array(
            "poza" => "./assets/img/" . Input::getFILE("img")['name'],
            "user" => Input::get("user"),
            "sezon" => Input::get("sezon"),
            "descriere" => Input::get("descriere"),
            "users" => "[]",
            "gen" => Input::get("gen")
        ));
        $path = "../admin.php?success=";

        $rez ? $path .= "true" : $path .= "false";

        // Redirect::to($path);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
