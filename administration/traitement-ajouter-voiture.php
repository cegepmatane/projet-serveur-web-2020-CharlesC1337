<?php

include "connexion.php"; 

$marque = addslashes($_POST['marque']);
$modele = $_POST['modele'];
$annee = $_POST['annee'];
$description = $_POST['description'];

$SQL_AJOUTER_VOITURE = "INSERT into rallye(marque, modele, annee, description) VALUES('".$marque."','" . $modele . "','" . $annee . "','" . $description . "');";

$requeteAjouterVoiture = $basededonnees->prepare($SQL_AJOUTER_VOITURE);
$reussiteAjout = $requeteAjouterVoiture->execute();

?>


<?php
if($reussiteAjout) 
{
?>
	La Voiture a été ajouté à la base de données
<?php	
}
?>