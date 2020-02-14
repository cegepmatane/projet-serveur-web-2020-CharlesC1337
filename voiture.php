<?php
include "connexion.php";

$id = $_GET["id"];

$MESSAGE_SQL_VOITURE = "SELECT id, marque, modele, annee, description, image FROM rallye WHERE id=" . $id . ";";

$requeteVoiture = $connexion->prepare($MESSAGE_SQL_VOITURE);
$requeteVoiture->execute();
$voiture = $requeteVoiture->fetch();

?> 

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<meta charset="utf-8">
	<title>Wiki Rallye Groupe B</title>
</head>
<body>
	<header>
		<h1 class="titrePrincipale">Les meilleurs voitures de Rallye de Groupe B</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">

		<header><h2>Détails de la voiture</h2></header>
		<br>
		<div class="voiture">
			<h3 class="marqueModele"><?= $voiture["marque"]; ?> <?= $voiture["modele"]; ?></h3>
			<br>
            <p class="annee">Année de sortie : <?= $voiture["annee"]; ?></p>
			<br>
			<p class="description"><?= $voiture["description"]; ?></p>
			<br>
			<img class="image" src="images/<?= $voiture["image"]; ?>" alt=""/>
		</div>
	</section>
	
	<footer><span id="signature">Par Charles</span></footer>
</body>
</html>