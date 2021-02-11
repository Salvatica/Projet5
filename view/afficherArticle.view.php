<?php

namespace blog\view;


ob_start();
?>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="modal-body">
                <h2><? URL ?><?=htmlspecialchars($theArticle->getTitle()); ?></h2>
                <h3><?=htmlspecialchars($theArticle->getSubtitle()); ?></h3>
                <hr class="star-primary"/>
                <h3>Contenu</h3>
                <p><?=nl2br( htmlspecialchars($theArticle->getContent() )); ?></p>

            <ul class="list-inline item-details">
                <li>Date de création:
                    <strong><a href="<?= URL ?>articles/<?= htmlspecialchars($theArticle->getIdArticle());?>"> <?= htmlspecialchars($theArticle->getReleaseDate()->format("d/m/y H:i:s")); ?></a>
                    </strong>
                </li>
                <li>Date de modification:
                    <strong><a href="<?= URL ?>articles/<?= htmlspecialchars($theArticle->getIdArticle());?>"> <?= htmlspecialchars($theArticle->getUpdateDate()->format("d/m/Y H:i:s")); ?></a>
                    </strong>
                </li> Auteur : <?= $theArticle->getAuthor()->getName() ?>

                </li>

            </ul>

                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                    <a href="<?=URL?>articles">Retour</a></button>

            </div>
        </div>
    </div>

    <?php
    if(isset($_SESSION['user_name'])){ // on determine si la variable user_name est définie dans la session

        ?>

    <div class="comment">

        <div id="comments">
            <div class="wb-comment-form mx-auto">
                <div id="respond" class="comment-respond">
                    <h5 class="reply-title mt-5">Commenter</h5>
                    <form method="post" id="commentform" class="comment-form row align-items-center" novalidate>
                        <div class="comment-form-textarea form-group col-md-12">
                            <textarea id="comment" name="comment" cols="25" rows="6" aria-required="true"
                                      class="form-control" placeholder="Entrez votre commentaire ici ... *"></textarea>
                        </div>
                        <div class="form-submit col-12 col-md-6 text-left my-1">
                            <input name="submit" type="submit" id="submit" class="submit btn btn-primary my-3"
                                   value="Poster mon commentaire"/>

                        </div>
                    </form>
                </div>

            </div>
        </div>
        <?php
}
        ?>

         <?php foreach ($comments as $comment) { ?> <br>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"> <p><h6><?=htmlspecialchars($comment->getAuthor()->getName()); ?></h6></p> à posté : <p><?=htmlspecialchars($comment->getContent()); ?></p> <p><h6><?=($comment->getReleaseDate()->format("d/m/y H:i:s"));?></p></h6></li>

    </ul>



    <?php
        } ?>
    </div>

    <?php
$content = ob_get_clean();
$titre = "articles";
require "layout.view.php";
?>