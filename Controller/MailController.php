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
        $this->checkCsrf();
        if ($this->isPostMethod()) {
            $errors = [];

            $name = $this->post('name');
            $mail = $this->post('email');
            $phone = $this->post('phone');
            $body = $this->post('message');


            if (empty($name)) {
                $errors[] = "Le nom est vide";

            }
            if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'adresse mail n'est pas valide";
            }

            if (empty($phone) || strlen($phone) < 10) {
                $errors[] = "le numéro de teléphone doit comporter 10 chiffres";
            }

            if (empty($body)) {
                $errors[] = "le message est vide";
            }
            if (empty($errors)) {

                $result = $this->mailManager->sendEmail($name, $mail, $phone, $body);


                if ($result < 1) {

                    $errors[] = "le message n'a pas été envoyé";
                } else {
                    $this->saveFlashMessage('success', "Votre message a bien été envoyé");
                }

            }
        }
        $this->saveFlashMessage('contact_form_errors', $errors);
        return $this->redirigerVers('accueil');

    }


}