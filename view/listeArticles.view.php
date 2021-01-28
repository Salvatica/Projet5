<?php

use Blog\Models\Article;

ob_start();
?>

<table class="table text-center">
    <div class="container">
        <?php
        /** @var  $articles Article[] */
        foreach ($articles as $article) { ?>

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="modal-body">
                    <h2><a href="<?= URL ?>articles/<?= $article->getIdArticle()?>" ><?= $article->getTitle(); ?></a></h2>
                    <h3><?= $article->getSubtitle(); ?></h3>
                    <hr class="star-primary"/>
                    <h3>Contenu</h3>
                    <p><?= nl2br($article->getContent()) ?></p>
                    <!-- modif suppression -->


                </div>

                    <ul class="list-inline item-details">
                        <li>Date de création:
                            <strong><a href="<?= URL ?>articles/<?= $article->getIdArticle()?>"> <?= $article->getReleaseDate()->format("d/m/y H:i:s"); ?></a>
                            </strong>
                        </li>
                        <li>Date de modification:
                            <strong><a href="<?= URL ?>articles/<?= $article->getIdArticle()?>"> <?= $article->getUpdateDate()->format("d/m/Y H:i:s"); ?></a>
                            </strong>
                        </li>

                    </ul>

            </div>
        </div>
        <?php
        }
        ?>

    </div>
</table>



<?php
$content = ob_get_clean();
$title="articles";
require "layout.view.php";
?>


