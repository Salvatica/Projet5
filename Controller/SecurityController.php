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

    private function verifyUser($theUser, $password)
    {
        if ($theUser && password_verify($password, $theUser->getPassword())) {
            $this->setSession('user_name', $theUser->getName());
            $this->setSession('user_role', $theUser->getRole());
            $this->setSession('user_id', $theUser->getId());
            $this->setSession('user_email', $theUser->getEmail());
            return true;
        }
        return false;
    }

    public function afficherLoginForm()
    {

        //Si la méthode utilisée est 'POST', cela signifie que le formulaire à été soumis
        if ($this->isPostMethod()) {

            $password = $this->post('password');
            $name = $this->post('name');

            $errors = [];
            // On vérifie que le champ "nom d'utilisateur" a bien été saisi dans le formulaire
            if (empty($name) || !filter_var($name, FILTER_SANITIZE_STRING)) {
                $errors[] = 'Le nom d\'utilisateur est invalide';

            }
            // On va chercher l'utilisateur en BDD
            $theUser = $this->securityManager->getOneUserByName($name);


            //Si l'utilisateur n'existe pas en BDD, on redirige vers le formulaire de login
            if (!$theUser) {
                $errors[] = 'Ce nom d\'utilisateur n\'existe pas';
            }

            // Comme l'utilisateur existe en BDD, on vérifie que mdp identiques
            // Si les mots de passe sont identiques, on stock l'utilisateur en session

            if ($this->verifyUser($theUser, $password)) {

                $this->redirigerVers("accueil");

            } else {
                // Si le mot de passe est différent, on redirige vers le formulaire de login
                $errors[] = 'le mot de passe est incorrect';
            }

        }

        $this->needView("view/connexion.view.php", []);
    }

    public function afficherRegisterForm()
    {


        if ($this->isPostMethod()) {
            $this->checkCsrf();
            $email = $this->post('email');
            $name = $this->post('name');
            $password = $this->post('password');

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

        $this->needView("view/register.view.php", []);
    }

    public function logout()
    {

        $this->destroySession();
        $this->redirigerVers("connexion");
    }

}