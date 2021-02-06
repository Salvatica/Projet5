<?php
ob_start();
?>



    <div class="container">
        <form action="login.php" method="post">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $email ?? '';?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">connexion</button>
        </form>
    </div>


<?php
$content = ob_get_clean();
$titre="connexion";
require "layout.view.php";
?>