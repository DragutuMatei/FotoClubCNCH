<?php
require_once '../core/init.php';

if (isset($_POST['submit'])) {
    $parola = "trifan1alina2smecer3";

    if (trim(Input::get("password")) == $parola) {
        Session::put("admin", true);
    } else {
        Session::put("notadmin", true);
    }
    Redirect::to("../redirect.php");
}

if (isset($_POST['sezonsubmit'])) {
    $user = new User();
    $user->deleteSezon(intval(Input::get("sezon")));
    Redirect::to("../admin.php");
}
