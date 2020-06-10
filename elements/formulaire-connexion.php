<div class="form-group" id="container">
    <form class="formfull" action="/verification.php" Method="POST">
        <label><b>Nom d'utilisateur</b></label>
        <input class="form-control" type="text" placeholder="Entrer votre nom d'utilisateur" name="nom" size="40" maxlength="256" required>
        <br>
        <label><b>Mot de passe</b></label>   
        <input class="form-control" type="password" placeholder="Entrer votre mot de passe" name="mdp" size="40" maxlength="256" required>
        <br> 
        <input type="submit" id="submit" name="connexion" value="Connexion">
        <?php 
        if(isset($_GET['erreur'])) {
            $err = $_GET['erreur'];
            if($err==1 || $err==2)
            echo "<p style=''>Email ou mot de passe incorrect</p>";
        }
        ?>
        <a href="inscription.php">Crée un nouveau compte</a> - <a href="#">Mot de passe oubliée</a> 
    </form>
</div>