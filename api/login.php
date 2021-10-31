<?php
require_once '../core/init.php';

if (isset($_POST['submit'])) {

    $user = new User();

    try {
        $user->login(Input::get("email"), Input::get("password"));
        Redirect::to("../index.php");
    } catch (Exception $e) {
        $e->getMessage();
    }
}
