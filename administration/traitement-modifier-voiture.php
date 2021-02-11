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

$repertoireImage = $_SERVER['DOCUMENT_ROOT'] . "/projet-serveur-web-2020-CharlesC1337/images/";

$fichierDestination = $repertoireImage . $_FILES['image']['name'];

$fichierSource = $_FILES['image']['tmp_name'];

$image =  $_FILES['image']['name'];

if(move_uploaded_file($fichierSource,$fichierDestination))
{?>
	<!--Votre envoi de fichier a bien fonctionné
	<img src="../images/<?=$_FILES['image']['name']?>" alt=""/>-->
	<?php
}

$filtresVoiture = [];

$filtresVoiture['marque'] = FILTER_SANITIZE_ENCODED;
$filtresVoiture['modele'] = FILTER_SANITIZE_ENCODED;
$filtresVoiture['annee'] = FILTER_SANITIZE_ENCODED;
$filtresVoiture['description'] = FILTER_SANITIZE_ENCODED;
$filtresVoiture['id'] = FILTER_SANITIZE_ENCODED;

$voiture = filter_input_array(INPUT_POST, $filtresVoiture);

if (!empty($image)){
    $voiture['image'] = $image;
}

if (empty($voiture['marque']) || empty($voiture['modele']) || empty($voiture['annee'])){        
    echo '<script type="text/javascript">'; 
    echo 'alert("Veuillez remplir tout les champs requis!");'; 
    echo 'window.location.href = "modifier-voiture.php?voiture='.$voiture["id"].'";';
    echo '</script>';
}else{
    $reussiteModification = VoitureDAO::modifierVoiture($voiture);
    
    if($reussiteModification){
        echo '<script type="text/javascript">'; 
        echo 'alert("La Voiture a été modifié dans la base de données");'; 
        echo 'window.location.href = "liste-voiture.php";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Erreur dans la modification de la voiture!");'; 
        echo 'window.location.href = "liste-voiture.php";';
        echo '</script>';
    }
}
?>