<?php

namespace blog\view;


ob_start();
?>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
                <h2><? URL ?><?=$theArticle->getTitle()?></h2>
                <h3><?=$theArticle->getSubtitle()?></h3>
                <hr class="star-primary"/>
                <h3>Contenu</h3>
                <p><?=nl2br( $theArticle->getContent() )?></p>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> <a
                            href="<?=URL?>articles">Retour</a></button>
            </div>
        </div>
    </div>
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

        <?php foreach ($comments as $comment) { ?>
            <div class="form-floating">
                <div><p><?=$comment->getContent()?></p></div>
                <label for="floatingTextarea">Comments</label>

            </div>

            <?php
        } ?>
    </div>

    <?php
$content = ob_get_clean();
$titre = "articles";
require "layout.view.php";
?>