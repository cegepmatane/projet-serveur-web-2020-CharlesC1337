<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$filtresRecherche = [];

$filtresRecherche['recherche'] = FILTER_SANITIZE_ENCODED;
  
$arrayRecherche = filter_input_array(INPUT_POST, $filtresRecherche);

$textRecherche = implode($arrayRecherche);

$listResultatRecherche = VoitureDAO::lireRechercheRapide($textRecherche);
?>

<?php include "entete.php"?>
<header><h2>Résultat de la recherche</h2></header>

 <div class="resultatRechercheContenant">
    <ul class="resultatRecherche">

    <?php
        foreach($listResultatRecherche as $resultat)
        {
    ?>
        
        <a class="lienResultatRecherche" href="voiture.php?id=<?= $resultat["id"];?>">
            <li class="voitureResultatRecherche">
                <img src="images/<?= $resultat["image"]; ?>" alt="Miniature" class="imageResultatRecherche"></img>
                <h3><?= $resultat["marque"]; ?> <?= $resultat["modele"]; ?></h3>
                <br>
                <p class="descriptionResultatRecherche"><?= $resultat["description"]; ?></p>
            </li>
        </a>

    <?php
        }
    ?>
        
    </ul>
</div>

<br><br>

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