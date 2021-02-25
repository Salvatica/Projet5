<?php

$titre = "connexion";

?>

    <div class="container">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?= $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <h3>Connexion</h3>
        <form action="<?= URL ?>connexion" method="post">

            <div class="form-group">
                <label for="name">Nom d'utilisateur</label>
                <input type="text" name="name" class="form-control" placeholder="Nom d'utilisateur"
                       value="<?= $name ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">connexion</button>
            <input type="hidden" id="jeton" name="jeton" value="<?php $this->getCsrfToken() ?>">
        </form>
        <p> Pas encore inscrit ? alors inscrivez-vous en <a href="<?= URL ?>register">cliquant ici </a></p>
    </div>

