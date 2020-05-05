<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listVoiture = VoitureDAO::listerVoiture();

include "entete.php";
?>	

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

<?php include "pied-page.php"?>