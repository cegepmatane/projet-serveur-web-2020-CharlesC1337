<header><h2>Espace Membre</h2></header>

<section id="espace-membre">
    <form action="membre.php" method="POST">
        <div>
            <label>Pseudonyme</label>
            <input type="text" name="pseudonyme"value="<?=$membre["pseudonyme"]?>"/>
        </div>
        <div>
            <label>Mot de passe</label>
            <input type="password" name="motDePasse"/>
        </div>
    </form>
</section> 