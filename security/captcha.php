<?php
session_start();

// Perintah membuat code captcha random
$random_alpha = md5(rand());

$captcha_code = substr($random_alpha, 0, 6);

// hasil dari captcha disimpan dalam session
$_SESSION["captcha_code"] = $captcha_code;

// Perintah untuk membuat gambar sesuai dengan warna yang dutentukan
$target_layer = imagecreatetruecolor(90, 35);
$captcha_background = imagecolorallocate($target_layer, 255, 160, 119);
imagefill($target_layer, 0, 0, $captcha_background);
$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
imagestring($target_layer, 10, 18, 10, $captcha_code, $captcha_text_color);
header("Content-type: image/jpeg");
imagejpeg($target_layer);
