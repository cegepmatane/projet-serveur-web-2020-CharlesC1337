<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$filtresMarque = [];

$filtresMarque['marque'] = FILTER_SANITIZE_ENCODED;
  
$arrayMarque = filter_input_array(INPUT_POST, $filtresMarque);

$textMarque = implode($arrayMarque);

$filtresModele = [];

$filtresModele['modele'] = FILTER_SANITIZE_ENCODED;
  
$arrayModele = filter_input_array(INPUT_POST, $filtresModele);

$textModele = implode($arrayModele);

$filtresAnnee = [];

$filtresAnnee['annee'] = FILTER_SANITIZE_ENCODED;
  
$arrayAnnee = filter_input_array(INPUT_POST, $filtresAnnee);

foreach($arrayAnnee as $annee) 
{
    switch($annee)
    {
    case "1980-a-1985" :
        $min = 1980;
        $max = 1985;
    break;
    case "1985-a-1990" :
        $min = 1985;
        $max = 1990;
    break;
    case "1990-et-plus" :
        $min = 1990;
        $max = 2100;
    break;
    }
}

if(!empty($_POST))
{
	foreach($_POST["groupe"] as $nom => $valeur)
	{
		if("on" == $valeur)
		{
			$groupe_liste[] = "groupe = '$nom'";
		}
	}
	$condition = "(" . implode (" OR ", $groupe_liste) . ")";
}

$listResultatRecherche = VoitureDAO::lireRechercheAvance($textMarque, $textModele, $min, $max, $condition);
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