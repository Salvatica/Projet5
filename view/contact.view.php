<?php
ob_start();
?>

    <h1>Contact</h1>
    ici la page de contact


<?php
$content = ob_get_clean();
$titre="contact";
require "layout.view.php";
?>