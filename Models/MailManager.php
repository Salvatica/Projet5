<?php


namespace Blog\Models;


use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class MailManager
{

    const DESTINATION_EMAIL = "flo.roy@gmail.com";
    const DESTINATION_NAME = "Florence GRISOT";

    private $mailer;

    public function __Construct()
    {
        $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
            ->setUsername('6a11e1086218ad')
            ->setPassword('17ab1fe07d7e41');

        $this->mailer = new Swift_Mailer($transport);


    }

    public function sendEmail($name, $mail, $phone, $body)
    {
        $message = (new Swift_Message('Message du formulaire de contact'))
            ->setFrom([$mail => $name])
            ->setTo([self::DESTINATION_EMAIL => self::DESTINATION_NAME])
            ->setBody($body . 'Téléphone: ' . $phone);

        return $this->mailer->send($message);

    }


}