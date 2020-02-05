<?php
include "connexion.php";
$MESSAGE_SQL_LISTE_VOITURE = "SELECT id, marque, modele, annee FROM rallye;";

$requeteListeVoiture = $connexion->prepare($MESSAGE_SQL_LISTE_VOITURE);
$requeteListeVoiture->execute();
$listVoiture = $requeteListeVoiture->fetchAll();
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

		<div class="dropdown">
			<button class="dropbtn">Liste des Voitures</button>
			<div class="dropdown-content">
				<?php
					foreach($listVoiture as $voiture)
					{
				?>
					<a href="voiture.php?id=<?= $voiture["id"];?>">
						<?= $voiture["marque"]; ?> <?= $voiture["modele"]; ?>
					</a>
				<?php
					}
				?>
			</div>
		</div>

	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>