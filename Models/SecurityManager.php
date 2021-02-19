<?php
namespace Blog\Models;



class SecurityManager extends Model
{


    public function verifyUserExist(User $user)
    {
        $userExist = false;
        //On vérifie si le nom d'utilisateur existe déja
        $req = $this->getBdd()->prepare('SELECT * FROM user WHERE name = :name OR email = :email');
        $req->bindValue(':name', $user->getName(), \PDO::PARAM_STR);
        $req->bindValue(':email', $user->getEmail(), \PDO::PARAM_STR);
        $req->execute();
        if ($req->rowCount() > 0) {
            $userExist = true;

        }

        return $userExist;


    }

    public function saveUser(User $user)
    {


        $req = $this->getBdd()->prepare('INSERT INTO user (name, email, password, role) VALUES (:name, :email, :password, :role)');
        $req->bindValue(':name', $user->getName(), \PDO::PARAM_STR);
        $req->bindValue(':email', $user->getEmail(), \PDO::PARAM_STR);
        $req->bindValue(':role', $user->getRole(), \PDO::PARAM_STR);
        $req->bindValue(':password', password_hash($user->getPassword(), PASSWORD_BCRYPT), \PDO::PARAM_STR);
        $req->execute();

    }

    public function getOneUserByName($name)
    {
        $req = $this->getBdd()->prepare('SELECT * FROM user WHERE name = :name');
        $req->bindParam('name', $name, \PDO::PARAM_STR);
        $req->execute();
        $ligneBDD = $req->fetch();
        $req->closeCursor();
        if (empty($ligneBDD)) {
            return null;
        }

        $theUser = new User($ligneBDD['email'], $ligneBDD['name'], $ligneBDD['password'], $ligneBDD['role']);
        $theUser->setId($ligneBDD['id_user']);
        return $theUser;

    }




}