<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$statistiqueContenuParGroupe = VoitureDAO::voirStatistiqueContenuParGroupe();

$statistiqueContenu = VoitureDAO::voirStatistiqueContenu();

$listVoiture = VoitureDAO::listerVoiture();

$nombreVoitureGroupeA = 0;
$nombreVoitureGroupeB = 0;
?> 

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<meta charset="utf-8">
    <title>Panneau d'administration de Wiki Voiture Rallye Groupe B</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
</html>

<h1 class="titrePrincipale">Statistiques du Contenu</h1>

<a class="boutonPanneauAdministration" href="index.php">Panneau d'administration</a>

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
        foreach($statistiqueContenuParGroupe as $statistiques)
        {
            if ($statistiques['groupe'] == "A")
                $nombreVoitureGroupeA = $statistiques['voiture'];

            if ($statistiques['groupe'] == "B")
                $nombreVoitureGroupeB = $statistiques['voiture'];	
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

<table class="tableauContenu">
    <tr>
        <td>Moyenne Total Nombre de Produit</td>
        <td>Moyenne Total Nombre de Produit sans Extremum</td>
    </tr>
    <?php 	
        $min = 1000000000;
        $max = 0;
        $somme = 0;

        foreach($listVoiture as $voiture)
        {
            $somme += $voiture['nombreProduit'];

            if($voiture['nombreProduit'] > $max) 
                $max = $voiture['nombreProduit'];

            if($voiture['nombreProduit'] < $min) 
                $min = $voiture['nombreProduit'];
        }

        $moyenneSansExtremum = ($somme - $min - $max) / (count($listVoiture) - 2);

        foreach($statistiqueContenu as $statistiques)
        {

    ?>
    <tr>
        <td><?php echo $statistiques['moyenneProduit']; ?></td>
        <td><?php echo $moyenneSansExtremum; ?></td>
    </tr>
    <?php 
        }
    ?>
</table>

<div class="chart-container" style="position:relative; height:30vh; width:60vw; margin-top:0.5em; margin-left:7em;">
      <canvas id="graphique" ></canvas>
</div>

<script>
    var donnees = [<?php echo $nombreVoitureGroupeA; ?>, <?php echo $nombreVoitureGroupeB; ?>]; // Tableau des données
    var etiquettes = ['Groupe A', 'Groupe B'];
    var couleurs = ['#66fcf1', '#45a29e'];

    var cible = document.getElementById('graphique');
    var graphiqueTarte = new Chart(cible, {
        type: 'pie',
        data: {
            labels: etiquettes,
            datasets: [{
                label: 'Contenu par Groupe',
                data: donnees,
                backgroundColor: couleurs
            }]
        },
        options: {
            responsive: true
        }
    });
</script>