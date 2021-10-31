<?php

require_once '../core/init.php';

$user = new User();
$user->logout();
echo "<script>javascript:history.go(-1);</script>";