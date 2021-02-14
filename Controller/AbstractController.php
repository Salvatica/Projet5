<?php


namespace Blog\Controller;


abstract class AbstractController
{
    /**
     *
     *
     */
    public function checkRoleAdmin()
    {
        $this->redirectIfNotConnected();
        if ($_SESSION['user_role'] != 'ADMIN') {
            $this->redirigerVers('forbidden');
        }
    }

    public function redirectIfNotConnected()
    {
        if (empty($_SESSION['user_name'])) {
            $this->redirigerVers("accueil");
        }
    }

    public function redirigerVers($url)
    {
        header('location: ' . URL . $url);
    }
}