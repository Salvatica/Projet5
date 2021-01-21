<?php


namespace Blog\Models;


class UserManager extends Model
{    /**
 * method that looks for a database line and returns an instance of class @see User
 * @param $id_user
 * @return User
 */
    public function getOneUser($id)
    {

        $req = $this->getBdd()->prepare( 'SELECT * FROM user WHERE id_user = :id' );
        $req->bindParam( 'id', $id_user, \PDO::PARAM_INT );
        $req->execute();
        $ligneBDD = $req->fetch();
        $req->closeCursor();
        if (empty( $ligneBDD )) {
            return null;
        }
        $theUser = new User( $ligneBDD['id_user'], $ligneBDD['address_mail'], $ligneBDD['password'], $ligneBDD['role'], $ligneBDD['name']);
        return $theUser;
    }

}