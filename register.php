<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FotoClubCNCH</title>
</head>

<body>

    <form action="api/register.php" method="POST">
        <input type="text" name="username">
        <input type="email" name="email">
        <input type="password" name="password1">
        <input type="password" name="password2">
        <input type="hidden" name="salt" value="<?php echo time(); ?>">
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>