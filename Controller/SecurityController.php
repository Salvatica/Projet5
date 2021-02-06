<?php


namespace Blog\Controller;

use Blog\Models\SecurityManager;
use Blog\Models\User;

class SecurityController
{
    /**
     * @var SecurityManager
     */
    private $securityManager;

    public function __construct(){
        $this->securityManager = new SecurityManager();
    }

    public function afficherLoginForm()
    {

        if(!empty($_POST)){
            //TODO retrouver l'utilisateur

            // TODO Si utilisateur verifier son mdp

            // TODO si mdp ok stocker en $_SESSION['user']=$user->getName()

            // SI TOUT EST OK rediriger vers page d'accueil
        }


        require "view/connexion.view.php";
    }

    public function afficherRegisterForm()
    {

        if(!empty($_POST))
        {
            $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            extract($post);
            $user = new User($email, $name, $password, "USER");
            $errors = $user->validate();

            if($this->securityManager->verifyUserExist($user)){
                $errors[] = "User exist !";
            }

            if(empty($errors))
            {
                $this->securityManager->saveUser($user);
                header("location:".URL."login");
            }
        }

        require "view/register.view.php";
    }


}