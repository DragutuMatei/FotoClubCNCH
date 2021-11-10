<?php
require_once './core/init.php';

$db = DB::getInstance();

$settings = $db->get("settings", array("id", ">=", "1"));
$settings = $settings->first();

$sezoane = $db->get("sezoane", array("id", ">=", "0"), " ORDER BY id DESC");
$sezoane = $sezoane->results();
$user = new User();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/scss/styles.css">
    <title>FotoClubCNCH</title>
</head>

<body style="background: <?php echo $settings->background ?>">

    <?php require_once './components/navbar.php'; ?>

    <main class="main" style="padding-top: 100px ;">
        <div class="sezoane">

            <?php
            for ($i = 0; $i < count($sezoane); $i++) {
                echo '
            <a href="posts.php?sezon=' . $sezoane[$i]->id . '" class="sezon" style="box-shadow: 0 0 10px ' . $settings->secondcolor . '">
                <img src="' . $sezoane[$i]->poza . '" alt="">
                <h2>Sezon ' . $i + 1 . '</h2>
                <p>tema: ' . $sezoane[$i]->tema . '</p>
            </a>';
            }
            ?>
        </div>
    </main>

<?php require_once './components/footer.php'; ?>
</body>

</html>