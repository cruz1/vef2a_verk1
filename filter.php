<?php
$email = "nj123<><><>@gmail.com";

 $email =  filter_var($email, FILTER_SANITIZE_EMAIL);
echo $email;
$setning = "<script>console.log('cancer to all')</script>";

$setning = filter_var($setning, FILTER_SANITIZE_STRING);
echo PHP_EOL . $setning;

?>
