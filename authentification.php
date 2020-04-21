<header><h2>Connexion</h2></header>

<section id="authentification">
    <form action="membre.php" method="POST">
        <div>
            <label>Pseudonyme</label>
            <input type="text" name="pseudonyme"/>
        </div>
        <div>
            <label>Mot de passe</label>
            <input type="password" name="motDePasse"/>
        </div>
        <input type="submit" name="action-connexion" value="Connexion"/>
        <br></br>
        <a href="inscription.php" id="btnInscription">Pas de compte? Inscrivez-vous ici!</a>
    </form>
</section>