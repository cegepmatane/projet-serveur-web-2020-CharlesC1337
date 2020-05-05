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

<a href="ajouter-voiture.html">Ajouter une Voiture</a>
<?php 	
	foreach($listVoiture as $voiture)
	{
		?>
		<div class="voiture" style="border:solid 1px #45a29e; margin:5px; padding:5px;">
			<?php echo $voiture['marque']; ?> <?php echo $voiture['modele']; ?>
			<a href="modifier-voiture.php?voiture=<?php echo $voiture['id']; ?>" title="">
				Modifier
			</a>
			<a href="supprimer-voiture.php?voiture=<?php echo $voiture['id']; ?>" title="">
				Supprimer
			</a>
		</div>		
		<?php 		
	}
?>
