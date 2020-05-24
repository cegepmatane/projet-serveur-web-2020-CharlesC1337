<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "VisiteursDAO.php";

$statistiqueVisiteursParJour = VisiteursDAO::voirStatistiqueVisiteursParJour();
$statistiqueVisiteursParLangue = VisiteursDAO::voirStatistiqueVisiteursParLangue();

$nbreJourDimanche = 0;
$nbreJourLundi = 0;
$nbreJourMardi = 0;
$nbreJourMercredi = 0;
$nbreJourJeudi = 0;
$nbreJourVendredi = 0;
$nbreJourSamedi = 0;
?> 

<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<meta charset="utf-8">
    <title>Panneau d'administration de Wiki Voiture Rallye Groupe B</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
	<header>
        <h1 class="titrePrincipale">Statistiques des Visiteurs</h1>

        <a class="boutonPanneauAdministration" href="index.php">Panneau d'administration</a>
	</header>

	<section id="contenu" style="padding:0em; padding-left:2em;">

        <table class="tableauContenuVisiteur">
            <tr>
                <td>Journée</td>
                <td>Nombre de Clics</td>
                <td>Ip de l'utilisateur</td>
            </tr>
            <?php 	
                foreach($statistiqueVisiteursParJour as $statistiques)
                {
                    switch($statistiques['Journee'])
                    {
                        case 1:
                            $jour = "Dimanche";
                            $nbreJourDimanche++;
                        Break;
                        case 2:
                            $jour = "Lundi";
                            $nbreJourLundi++;
                        Break;
                        case 3:
                            $jour = "Mardi";
                            $nbreJourMardi++;
                        Break;
                        case 4:
                            $jour = "Mercredi";
                            $nbreJourMercredi++;
                        Break;
                        case 5:
                            $jour = "Jeudi";
                            $nbreJourJeudi++;
                        Break;
                        case 6:
                            $jour = "Vendredi";
                            $nbreJourVendredi++;
                        Break;
                        case 7:
                            $jour = "Samedi";
                            $nbreJourSamedi++;
                        Break;
                    }
            ?>
            <tr>
                <td><?php echo $jour, " le ", $statistiques['Annee'], "-", $statistiques['Mois'], "-", $statistiques['Jour']?></td>
                <td><?php echo $statistiques['Clics']; ?></td>
                <td><?php echo $statistiques['User_ip']; ?></td>
            </tr>
            <?php 		
                }
            ?>
        </table>

        <table class="tableauContenuVisiteur">
            <tr>
                <td>Langue</td>
                <td>Nombre de Clics</td>
                <td>Ip de l'utilisateur</td>
            </tr>
            <?php 	
                foreach($statistiqueVisiteursParLangue as $statistique)
                {
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

        <div class="chart-container" style="position: relative; height:30vh; width:60vw; margin-top:1em;">
            <canvas id="graphique"></canvas>
        </div>

        <script>
            var donnees = [<?php echo $nbreJourDimanche; ?>, <?php echo $nbreJourLundi; ?>, <?php echo $nbreJourMardi; ?>, <?php echo $nbreJourMercredi; ?>, <?php echo $nbreJourJeudi; ?>, <?php echo $nbreJourVendredi; ?>, <?php echo $nbreJourSamedi; ?>]; // Tableau des données
            var etiquettes = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'] // Tableau des étiquettes

            var cible = document.getElementById('graphique').getContext('2d');
            var graphiqueLigne = new Chart(cible, {
                type: 'line',

                data: {
                    labels: etiquettes,
                    datasets: [{
                        label: 'Visite selon les Jours',
                        backgroundColor: '#45a29e',
                        borderColor: '#66fcf1',
                        data: donnees
                    }]
                },

                options: {}
            });
        </script>

    </section>
</body>
</html>