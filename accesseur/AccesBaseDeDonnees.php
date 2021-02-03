<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class AccesBaseDeDonnees{
    public static function getConnexion(){
        $usager = 'WikiRallye';
        $motdepasse = 'WikiRallye12!';
        $hote = 'localhost';
        $base = 'voiture';

        $dsn = 'mysql:dbname='.$base.';host=' . $hote;
        $basededonnees = new PDO($dsn, $usager, $motdepasse);
        return $basededonnees;
    }
}
?>
