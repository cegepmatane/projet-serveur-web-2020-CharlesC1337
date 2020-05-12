<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$filtresRecherche = [];

$filtresRecherche['recherche'] = FILTER_SANITIZE_ENCODED;
  
$arrayRecherche = filter_input_array(INPUT_POST, $filtresRecherche);

$textRecherhce = implode($arrayRecherche);

$listResultatRecherche = VoitureDAO::lireRecherche($textRecherhce);
?>

<?php include "entete.php"?>
<header><h2>Résultat de la recherche</h2></header>

    <?php
        foreach($listResultatRecherche as $resultat)
        {
    ?>

    <br>
    <a class="lienResultatRecherche" href="voiture.php?id=<?= $resultat["id"];?>">
        <?= $resultat["marque"]; ?> <?= $resultat["modele"]; ?>
    </a>
    <br>

    <p><?=$resultat["description"];?></p>

    <?php
        }
    ?>

    <?php
        if(empty($resultat))
        {
    ?>

    <br>
    <p>Aucun résultat!</p>

    <?php
        }
    ?>
        
<?php include "pied-page.php"?> 