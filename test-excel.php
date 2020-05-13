<?php
    require_once 'lib/onesheet/autoload.php';  
    $tableur = new OneSheet\Writer('');

    require "configuration.php";
    require CHEMIN_ACCESSEUR . "VoitureDAO.php";

    $listVoiture = VoitureDAO::listerVoiture();

    foreach($listVoiture as $voiture)
    {
        $tableur->addRow(array($voiture["marque"], $voiture["modele"], $voiture["annee"]));
    }

    $tableur->writeToFile('voitures.xlsx');

    header("Location: liste-voiture.php");
    die();
?> 