<?php
require_once '../core/init.php';

if (isset($_POST['submit'])) {
    $parola = "trifan1alina2smecer3";
    
    if (trim(Input::get("password")) == $parola) {
        Session::put("admin", true);
    } else {
        Session::put("notadmin", true);
    }
}
