<?php


namespace Blog\Controller;

use Blog\Models\SecurityManager;
use Blog\Models\User;

class SecurityController extends AbstractController
{
    /**
     * @var SecurityManager
     */
    private $securityManager;

    public function __construct()
    {
        $this->securityManager = new SecurityManager();
    }

    public function afficherLoginForm()
    {
        //Si la méthode utilisée est 'POST', cela signifie que le formulaire à été soumis
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);


            $errors = [];
            // On vérifie que le champ "nom d'utilisateur" a bien été saisi dans le formulaire
            if (empty($name) || !filter_var($name, FILTER_SANITIZE_STRING)) {
                array_push($errors, 'Le nom d\'utilisateur est invalide');

            }
            // On va chercher l'utilisateur en BDD
            $theUser = $this->securityManager->getOneUserByName($name);

            //Si l'utilisateur n'existe pas en BDD, on redirige vers le formulaire de login
            if (!$theUser) {
                array_push($errors, 'Ce nom d\'utilisateur n\'existe pas');
            }

            // Comme l'utilisateur existe en BDD, on vérifie que mdp identiques
            // Si les mots de passe sont identiques, on stock l'utilisateur en session
            if ($theUser && password_verify($password, $theUser->getPassword())) {
                $_SESSION['user_name'] = $theUser->getName();
                $_SESSION['user_role'] = $theUser->getRole();
                $_SESSION['user_id'] = $theUser->getId();
                $_SESSION['user_email'] = $theUser->getEmail();
                $this->redirigerVers("accueil");


            } else {
                // Si le mot de passe est différent, on redirige vers le formulaire de login
                array_push($errors, 'le mot de passe est incorrect');
            }
        }


        require "view/connexion.view.php";
    }

    public function afficherRegisterForm()
    {

        if (!empty($_POST)) {

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $user = new User($email, $name, $password, "USER");
            $errors = $user->validate();

            if ($this->securityManager->verifyUserExist($user)) {
                $errors[] = "cet utilisateur exist déjà !";
            }

            if (empty($errors)) {
                $this->securityManager->saveUser($user);
                $this->redirigerVers("connexion");
            }
        }

        require "view/register.view.php";
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        $this->redirigerVers("connexion");
    }


}