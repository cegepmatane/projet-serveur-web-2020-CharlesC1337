<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$statistiqueContenu = VoitureDAO::voirStatistiqueContenuParGroupe();
?> 

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<meta charset="utf-8">
	<title>Panneau d'administration de Wiki Voiture Rallye Groupe B</title>
</head>
</html>

<h1 class="titrePrincipale">Page Contenu</h1>

<a class="boutonPanneauAdministration" href="liste-voiture.php">Panneau d'administration</a>

<table class="tableauContenu">
    <tr>
        <td>Groupe</td>
        <td>Nombre de Voiture</td>
        <td>Moyenne Nombre de Produit</td>
        <td>Écart-Type Nombre de Produit</td>
        <td>Nombre de Produit Total</td>
        <td>Minimum Nombre de Produit</td>
        <td>Maximum Nombre de Produit</td>
    </tr>
    <?php 	
        foreach($statistiqueContenu as $statistiques)
        {
    ?>
    <tr>
        <td><?php echo $statistiques['groupe']; ?></td>
        <td><?php echo $statistiques['voiture']; ?></td>
        <td><?php echo $statistiques['moyenneProduit']; ?></td>
        <td><?php echo $statistiques['ecartTypeNombreProduit']; ?></td>
        <td><?php echo $statistiques['nombreProduitTotal']; ?></td>
        <td><?php echo $statistiques['minNombreProduit']; ?></td>
        <td><?php echo $statistiques['maxNombreProduit']; ?></td>
    </tr>
    <?php 		
        }
    ?>
</table>