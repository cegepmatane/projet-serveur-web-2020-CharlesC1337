<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$noVoiture = $_GET['voiture'];

$reussiteSupprimer = VoitureDAO::supprimerVoiture($noVoiture);
?>


<?php
if($reussiteSupprimer) 
{
?>
	La Voiture a été supprimer de la base de données
<?php	
}
?>