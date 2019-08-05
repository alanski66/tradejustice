<?php
//if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
//    header('HTTP/1.0 403 Forbidden');
//    die('You are not allowed to access this file.');
//}
header('Content-type: application/json');
$url=$_POST['url'];
$response=$_GET['response'];

$secret = "6LeiISYTAAAAAB0pOfKiGTYp0qQ4Sl9zPbXv6exT";

$jurl = $url  . '?secret=' . $secret . '&amp;response=' . $response;
//echo $jurl ;
//die();
$json = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify' . '?secret=' . $secret . '&response=' . $response);
echo $json;
?>