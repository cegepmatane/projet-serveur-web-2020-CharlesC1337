<?php include "entete.php"?>
<header><h2>Recherche Avancée</h2></header>

<form action="resultatRechercheAvance.php" method="post" enctype="multipart/form-data">
		
    <div class="champs">
        <label for="marque">Marque</label>
        <input type="text" name="marque" id="marque"/>			
    </div>

    <div class="champs">
        <label for="modele">Modèle</label>
        <input type="text" name="modele" id="modele"/>			
    </div>
    
    <div class="champs">
        <label for="annee">Année de sortie</label>
        <select name= "annee">
            <option value="1980-a-1985">1980 &agrave; 1985</option>
            <option value="1985-a-1990">1985 &agrave; 1990</option>
            <option value="1990-et-plus">1990 et plus</option>
        </select>
    </div>		

    <div class="champs">
        <p>
            <label>Groupe :</label> 
            A :<input type="checkbox" name="groupe[A]"/> 
            B :<input type="checkbox" name="groupe[B]"/>	
        </p>	
    </div>
    
    <input type="submit" value="Rechercher">

</form>

<?php include "pied-page.php"?>