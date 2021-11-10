<?php
require_once '../core/init.php';

if (isset($_POST['submit'])) {

    $user = new User();

    if (Input::get("password1") == Input::get("password2")) {
        try {
            $user->create(array(
                'username' => Input::get('username'),
                'email' => Input::get('email'),
                'password' => hash("sha256", Input::get("password1") . Input::get("salt")),
                'salt' => Input::get("salt")
            ));

            echo "<script>javascript:history.go(-2);</script>";

        } catch (Exception $e) {
            $e->getMessage();
        }
    } else {
        Redirect::to("../register.php?parole=false");
    }
}
