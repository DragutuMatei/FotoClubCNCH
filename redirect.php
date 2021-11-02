<?php
require_once './core/init.php';

if (Admin::hasAccess()) {
    Redirect::to("admin.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php
    if (Session::get("notadmin")) {
        echo "<h1>Parola gresita</h1>";
        Session::delete("notadmin");
    }
    ?>

    <form action="api/admin.api.php" method="post">
        <input type="password" name="password" placeholder="Scrie parola">
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>