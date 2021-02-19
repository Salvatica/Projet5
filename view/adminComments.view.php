<?php

use Blog\Models\Comment;

ob_start();
?>
<h1>Gestion des Commentaires</h1>

<table class="table text-center">

    <tr class="table">
        <th><h2>Commentaires</h2></th>
        <th colspan="2"><h2>Actions</h2></th>
    </tr>

    <?php
    /** @var  $comments Comment[] */
    foreach ($comments as $comment) { ?>

        <tr>
            <td class="align-middle"><?= $comment->getContent() ; ?></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL?>comments/validation/<?= htmlspecialchars($comment->getIdComment()); ?>">
                    <button class="btn btn-success btn-lg">Valider</button>
                </form></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>comments/suppression/<?= htmlspecialchars($comment->getIdComment()); ?>" onSubmit="return confirm('voulez-vous supprimer ce commentaire ?');">
                    <button class="btn btn-success btn-lg">Supprimer</button>
                    <input type="hidden" id="jeton" name="jeton" value="<?php $_SESSION['jeton']?>">
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
$content = ob_get_clean();
$title="comments";
require"layout.view.php";
?>


