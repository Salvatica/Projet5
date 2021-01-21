<?php
namespace Blog\Models;

class User
{
    /**
     * @var int
     *
     */
    private $idUser;
    /**
     * @var string
     */
    private $mailAddress;
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
    private $role;

    public function __construct ($mailAddress, $name, $password, $role)
    {
        $this->mailAddress = $mailAddress;
        $this->name = $name;
        $this->password = $password;
        $this->role = $role;
    }

    public function validate()
    {
        $errors = [];
        // verification du mail
        if(!filter_var($this->getMailAddress(),FILTER_VALIDATE_EMAIL)) {
            //Invalid email!
            $errors = "L'adresse mail est invalide";
        }

        // verification du pseudo
        // si psuedo pas ok $errors[] = "Pseudo pas valid"


        return $errors;
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getMailAddress()
    {
        return $this->mailAddress;
    }

    /**
     * @param string $mailAddress
     */
    public function setMailAddress($mailAddress)
    {
        $this->mailAddress = $mailAddress;
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