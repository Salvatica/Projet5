<?php ob_start(); ?>

    <form method="POST" action="<?= URL ?>articles/ajoutvalidation">
        <div class="mb-3">
            <label for="title">Titre : </label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="subtitle">Sous Titre : </label>
            <input type="text" class="form-control" id="subtitle" name="subtitle">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Example textarea</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Valider</button>
        <input type="hidden" id="jeton" name="jeton" value="<?php $this->getCsrfToken() ?>">
    </form>


<?php
$content = ob_get_clean();
$title = "blog";
require "layout.view.php";
?>