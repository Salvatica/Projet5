<?php
ob_start();
?>


<?php
$content = ob_get_clean();
$titre="connexion";
require "layout.view.php";
?>