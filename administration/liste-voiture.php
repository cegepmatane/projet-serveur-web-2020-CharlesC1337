<?php
session_start();

if (!empty($_SESSION)) {
    if ($_SESSION['admin']){
        
    }else{
        echo '<script type="text/javascript">';  
        echo 'window.location.href = "../index.php";';
        echo '</script>';
    }
}else{
    echo '<script type="text/javascript">';  
    echo 'window.location.href = "../index.php";';
    echo '</script>';
}

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
<body>
	<header>
		<h1 class="titrePrincipale">Gestion des Voitures</h1>

		<a class="boutonPanneauAdministration" href="index.php">Panneau d'administration</a>
	</header>

	<section id="contenu" style="padding:0em; padding-left:2em;">
	
		<a class="lienPanneauAdministration" href="ajouter-voiture.php">Ajouter une Voiture</a>
		<?php 	
			foreach($listVoiture as $voiture)
			{
		?>
				<div class="recordPanneauAdministration">
					<?php echo $voiture['marque']; ?> <?php echo $voiture['modele']; ?>
					<a class="lienPanneauAdministration" style="float: right; margin-left:1rem;" href="modifier-voiture.php?voiture=<?php echo $voiture['id']; ?>" title="">
						Modifier
					</a>
					<a class="lienPanneauAdministration" style="float: right;" href="supprimer-voiture.php?voiture=<?php echo $voiture['id']; ?>" title="">
						Supprimer
					</a>
				</div>		
		<?php 		
			}
		?>

	</section>
</body>
</html>
