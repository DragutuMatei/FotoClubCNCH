<?php
require_once './core/init.php';

$db = DB::getInstance();

$settings = $db->get("settings", array("id", ">=", "1"));
$settings = $settings->first();

$id = $_GET['sezon'];
$sezon = $db->get("sezoane", array('id', "=", $id));
$sezon = $sezon->first();
$posts = $db->get("posts", array('sezon', "=", $sezon->tema));
$posts = $posts->results();
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
    <script src="https://kit.fontawesome.com/2647a8e79d.js" crossorigin="anonymous"></script>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/scss/styles.css">
    <title>FotoClubCNCH</title>
</head>

<body style="background: <?php echo $settings->background ?>">

    <?php require_once './components/navbar.php'; ?>

    <main class="main" style="padding-top: 100px ;">
        <script>
            if (sessionStorage.getItem("bad")) {
                alert("amin");
                sessionStorage.clear();
            }
        </script>

        <div class="cards">
            <?php
            foreach ($posts as $post) {
                echo '
                <div class="card">
                    <img src="' . $post->poza . '" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                            <img class="card__thumb" src="assets/img/user.svg" alt="" />
                            <div class="card__header-text">
                                <h3 class="card__title">' . $post->user . '</h3>';
                if ($user->isLoggedIn())
                    if (!$user->likeCheck($post->id, $user->data()->id)) {
                        echo '<span class="card__status">
                                <form action="api/like.php" method="POST">
                                    <input type="hidden" name="post_id" value="' . $post->id . '">
                                    <input type="hidden" name="id" value="' . $user->data()->id . '">
                                    <button style="background:none;" type="submit" name="like"><i class="fas fa-heart"></i> Apreciază poza</button>
                                </form>
                            </span>';
                    } else {
                        echo '<span class="card__status"> Ai apreciat deja aceasta poza </span>';
                    }
                else
                    echo '<span class="card__status"> <a href="login.php"> Logheaza-te ca sa dai like</a> </span>';


                echo   '</div>
                        </div>
                        <p class="card__description" style="color:' . $settings->secondcolor . '">' . $post->descriere . '</p>
                    </div>
                </div>';




                // echo '
                //     <div class="post">
                //         <img src="' . $post->poza . '" alt="">
                //         <h2>' . $post->user . '</h2>
                //         <p>' . $post->descriere . '</p>
                //         ';
                // $user = new User();
                // if ($user->isLoggedIn()) {
                //     echo '
                //         <form action="api/like.php" method="POST">
                //             <input type="hidden" name="post_id" value="' . $post->id . '">
                //             <input type="hidden" name="id" value="' . $user->data()->id . '">
                //             <input type="submit" value="Apreciez poza" name="like">
                //         </form>
                //     </div>
                // ';
                // } else {
                //     echo '<a href="login.php">Loghează-te ca să poți aprecia o poză</a>';
                // }
            }
            ?>
        </div>
    </main>

</body>

</html>