<?php
ob_start();
?>



    <div class="container">
        <h2 class="text-center">Connexion</h2>
        <div class="col-lg-6 col-lg-offset-3"
        <form action="/action_page.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Email" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Mot de passe:</label>
                <input type="password" class="form-control" placeholder="Mot de passe" id="pwd">
            </div>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" placeholder="Nom" id="nom">
            </div>
            <button type="submit" class="btn btn-primary">S'enregistrer</button>
        </form>
    </div>
    </div>


<?php
$content = ob_get_clean();
$titre="connexion";
require "layout.view.php";
?>