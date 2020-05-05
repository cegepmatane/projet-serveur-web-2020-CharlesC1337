<?php
require_once "configuration.php";
require_once CHEMIN_ACCESSEUR . "MembreDAO.php";

include "entete.php";

$estConnecte = false;

if(isset($_SESSION["pseudonyme"]))
    $estConnecte = true;

$membre = [];

if(!$estConnecte && isset($_POST["action-connexion"])){
    $membre = MembreDAO::ValiderConnexion($_POST);

    $estConnecte = isset($membre["id"]);

    if ($estConnecte){
        $_SESSION["estConnecte"] = true;
        $_SESSION["pseudonyme"] = $membre["pseudonyme"];
    }
    else {
        $membre = MembreDAO::lireMembreParPseudonyme($_SESSION["pseudonyme"]);
    }
}

if (!$estConnecte){
    include "authentification.php";
}
else{
    include "espace-membre.php";
}

include "pied-page.php";
?>