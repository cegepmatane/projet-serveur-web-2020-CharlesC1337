<?php
session_start();

if (!empty($_SESSION)) {
    if ($_SESSION['admin']){
        
    }else{
        echo '<script type="text/javascript">';  
        echo 'window.location.href = "../index.php";';
        echo '</script>';
    }
}else{
    echo '<script type="text/javascript">';  
    echo 'window.location.href = "../index.php";';
    echo '</script>';
}

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