<?php

use Blog\Models\Comment;

ob_start();
?>



<?php
$content = ob_get_clean();
$title="comments";
require "layout.view.php";
?>
