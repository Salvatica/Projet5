<?php

use Blog\Models\Article;

ob_start();
?>
<h1>Gestion des Articles</h1>

<table class="table text-center">

    <tr class="table-dark">
        <th><h2>Titre</h2></th>
        <th><h2>Sous Titre</h2></th>
        <th colspan="2"><h2>Actions</h2></th>
    </tr>

    <?php
    /** @var  $articles Article[] */
    foreach ($articles as $article) { ?>

            <tr>
                <td class="align-middle"<a href="<?= URL ?>articles/<?= $article->getIdArticle()?>" ><?= $article->getTitle(); ?></a></td>
                <td class="align-middle" ><?= $article->getSubtitle(); ?></td>
                <td class="align-middle">
                        <!-- modif suppression -->
                        <form method="POST" action="<?= URL ?>articles/modification/<?= $article->getIdArticle(); ?>">
                            <button class="btn btn-primary">Modifier</button>
                        </form></td>
                <td class="align-middle">
                        <form method="POST" action="<?= URL ?>articles/suppression/<?= $article->getIdArticle(); ?>" onSubmit="return confirm('voulez-vous supprimer cet article ?');">
                            <button class="btn btn-primary">Supprimer</button>
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



