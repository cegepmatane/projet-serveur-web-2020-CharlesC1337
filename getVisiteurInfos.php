<?php
require CHEMIN_ACCESSEUR . "VisiteursDAO.php";

$user_ip = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['REQUEST_URI'];
$langue = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
//$dateTime = date('Y/m/d G:i:s');
$browser = $_SERVER['HTTP_USER_AGENT'];

VisiteursDAO::AjouterVisiteurs($user_ip, $page, $browser, $langue);
?>  