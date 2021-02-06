<?php
namespace Blog\Models;

class User
{
    /**
     * @var int
     *
     */
    private $id;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $role = "USER";

    public function __construct ($mailAddress, $name, $password, $role)
    {
        $this->email = $mailAddress;
        $this->name = $name;
        $this->password = $password;
        $this->role = $role;
    }

    public function validate()
    {
        $errors = [];
        // verification du mail
        if(!filter_var($this->getEmail(),FILTER_VALIDATE_EMAIL)) {
            //Invalid email!
            $errors[] = "L'adresse mail est invalide";
        }
        // verification du pseudo
        if(empty($this->getName()) || strlen($this->getName()) < 3){
            $errors[] = "Le nom doit comporter au moins 3 caractères.";
        }
        // Vérification password
        if(empty($this->getPassword()) || strlen($this->getPassword()) < 6)
        {
            $errors[] = "Le mot de passe doit comporter au moins 6 caractères";
        }

        return $errors;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $idUser
     */
    public function setId(int $idUser)
    {
        $this->id = $idUser;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }


}