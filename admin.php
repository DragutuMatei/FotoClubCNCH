<?php
require_once './core/init.php';

//trifan1alina2smecer3 - parola

$db = DB::getInstance();

$settings = $db->get("settings", array("id", ">=", "1"));
$settings = $settings->first();

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/scss/styles.css">
    <script src="https://kit.fontawesome.com/2647a8e79d.js" crossorigin="anonymous"></script>
    <title>FotoClubCNCH - admin -</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <form action="api/amin.php" method="POST">
        <div class="form-group">
            <label for="buttonfirst">buttonfirst</label>
            <input type="text" name="buttonfirst" placeholder="buttonfirst" value="<?php echo $settings->buttonfirst ?>">
        </div>

        <div class="form-group">
            <label for="upfirst">upfirst</label>
            <input type="text" name="upfirst" placeholder="upfirst" value="<?php echo $settings->upfirst ?>">
        </div>

        <div class="form-group">
            <label for="middlefirst">middlefirst</label>
            <input type="text" name="middlefirst" placeholder="middlefirst" value="<?php echo $settings->middlefirst ?>">
        </div>

        <div class="form-group">
            <label for="downfirst">downfirst</label>
            <input type="text" name="downfirst" placeholder="downfirst" value="<?php echo $settings->downfirst ?>">
        </div>

        <input type="text" name="upsecond" placeholder="upsecond" value="<?php echo $settings->upsecond ?>">
        <input type="text" name="middlesecond" placeholder="middlesecond" value="<?php echo $settings->middlesecond ?>">
        <input type="text" name="downsecond" placeholder="downsecond" value="<?php echo $settings->downsecond ?>">
        <input type="text" name="upthird" placeholder="upthird" value="<?php echo $settings->upthird ?>">
        <input type="text" name="middlethird" placeholder="middlethird" value="<?php echo $settings->middlethird ?>">
        <input type="text" name="downthird" placeholder="downthird" value="<?php echo $settings->downthird ?>">
        <input type="text" name="textdoi" placeholder="textdoi" value="<?php echo $settings->textdoi ?>">
        <input type="text" name="buttondoi" placeholder="buttondoi" value="<?php echo $settings->buttondoi ?>">
        <input type="text" name="titabout" placeholder="titabout" value="<?php echo $settings->titabout ?>">
        <input type="text" name="textabout" placeholder="textabout" value="<?php echo $settings->textabout ?>">
        <input type="text" name="buttonabout" placeholder="buttonabout" value="<?php echo $settings->buttonabout ?>">
        <input type="text" name="background" placeholder="background" value="<?php echo $settings->background ?>">
        <input type="text" name="secondcolor" placeholder="secondcolor" value="<?php echo $settings->secondcolor ?>">
        <input type="submit" name="submit" value="submit">
    </form>
    <br><br><br><br>
    <form action="api/amin.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="imgfirst" placeholder="imgfirst" value="<?php echo $settings->imgfirst ?>">
        <input type="file" name="imgsecond" placeholder="imgsecond" value="<?php echo $settings->imgsecond ?>">
        <input type="file" name="imgthird" placeholder="imgthird" value="<?php echo $settings->imgthird ?>">
        <input type="file" name="imgdoi" placeholder="imgdoi" value="<?php echo $settings->imgdoi ?>">
        <input type="file" name="imgabout" placeholder="imgabout" value="<?php echo $settings->imgabout ?>">
        <input type="file" name="imgfooter1" placeholder="imgfooter1" value="<?php echo $settings->imgfooter1 ?>">
        <input type="file" name="imgfooter2" placeholder="imgfooter2" value="<?php echo $settings->imgfooter2 ?>">
        <input type="file" name="loginimg" placeholder="loginimg" value="<?php echo $settings->loginimg ?>">

        <input type="submit" name="submitpoze" value="Submit poze">
    </form>
    <br><br><br><br>

    <form action="api/sezon.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="tema">
        <input type="file" name="poza">
        <input type="submit" name="submit" value="Submit">
    </form>

    <br><br><br><br>
    <form action="api/post.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="text" name="user">
        <textarea name="descriere" cols="30" rows="10"></textarea>

        <select name="sezon">
            <?php
            $sezoane = $db->get("sezoane", array("id", ">=", "0"));
            $sezoane = $sezoane->results();
            foreach ($sezoane as $sezon) {
                echo "<option value='" . $sezon->tema . "'>"
                    . $sezon->tema . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>

    <br><br><br><br>
    <?php
    $posts = $db->get("posts", array('id', ">=", "0"));
    $posts = $posts->results();
    $user = new User();
    ?>
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
            echo '<span class="card__status">
                                <form action="api/deletepost.php" method="POST">
                                    <input type="hidden" name="post_id" value="' . $post->id . '">
                                    <button style="background:none;" type="submit" name="delete"> <i class="fas fa-trash-alt"></i> </button>
                                </form>
                            </span>';

            echo   '</div>
                        </div>
                        <p class="card__description" style="color:' . $settings->secondcolor . '">' . $post->descriere . '</p>
                    </div>
                </div>';
        }
        ?>
    </div>
</body>

</html>