<?php
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
                    <h3><P><?= $article->getSubtitle(); ?></P></h3>
                    <hr class="star-primary"/>
                    <h3>Contenu</h3>
                    <p><?= $article->getContent() ?></p>

                    <ul class="list-inline item-details">
                        <li>Client:
                            <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                            </strong>
                        </li>
                        <li>Date:
                            <strong><a href="http://startbootstrap.com">April 2014</a>
                            </strong>
                        </li>
                        <li>Service:
                            <strong><a href="http://startbootstrap.com">Web Development</a>
                            </strong>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</table>
<a href="<?= URL ?>articles/a" class="btn btn-success btn-lg">ajouter</a>
<?php
$content = ob_get_clean();
$titre="articles";
require "layout.view.php";
?>


