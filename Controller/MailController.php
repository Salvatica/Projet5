<?php


namespace Blog\Controller;


use Blog\Models\MailManager;

class MailController extends AbstractController
{

    private $mailManager;

    public function __Construct()
    {
        $this->mailManager = new MailManager();
    }

    public function handleContactForm()
    {
        if ($this->isPostMethod()) {
            $errors = [];


            if (!empty($_POST)) {
                $name = $_POST['name'];
                $mail = $_POST['email'];
                $phone = $_POST['phone'];
                $body = $_POST['message'];


                if (empty($name)) {
                    array_push($errors, "Le nom est vide");
                }
                if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "L'adresse mail n'est pas valide");
                }

                if (empty($phone) || strlen($phone) < 10) {
                    array_push($errors, "le numéro de teléphone doit comporter 10 chiffres");
                }

                if (empty($body)) {
                    array_push($errors, "le message est vide");
                }
                if (empty($errors)) {

                    $result = $this->mailManager->sendEmail($name, $mail, $phone, $body);


                    if ($result < 1) {

                        array_push($errors, "le message n'a pas été envoyé");
                    } else {
                        $this->saveFlashMessage('success',"Votre message a bien été envoyé");
                    }

                }
            }
            $this->saveFlashMessage('contact_form_errors',$errors);
            return $this->redirigerVers('accueil');

        }

    }
}