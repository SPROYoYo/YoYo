<?php
include 'YoYo.php';

$YoYo = new YoYo();
$YoYo->compress = true; # activam comprimarea custom (BETA)
$YoYo->gzip = true; # activam comprimarea gzip
$YoYo->base64 = true; # activam encodarea in base64



$password = 'password124plm124#$3';
$string = 'un text de TesT care contine LItEr3, C!fre si C4Ractere spec!@le 12890!@#$%^&*()';

$encrypted = $YoYo->encrypt($password, $string); # criptat
$decrypted = $YoYo->decrypt($password, $encrypted); # decriptat

?>
