<?php
session_start();
$code = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 6);
$_SESSION["security_code"] = strtolower($code);
$image = imagecreatetruecolor(95, 38);
$bgColor = imagecolorallocate($image, 255, 255, 255); 
$textColor = imagecolorallocate($image, 0, 0, 0);
imagefill($image, 0, 0, $bgColor);
imagettftext($image, 15, 0, 10, 26, $textColor,realpath("assets/oldsans.ttf"), $code);
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>