<?php
require_once '../core/init.php';
require_once '../initCloudinary.php';
// use Cloudinary\Api\Upload\UploadApi;

if (isset($_POST['submit'])) {

    $admin = new Admin();

    // $r = new UploadApi();
    // $r = $r->upload($_FILES['img']['tmp_name'], ['folder' => 'alina/postari/']);

    $img = Input::moveImg("alina/postari/", array('img'));

    try {
        $rez =   $admin->addPost(array(
            // "poza" => $r['secure_url'],
            "poza" => $img[0],
            "user" => Input::get("user"),
            "sezon" => Input::get("sezon"),
            "descriere" => Input::get("descriere"),
            "users" => "[]",
            "gen" => Input::get("gen")
        ));
        $path = "../admin.php?success=";

        $rez ? $path .= "true" : $path .= "false";

        Redirect::to($path);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
