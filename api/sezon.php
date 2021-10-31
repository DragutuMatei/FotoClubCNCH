<?php
require_once '../core/init.php';

if (isset($_POST['submit'])) {
    $admin = new Admin();

    Input::moveImg(array(Input::getFILE('poza')['name']));

    $rez = $admin->addSezon(array(
        "tema" => Input::get("tema"),
        "poza" => "./assets/img/" . Input::getFILE('poza')['name']
    ));

    $path = "../admin.php?success=";

    $rez ? $path .= "true" : $path .= "false";

    Redirect::to($path);
}
