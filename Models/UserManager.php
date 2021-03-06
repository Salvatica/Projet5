<?php


namespace Blog\Models;


class UserManager extends Model
{
    /**
     * method that looks for a database line and returns an instance of class @param $id_user
     * @return User
     * @see User
     */
    public function getOneUser($id_user)
    {

        $req = $this->getBdd()->prepare('SELECT * FROM user WHERE id_user = :id');
        $req->bindParam('id', $id_user, \PDO::PARAM_INT);
        $req->execute();
        $ligneBDD = $req->fetch();
        $req->closeCursor();
        if (empty($ligneBDD)) {
            return null;
        }
        $theUser = new User($ligneBDD['email'], $ligneBDD['name'], null, $ligneBDD['role']);
        $theUser->setId($ligneBDD['id_user']);
        return $theUser;
    }

}