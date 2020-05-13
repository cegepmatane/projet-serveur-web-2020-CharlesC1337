<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listVoiture = VoitureDAO::listerVoiture();

// https://support.google.com/webmasters/answer/183668?hl=en
?>
<!--<?xml version="1.0" encoding="UTF-8"?>-->
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 

    <url>
        <loc>http://localhost/ProjetListPhp/projet-serveur-web-2020-CharlesC1337/index.php</loc>
        <lastmod>2019-03-23</lastmod>
    </url>
    <url>
        <loc>http://localhost/ProjetListPhp/projet-serveur-web-2020-CharlesC1337/liste-voiture.php</loc>
        <lastmod>2019-03-23</lastmod>
    </url>
    <url>
        <loc>http://localhost/ProjetListPhp/projet-serveur-web-2020-CharlesC1337/membre.php</loc>
        <lastmod>2019-03-23</lastmod>
    </url>
    <url>
        <loc>http://localhost/ProjetListPhp/projet-serveur-web-2020-CharlesC1337/inscription.php</loc>
        <lastmod>2019-03-23</lastmod>
    </url>
    <url>
        <loc>http://localhost/ProjetListPhp/projet-serveur-web-2020-CharlesC1337/recherche-avance.php</loc>
        <lastmod>2019-03-23</lastmod>
    </url>
    <?php 
        foreach($listVoiture as $voiture)
        {
    ?>
    <url>
        <loc>http://localhost/ProjetListPhp/projet-serveur-web-2020-CharlesC1337/voiture.php?id=<?=$voiture['id']?></loc>
        <lastmod>2019-03-23</lastmod>
    </url>  
    <?php 
        }
    ?>

</urlset> 