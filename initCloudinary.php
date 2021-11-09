<?php
require_once 'vendor/autoload.php';
use Cloudinary\Configuration\Configuration;

Configuration::instance([
    'cloud' => [
      'cloud_name' => 'thobor', 
      'api_key' => '745867666258536', 
      'api_secret' => 'Hnn5N_wn08EQj8YUt59BYRTSvKc'],
    'url' => [
      'secure' => true]]);

      use Cloudinary\Api\Upload\UploadApi;
$r = new UploadApi();
$r = $r->upload($_FILES['img']['tmp_name']);
echo '<pre>';
print_r($r);
echo '</pre>';
// /Cloudinary::config([ 
//     "cloud_name" => "thobor", 
//     "api_key" => "745867666258536", 
//     "api_secret" => "Hnn5N_wn08EQj8YUt59BYRTSvKc", 
//     "secure" => true]);


?>