<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "VisiteursDAO.php";

$statistiqueVisiteursParJour = VisiteursDAO::voirStatistiqueVisiteursParJour();
$statistiqueVisiteursParLangue = VisiteursDAO::voirStatistiqueVisiteursParLangue();

$dateTime = date('Y/m/d G:i');
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
		<h1 class="titrePrincipale">Panneau d'administration</h1>
	</header>

	<section id="contenu" style="padding:0em; padding-left:2em;">

		<a href="liste-voiture.php" style="text-decoration: none;">
			<div class="vignettePanneauAdministration">
				<br>
				<p class="texteVignettePanneauAdministration">
					Gestion des Voitures
				</p>
				<br>
				<img src="../mini/miature_gestion_voiture.png" alt="Gestion des Voitures" style="width:100%; height:70%;">
			</div>
		</a>

		<div class="vignettePanneauAdministration" style="left:35.1%;">
			<div>
				<p class="texteVignettePanneauAdministration">
					<br>
					Bienvenue sur le Panneau d'administration!
					<br>
					<br>
					Date : <?php echo $dateTime; ?>
				</p>
			</div>
		</div>

		<a href="visiteurs.php" style="text-decoration: none;">
			<div class="vignettePanneauAdministration" style="left:68.2%;">
				<br>
				<p class="texteVignettePanneauAdministration">
					Statistiques des Visiteurs
				</p>
				<iframe src="visiteurs.php" style="width:25%; height:22%; margin-left:2.5em;" name="iframeVisiteurs" onload="window.frames['iframeVisiteurs'].scrollTo(0,250)" scrolling="no" class="iframeVignettePanneauAdministration"></iframe>
			</div>
		</a>

		<a href="contenu.php" style="text-decoration: none;">
			<div class="vignettePanneauAdministration" style="top:58%;">
				<br>
				<p class="texteVignettePanneauAdministration">
					Statistiques du Contenu
				</p>
				<br>
				<iframe src="contenu.php" name="iframeContenu" onload="window.frames['iframeContenu'].scrollTo(25,600)" scrolling="no" class="iframeVignettePanneauAdministration"></iframe>
			</div>
		</a>

		<div class="vignettePanneauAdministration" style="left:35.1%; top:58%;">
			<br>
			<p class="texteVignettePanneauAdministration">
				<?php 
					foreach($statistiqueVisiteursParJour as $statistiques){
						switch ($statistiques['Journee']){
							case 1:
								$pensee = "La beauté est dans les yeux de celui qui regarde. - Oscar Wilde";
							break;
							case 2:
								$pensee = "Le souvenir, c'est la présence invisible. - Victor Hugo";
							break;
							case 3:
								$pensee = "Le courage n'est pas l'absence de peur, mais la capacité de vaincre ce qui fait peur. - Nelson Mandela";
							break;
							case 4:
								$pensee = "La vie sans musique est tout simplement une erreur, une fatigue, un exil. - Friedrich Nietzsche";
							break;
							case 5:
								$pensee = "Un problème sans solution est un problème mal posé. - Albert Einstein";
							break;
							case 6:
								$pensee = "La musique est la langue des émotions. - Emmanuel Kant";
							break;
							case 7:
								$pensee = "Qui veut la paix prépare la guerre. - Jules César";
							break;
						}
					} 
				?>
				Citation au Hasard : <br><br><?php echo $pensee; ?>
			</p>
		</div>

		<a href="visiteurs.php" style="text-decoration: none; color:#d8d9da;">
			<div class="vignettePanneauAdministration" style="left:68.2%; top:58%;">
				<br>
				<p class="texteVignettePanneauAdministration">
					Statistiques des Visiteurs
				</p>
				<br>
				<table class="tableauContenuVisiteur" style="margin-left:1em;">
					<tr>
						<td>Langue</td>
						<td>Nombre de Clics</td>
						<td>Ip de l'utilisateur</td>
					</tr>
					<?php 	
						$nbreRecord = 0;

						foreach($statistiqueVisiteursParLangue as $statistique)
						{
							$nbreRecord++;
							if ($nbreRecord >= 6)
								return;
					?>
					<tr>
						<td><?php echo $statistique['Langue']; ?></td>
						<td><?php echo $statistique['Clics']; ?></td>
						<td><?php echo $statistique['User_ip']; ?></td>
					</tr>
					<?php 		
						}
					?>
				</table>
			</div>
		</a>

	</section>
</body>
</html>