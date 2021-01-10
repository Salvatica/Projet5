<?php
namespace blog\view;


ob_start();
?>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="modal-body">
                <h2><? URL ?><?= $theArticle->getTitle() ?></h2>
                <h3><?= $theArticle->getSubtitle() ?></h3>
                <hr class="star-primary"/>
                <h3>Contenu</h3>
                <p><?= $theArticle->getContent() ?></p>

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

<?php
$content = ob_get_clean();
$titre="articles";
require "layout.view.php";
?>