<?php

include "connexion.php"; 

$id = $_POST['id'];
$marque = addslashes($_POST['marque']);
$modele = $_POST['modele'];
$annee = $_POST['annee'];
$description = $_POST['description'];

$SQL_MODIFIER_VOITURE = "UPDATE rallye SET marque = '$marque', modele='$modele', annee='$annee', description='$description' WHERE id = " . $id;

$requeteModifierVoiture = $basededonnees->prepare($SQL_MODIFIER_VOITURE);
$reussiteModification = $requeteModifierVoiture->execute();
?>


<?php
if($reussiteModification) 
{
?>
	La Voiture a été modifié dans la base de données
<?php	
}
?>