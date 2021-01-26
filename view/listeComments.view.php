<?php

use Blog\Models\Comment;

ob_start();
?>

<div class="comment my-5 pt-3">
    <?php
    /** @var  $comments Comment[] */
    /** @var  $comments Comment[] */
    foreach ($comments as $comment) { ?>
    <div id="comments">
        <p> <a href="<?= URL ?>xxxx" class="btn btn-success btn-lg">Valider</a>
            <a href="<?= URL ?>xxxx" class="btn btn-success btn-lg">Supprimer</a>
        <?php

        echo $comment->getContent();
        ?>

        </p>
    </div>
        <?php
    }
    ?>

</div>

<?php
$content = ob_get_clean();
$title="allComments";
require "layout.view.php";
?>
