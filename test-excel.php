<?php
    require_once 'lib/onesheet/autoload.php';  
    $tableur = new OneSheet\Writer('');

    require "configuration.php";
    require CHEMIN_ACCESSEUR . "VoitureDAO.php";

    //print_r(CHEMIN_ACCESSEUR . "VoitureDAO.php");

    $listVoiture = VoitureDAO::listerVoiture();

    //print_r($listVoiture);

    foreach($listVoiture as $voiture)
    {
        $tableur->addRow(array($voiture["marque"], $voiture["modele"], $voiture["annee"]));
    }

    $tableur->writeToFile('voitures.xlsx');

    include "index.php";
?> 