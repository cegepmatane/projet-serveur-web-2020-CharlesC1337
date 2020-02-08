<?php
include "connexion.php";
$MESSAGE_SQL_LISTE_VOITURE = "SELECT id, marque, modele FROM rallye;";

$requeteListeVoiture = $basededonnees->prepare($MESSAGE_SQL_LISTE_VOITURE);
$requeteListeVoiture->execute();
$listVoiture = $requeteListeVoiture->fetchAll();
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
		</div>		
		<?php 		
	}
?>