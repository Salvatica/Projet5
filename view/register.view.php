<?php
ob_start();
?>




    <div class="container">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?= $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <h2 class="text-center">S'enregistrer</h2>
        <form method="POST">
            <div class="form-group">
                <label for="name">Nom d'utilisateur</label>
                <input type="text" name="name" class="form-control" placeholder="Nom d'utilisateur"
                       value="<?= $name ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $email ?? ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>


<?php
$content = ob_get_clean();
$titre = "connexion";
require "layout.view.php";
?>