<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$usager = 'WikiRallye';
$motdepasse = 'WikiRallye12!';
$hote = 'localhost';
$base = 'voiture';

$dsn = 'mysql:dbname='.$base.';host=' . $hote;
$connexion = new PDO($dsn, $usager, $motdepasse);

?>
