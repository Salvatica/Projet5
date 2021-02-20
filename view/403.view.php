<?php

namespace blog\view;


ob_start();
?>

    <div class="row">
        <H1>Vous n'êtes pas autorisé à consulter cette page</H1>

    </div>

    <?php
$content = ob_get_clean();
$titre = "articles";
require "layout.view.php";
?>