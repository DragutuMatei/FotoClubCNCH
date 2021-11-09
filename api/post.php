<?php
require_once '../core/init.php';
require_once '../initCloudinary.php';

use Cloudinary\Api\Upload\UploadApi;



if (isset($_POST['submit'])) {

    $admin = new Admin();


    // \Cloudinary\Uploader::upload(
    //     $_FILES['img']['tmp_name'],
    //     array(
    //         "public_id" => 'a'
    //     )
    // );

    $up = new UploadApi();
    $up->upload($_FILES['img']['tmp_name'], array(
        "public_id"=>"alina"
    ));


    print_r($up);

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
