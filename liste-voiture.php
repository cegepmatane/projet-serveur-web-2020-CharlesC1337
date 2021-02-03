<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listVoiture = VoitureDAO::listerVoiture();

include "entete.php";
include "getVisiteurInfos.php";
?>	

<a class="boutonThemeMenu" href="test-excel.php" download="voitures.xlsx">Exportation vers un fichier Excel</a>

<br><br><br><br>

<div class="listeVoitureContenant">
    <ul class="listeVoiture">

<?php
    foreach($listVoiture as $voiture)
    {
?>
        <a class="lienListeVoiture" href="voiture.php?id=<?= $voiture["id"];?>">
            <li class="voitureListeVoiture">
                <img src="images/<?= $voiture["image"]; ?>" alt="Miniature" class="imageListeVoiture"></img>
                <h3><?= $voiture["marque"]; ?> <?= $voiture["modele"]; ?></h3>
                <br>
                <p class="descriptionListeVoiture"><?= $voiture["description"]; ?></p>
            </li>
        </a>

<?php
    }
?>

    </ul>
</div>

<br><br>

<?php include "pied-page.php"?>