<?php
require_once './core/init.php';

$db = DB::getInstance();
$settings = $db->get("settings", array("id", ">=", "1"));
$settings = $settings->first();

$user = new User();

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
        <form style="background: <?php echo $settings->background ?>" class="left" action="api/register.php" method="POST">
            <h1>Regiter</h1>
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password1" placeholder="Parola">
            <input type="password" name="password2" placeholder="Rescrie parola">
            <input type="hidden" name="salt" value="<?php echo time(); ?>">
            <input type="submit" name="submit" value="Submit">
            <a href="login.php">Ai cont? Conectează-te</a>
            <?php
            if (isset($_GET['parole']) && $_GET['parole'] == "false") {
                echo "<h1>Ai gresit parolele!</h1>";
            }
            ?>
        </form>
    </div>


</body>

</html>