<?php
require "BaseDeDonnees.php";

class MembreDAO{
    public static function validerConnexion($membre){

        $MESSAGE_SQL_VALIDER_CONNEXION = "SELECT * FROM membre WHERE pseudonyme =:pseudonyme OR email=:email;";

        $requeteValiderConnexion = BaseDeDonnees::GetConnexion()->prepare($MESSAGE_SQL_VALIDER_CONNEXION);
        $requeteValiderConnexion->bindParam(':pseudonyme', $membre["pseudonyme"], PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':email', $membre["email"], PDO::PARAM_STR);
        $requeteValiderConnexion->execute();

        $resultatRequete = $requeteValiderConnexion->fetch();

        $hasedPwdCheck = password_verify($membre['motDePasse'], $resultatRequete['motDePasse']);

        if ($hasedPwdCheck){
            return $resultatRequete;
        }else{
            return null;
        }
    } 

    public static function ajouterMembre($membre){
        
        $SQL_AJOUTER_MEMBRE = "INSERT into membre(pseudonyme, nom, prenom, email, motDePasse) VALUES(".":pseudonyme,".":nom".",".":prenom".",".":email".",".":motDePasse".");";

        $requeteAjouterMembre = BaseDeDonnees::GetConnexion()->prepare($SQL_AJOUTER_MEMBRE);
        
        $pseudonyme = urldecode($membre['pseudonyme']);
        $nom = urldecode($membre['nom']);
        $prenom = urldecode($membre['prenom']);
        $email = urldecode($membre['email']);

        $requeteAjouterMembre->bindParam(':pseudonyme', $pseudonyme, PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':email', $email, PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':motDePasse', $membre['motDePasse'], PDO::PARAM_STR);

        $reussiteAjout = $requeteAjouterMembre->execute();
        return $reussiteAjout;
    }
    
    public static function lireMembreParPseudonyme($pseudonyme){
        
        $pseudo = urldecode($pseudonyme);
        
        $MESSAGE_SQL_LIRE_MEMBRE_PAR_PSEUDONYME = "SELECT id, pseudonyme FROM membre WHERE pseudonyme =:pseudonyme;";

        $requeteLireMembreParPseudonyme = BaseDeDonnees::GetConnexion()->prepare($MESSAGE_SQL_LIRE_MEMBRE_PAR_PSEUDONYME);
        $requeteLireMembreParPseudonyme->bindParam(':pseudonyme', $pseudo, PDO::PARAM_STR);
        $requeteLireMembreParPseudonyme->execute();

        $membre = $requeteLireMembreParPseudonyme->fetch();

        return $membre;
    }
    
    public static function lireMembreParCourriel($courriel){
        
        $email = urldecode($courriel);
        
        $MESSAGE_SQL_LIRE_MEMBRE_PAR_COURRIEL = "SELECT id, email FROM membre WHERE email =:email;";

        $requeteLireMembreParCourriel = BaseDeDonnees::GetConnexion()->prepare($MESSAGE_SQL_LIRE_MEMBRE_PAR_COURRIEL);
        $requeteLireMembreParCourriel->bindParam(':email', $email, PDO::PARAM_STR);
        $requeteLireMembreParCourriel->execute();

        $membre = $requeteLireMembreParCourriel->fetch();

        return $membre;
    }
}
?>