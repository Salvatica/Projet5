<?php

namespace Blog\Controller;


class HomeController extends AbstractController

{


    public function accueil()
    {
        $this->needView("view/accueil.view.php", []);
    }


}