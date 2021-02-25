<?php

use Blog\Models\Article;

$title = "articles";

?>
<h1>Gestion des Articles</h1>

<table class="table text-center">

    <tr class="table">
        <th><h2>Titre</h2></th>
        <th><h2>Sous Titre</h2></th>
        <th colspan="2"><h2>Actions</h2></th>
    </tr>

    <?php
    /** @var  $articles Article[] */
    foreach ($articles as $article) { ?>

        <tr>
            <td class="align-middle"
            <a href="<?= URL ?>articles/<?= htmlspecialchars($article->getIdArticle()) ?>"><?= htmlspecialchars($article->getTitle()); ?></a></td>
            <td class="align-middle"><?= htmlspecialchars($article->getSubtitle()); ?></td>

            <td class="align-middle">
                <!-- modif suppression -->
                <a href="<?= URL ?>articles/modification/<?= htmlspecialchars($article->getIdArticle()); ?>" class="btn btn-primary">Modifier</a>
            </td>
            <td class="align-middle">
                <form method="POST"
                      action="<?= URL ?>articles/suppression/<?= htmlspecialchars($article->getIdArticle()); ?>"
                      onSubmit="return confirm('voulez-vous supprimer cet article ?');">
                    <button class="btn btn-primary">Supprimer</button>
                    <input type="hidden" id="jeton" name="jeton" value="<?php $this->getCsrfToken(); ?>">
                </form>
            </td>
        </tr>
        <?php
    }
    ?>

</table>
<!-- ajouter un article-->

<a href="<?= URL ?>articles/ajout" class="btn btn-primary">Ajouter</a>






