<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listVoiture = VoitureDAO::listerVoiture();

include "entete.php";
?>	

<a class="menuPrincipale" href="test-excel.php">Exportation vers un fichier Excel</a>

<br><br><br>

<div class="dropdown">
	<button class="dropbtn">Liste des Voitures</button>
	<div class="dropdown-content">
		<?php
			foreach($listVoiture as $voiture)
			{
		?>
			<a href="voiture.php?id=<?= $voiture["id"];?>">
				<?= $voiture["marque"]; ?> <?= $voiture["modele"]; ?>
				<img src="<?= $voiture["miniature"]; ?>" alt="Miniature"></img>
			</a>
		<?php
			}
		?>
	</div>
</div>

<?php include "pied-page.php"?>