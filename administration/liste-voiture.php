<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listVoiture = VoitureDAO::listerVoiture();
?>

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<meta charset="utf-8">
	<title>Panneau d'administration de Wiki Voiture Rallye Groupe B</title>
</head>
</html>

<h1 class="titrePrincipale">Gestion des Voitures</h1>

<a class="boutonPanneauAdministration" href="index.php">Panneau d'administration</a>
<br><br>
<a class="lienPanneauAdministration" href="ajouter-voiture.html">Ajouter une Voiture</a>
<?php 	
	foreach($listVoiture as $voiture)
	{
?>
		<div class="recordPanneauAdministration">
			<?php echo $voiture['marque']; ?> <?php echo $voiture['modele']; ?>
			<a class="lienPanneauAdministration" style="float: right;" href="modifier-voiture.php?voiture=<?php echo $voiture['id']; ?>" title="">
				Modifier
			</a>
			<a class="lienPanneauAdministration" style="float: right;" href="supprimer-voiture.php?voiture=<?php echo $voiture['id']; ?>" title="">
				Supprimer
			</a>
		</div>		
<?php 		
	}
?>
