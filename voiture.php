<?php
include "connexion.php";

$id = $_GET["id"];

$MESSAGE_SQL_VOITURE = "SELECT id, marque, modele, annee, description, illustration FROM rallye WHERE id=" . $id . ";";

$requeteVoiture = $connexion->prepare($MESSAGE_SQL_VOITURE);
$requeteVoiture->execute();
$voiture = $requeteVoiture->fetch();

?> 

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
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

		<div class="voiture">
			<h3 class="marqueModele"><?= $voiture["marque"]; ?> <?= $voiture["modele"]; ?></h3>

            <p class="annee">Année de sortie : <?= $voiture["annee"]; ?></p>

			<p class="description"><?= $voiture["description"]; ?></p>

			<span class="illustration"><?= $voiture["illustration"]; ?></span>
		</div>
	</section>
	
	<footer><span id="signature">Par Charles</span></footer>
</body>
</html>