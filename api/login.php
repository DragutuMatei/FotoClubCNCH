<?php
require_once '../core/init.php';

if (isset($_POST['submit'])) {

    $user = new User();

    try {
        $user->login(Input::get("email"), Input::get("password"));
        echo "<script>javascript:history.go(-2);</script>";

    } catch (Exception $e) {
        $e->getMessage();
    }
}
