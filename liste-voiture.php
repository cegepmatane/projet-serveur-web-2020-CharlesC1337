<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listVoiture = VoitureDAO::listerVoiture();
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
	
	<footer><span id="signature">Par Charles</span></footer>
</body>
</html>