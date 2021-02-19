<?php


namespace Blog\Controller;


abstract class AbstractController
{
    /**
     *vérification du role admin si admin => accès, sinon page 403
     *
     */
    public function checkRoleAdmin()
    {
        $this->redirectIfNotConnected();
        if ($_SESSION['user_role'] != 'ADMIN') {
            $this->redirigerVers('forbidden');
        }
    }

    public function isAdmin()
    {
        if ($_SESSION['user_role'] != 'ADMIN') {
            return true;
        }
        return false;
    }

    public function redirectIfNotConnected()
    {
        if (empty($_SESSION['user_name'])) {
            $this->redirigerVers("accueil");
        }
    }


    public function saveFlashMessage($key, $message)
    {
        $_SESSION[$key] = $message;
    }

    public function getAndCleanFlashMessage($key)
    {
        $message = null;

        if (isset($_SESSION[$key])) {
            $message = $_SESSION[$key];
            unset($_SESSION[$key]);
        }
        return $message;
    }

    public function redirigerVers($url)
    {
        header('location: ' . URL . $url);
    }

    public function session($key)
    {
        return $_SESSION[$key];
    }

    /**
     * @param $key
     * @return mixed
     */
    public function post($key)
    {
        return filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function query($key)
    {
        return filter_input(INPUT_GET, $key);
    }

    /**
     * @return bool
     */
    public function isPostMethod(): bool
    {
        return filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST';
    }
}