<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$usager = 'ProjetList';
$motdepasse = 'HSJCBc9CFNQgovmx!';
$hote = 'localhost';
$base = 'voiture';

$dsn = 'mysql:dbname='.$base.';host=' . $hote;
$basededonnees;
try
{
	$basededonnees = new PDO($dsn, $usager, $motdepasse);
}
catch(PDOException $exception)
{
	echo $e->getMessage();
}
?>