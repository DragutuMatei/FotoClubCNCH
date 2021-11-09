<?php
require_once '../core/init.php';

if (isset($_POST['submit'])) {
    $admin = new Admin();

    $img = Input::moveImg("alina/sezon/", array("poza"));

    $rez = $admin->addSezon(array(
        "tema" => Input::get("tema"),
        "poza" => $img[0],
    ));

    $path = "../admin.php?success=";

    $rez ? $path .= "true" : $path .= "false";

    Redirect::to($path);
}
