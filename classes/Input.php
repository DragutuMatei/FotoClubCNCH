<?php
require_once '../initCloudinary.php';

use Cloudinary\Api\Upload\UploadApi;

class Input
{
    public static function exists($type = "post")
    {
        switch ($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case "get":
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }

    public static function get($item)
    {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        }
        return '';
    }

    public static function getFILE($item)
    {
        if (isset($_FILES[$item])) {
            return $_FILES[$item];
        }
        return '';
    }

    public static function moveImg($folder, $names = array())
    {
        $r = new UploadApi();
        $urls = array();
        foreach ($names as $name) {
            $r = $r->upload($_FILES[$name]['tmp_name'], ['folder' => $folder]);
            array_push($urls, $r['secure_url']);
        }
        return $urls;
    }
}
