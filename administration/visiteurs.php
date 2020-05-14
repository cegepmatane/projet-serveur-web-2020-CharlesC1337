<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "VisiteursDAO.php";

$statistiqueVisiteursParJour = VisiteursDAO::voirStatistiqueVisiteursParJour();
$statistiqueVisiteursParLangue = VisiteursDAO::voirStatistiqueVisiteursParLangue();
?> 

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<meta charset="utf-8">
	<title>Panneau d'administration de Wiki Voiture Rallye Groupe B</title>
</head>
</html>

<h1 class="titrePrincipale">Page Visiteurs</h1>

<a class="boutonPanneauAdministration" href="liste-voiture.php">Panneau d'administration</a>

<table class="tableauContenu">
    <tr>
        <td>Journée</td>
        <td>Page Cliquer</td>
        <td>Ip de l'utilisateur</td>
    </tr>
    <?php 	
        foreach($statistiqueVisiteursParJour as $statistiques)
        {
            switch($statistiques['Journee'])
            {
                case 1:
                    $jour = "Dimanche";
                Break;
                case 2:
                    $jour = "Lundi";
                Break;
                case 3:
                    $jour = "Mardi";
                Break;
                case 4:
                    $jour = "Mercredi";
                Break;
                case 5:
                    $jour = "Jeudi";
                Break;
                case 6:
                    $jour = "Vendredi";
                Break;
                case 7:
                    $jour = "Samedi";
                Break;
            }
    ?>
    <tr>
        <td><?php echo $jour, " le ", $statistiques['Date'];?></td>
        <td><?php echo $statistiques['Page']; ?></td>
        <td><?php echo $statistiques['User_ip']; ?></td>
    </tr>
    <?php 		
        }
    ?>
</table>

<table class="tableauContenu">
    <tr>
        <td>Langue</td>
        <td>Page Cliquer</td>
        <td>Ip de l'utilisateur</td>
    </tr>
    <?php 	
        foreach($statistiqueVisiteursParLangue as $statistique)
        {
    ?>
    <tr>
        <td><?php echo $statistique['Langue']; ?></td>
        <td><?php echo $statistique['Page']; ?></td>
        <td><?php echo $statistique['User_ip']; ?></td>
    </tr>
    <?php 		
        }
    ?>
</table>