<?php
ob_start();
?>

<form method="POST" action="<?= URL ?>articles/modificationValidation">
    <div class="mb-3">
        <label for="title">Titre : </label>
        <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($theArticle->getTitle());?>">
    </div>
    <div class="mb-3">
        <label for="subtitle">Sous Titre : </label>
        <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?= htmlspecialchars($theArticle->getSubtitle());?>">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenu</label>
        <textarea class="form-control" id="content" name="content" rows="3"><?= htmlspecialchars($theArticle->getContent());?></textarea>
    </div>
    <input type="hidden" id="id_article" name="id_article" value="<?= htmlspecialchars($theArticle->getIdArticle()); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
    <button type="submit" class="btn btn-primary"><a href="<?=URL?>admin/listeArticles">Retour</a></button>

</form>






<?php
$content = ob_get_clean();
$title="Modification de l'article : " .$theArticle->getIdArticle();
require "layout.view.php";
?>
