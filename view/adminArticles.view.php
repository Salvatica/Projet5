<?php

use Blog\Models\Article;

ob_start();
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
                <td class="align-middle"<a href="<?= URL ?>articles/<?= htmlspecialchars($article->getIdArticle())?>" ><?= htmlspecialchars($article->getTitle()); ?></a></td>
                <td class="align-middle" ><?= htmlspecialchars($article->getSubtitle()); ?></td>
                <td class="align-middle">
                        <!-- modif suppression -->
                        <form method="POST" action="<?= URL ?>articles/modification/<?= htmlspecialchars($article->getIdArticle()); ?>">
                            <button class="btn btn-primary">Modifier</button>
                        </form></td>
                <td class="align-middle">
                        <form method="POST" action="<?= URL ?>articles/suppression/<?= htmlspecialchars($article->getIdArticle()); ?>" onSubmit="return confirm('voulez-vous supprimer cet article ?');">
                            <button class="btn btn-primary">Supprimer</button>
                            <!-- TODO Voir jeton CSRF se renseigner -->
                        </form></td>
            </tr>
<?php
    }
    ?>

</table>
<!-- ajouter un article-->

<a href="<?= URL ?>articles/ajout" class="btn btn-primary">Ajouter</a>


<?php
$content = ob_get_clean();
$title="articles";
require "layout.view.php";
?>



