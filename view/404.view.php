<?php
namespace blog\view;


ob_start();
?>

    <div class="row">
        <H1>Ce contenu n'existe pas</H1>

    </div>

<?php
$content = ob_get_clean();
$titre="articles";
require "layout.view.php";
?>