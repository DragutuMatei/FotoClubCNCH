<?php
require_once '../core/init.php';

if (isset($_POST['like'])) {
    $user = new User();

    if($user->like(Input::get("post_id"), Input::get("id"))){
        echo "<script>javascript:history.go(-1);</script>";
    } else{
        echo "<script>
        sessionStorage.setItem('bad', true);
        history.go(-1);
        </script>";
    }

}
