<?php

namespace Blog\Controller;


class HomeController extends AbstractController

{


    public function accueil()
    {
        require "view/accueil.view.php";
    }


}