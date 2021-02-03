<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$voiture = VoitureDAO::lireVoiture($id);

include "entete.php";
include "getVisiteurInfos.php";
?>

<header><h2>Détails de la voiture</h2></header>
<br>
<div class="voiture">
	<img class="image" src="images/<?= $voiture["image"]; ?>" alt=""/>
	<br>
	<h3 class="marqueModele"><?= $voiture["marque"]; ?> <?= $voiture["modele"]; ?></h3>
	<br>
	<p class="annee">Année de sortie : <?= $voiture["annee"]; ?></p>
	<br>
	<p class="groupe">Groupe : <?= $voiture["groupe"]; ?></p>
	<br>
	<p class="description"><?= $voiture["description"]; ?></p>
	<p style="padding-bottom: 15rem;"></p>
</div>

<?php include "pied-page.php"?>