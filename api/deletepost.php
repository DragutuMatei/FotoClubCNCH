<?php
require_once '../core/init.php';

if (isset($_POST['delete'])) {
    $admin = new Admin();

    if ($admin->deletePost(array("id", "=", Input::get("post_id")))) {
        Redirect::to("../admin.php?nop=false");
    } else {
        Redirect::to("../admin.php?nop=true");
    }
}
