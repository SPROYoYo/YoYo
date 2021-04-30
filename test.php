<?php
include 'YoYo.php';

$YoYo = new YoYo();

/*
** If you want to disable gzip compression use: $YoYo->gzip = false;
** or/and
** If you want to disable custom compression use: $YoYo->compress = false;
** or/and
** If you want to disable usage of encode/decode with base64 use: $YoYo->base64 = false;
** 
** Personally, I recommend using gzip, custom compression, and base64 to reduce encryption output size 
** and to be able to save it anywhere without being corrupted.
*/

$password = 'password124plm124#$3';
$string = 'a TexT containing Ch4R4c3r5, D!g!ts and Sp3C!@L Ch4R4c3r5 12890!@#$%^&*() ❤️🥺🤗';

$encrypted = $YoYo->encrypt($password, $string); # encrypted
$decrypted = $YoYo->decrypt($password, $encrypted); # decrypted

?>
