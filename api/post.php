<?php
require_once '../core/init.php';

if (isset($_POST['submit'])) {

    $admin = new Admin();

    Input::moveImg(array("img"));

    try {
        $rez =   $admin->addPost(array(
            "poza" => "./assets/img/".Input::getFILE("img")['name'],
            "user" => Input::get("user"),
            "sezon" => Input::get("sezon"),
            "descriere" => Input::get("descriere"),
            "users" => "[]",
            "gen"=>Input::get("gen")
        ));
        $path = "../admin.php?success=";

        $rez ? $path .= "true" : $path .= "false";

        Redirect::to($path);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
