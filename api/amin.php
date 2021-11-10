<?php
require_once '../core/init.php';

if (isset($_POST['submitpoze'])) {

    $imgs = Input::moveImg("alina/settings/", array("imgfirst", "imgsecond", "imgthird", "imgdoi", "imgabout", "imgfooter1", "imgfooter2", "loginimg"));


    $admin = new Admin();
    $id = $admin->getId();

    $rez = $admin->editSite($id, array(
        // "imgfirst" => "./assets/img/" . $_FILES['imgfirst']['name'],
        // "imgsecond" =>  "./assets/img/" . $_FILES['imgsecond']['name'],

        // "imgthird" =>  "./assets/img/" . $_FILES['imgthird']['name'],
        // "imgdoi" => "./assets/img/" . $_FILES['imgdoi']['name'],

        // "imgabout" => "./assets/img/" . $_FILES['imgabout']['name'],
        // "imgfooter1" => "./assets/img/" . $_FILES['imgfooter1']['name'],
        // "imgfooter2" => "./assets/img/" . $_FILES['imgfooter2']['name'],

        // "loginimg" => "./assets/img/" . $_FILES['loginimg']['name'],

        "imgfirst" => $imgs[0],
        "imgsecond" =>  $imgs[1],

        "imgthird" =>  $imgs[2],
        "imgdoi" => $imgs[3],

        "imgabout" => $imgs[4],
        "imgfooter1" => $imgs[5],
        "imgfooter2" => $imgs[6],

        "loginimg" => $imgs[7],

    ));

    $path = "../admin.php";
    $rez ? $path .= "?success=true" : $path .= "?success=false";

    Redirect::to($path);
}
if (isset($_POST['submit'])) {
    $admin = new Admin();
    $id = intval($admin->getId());
    $rez = $admin->editSite($id, array(
        "buttonfirst" => Input::get('buttonfirst'),
        "upfirst" => Input::get('upfirst'),
        "middlefirst" => Input::get('middlefirst'),
        "downfirst" => Input::get('downfirst'),
        // "imgfirst" => "./assets/img/" . $_FILES['imgfirst']['name'],
        "upsecond" => Input::get('upsecond'),
        "middlesecond" => Input::get('middlesecond'),
        "downsecond" => Input::get('downsecond'),
        // "imgsecond" =>  "./assets/img/" . $_FILES['imgsecond']['name'],
        "upthird" => Input::get('upthird'),
        "middlethird" => Input::get('middlethird'),
        "downthird" => Input::get('downthird'),
        // "imgthird" =>  "./assets/img/" . $_FILES['imgthird']['name'],
        // "imgdoi" => "./assets/img/" . $_FILES['imgdoi']['name'],
        "textdoi" => Input::get('textdoi'),
        // "buttondoi" => Input::get('buttondoi'),
        "titabout" => Input::get('titabout'),
        "textabout" => Input::get('textabout'),
        // "buttonabout" => Input::get('buttonabout'),
        // "imgabout" => "./assets/img/" . $_FILES['imgabout']['name'],
        // "imgfooter1" => "./assets/img/" . $_FILES['imgfooter1']['name'],
        // "imgfooter2" => "./assets/img/" . $_FILES['imgfooter2']['name'],
        "background" => Input::get('background'),
        "secondcolor" => Input::get('secondcolor'),
    ));

    $path = "../admin.php";
    $rez ? $path .= "?success=true" : $path .= "?success=false";

    Redirect::to($path);
}
