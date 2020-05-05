<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class BaseDeDonnees{
    public static function getConnexion(){
        $usager = 'ProjetList';
        $motdepasse = 'HSJCBc9CFNQgovmx!';
        $hote = 'localhost';
        $base = 'voiture';

        $dsn = 'mysql:dbname='.$base.';host=' . $hote;
        $basededonnees = new PDO($dsn, $usager, $motdepasse);
        return $basededonnees;
    }
}
?>
