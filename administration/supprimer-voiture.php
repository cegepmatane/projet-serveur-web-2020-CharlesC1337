<?php

include "connexion.php"; 

$id = $_GET['id'];

$SQL_SUPPRIMER_VOITURE = "DELETE FROM rallye WHERE id = " . $id;

$requeteSupprimerVoiture = $basededonnees->prepare($SQL_SUPPRIMER_VOITURE);
$reussiteSupprimer = $requeteSupprimerVoiture->execute();
?>


<?php
if($reussiteSupprimer) 
{
?>
	La Voiture a été supprimer de la base de données
<?php	
}
?>