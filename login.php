<?php
require_once './core/init.php';

$db = DB::getInstance();
$settings = $db->get("settings", array("id", ">=", "1"));
$settings = $settings->first();

$user = new User();
if ($user->isLoggedIn())
    Redirect::to("index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FotoClubCNCH</title>
    <link rel="stylesheet" href="assets/scss/styles.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">


</head>

<body>
    <?php
    require_once './components/navbar.php';
    ?>


    <div class="all" style="background: url(<?php echo $settings->loginimg; ?>); background-position: center right;">
        <form style="background: <?php echo $settings->background ?>" action="api/login.php" method="POST" class="left">
            <h1>Login</h1>
            <input type="email" name="email" placeholder="email" placeholder="Email">
            <input type="password" name="password" placeholder="password" placeholder="Parola">
            <input type="submit" name="submit" value="Submit">
            <a href="register.php">Nu ai cont? Înregistrează-te </a>
        </form>
    </div>
    <?php require_once './components/footer.php'; ?>

</body>

</html>
<!-- site facut de Dragutu Matei 
        fb: https://www.facebook.com/dragutu.matei/
        insta: https://www.instagram.com/dragutumatei/
    -->